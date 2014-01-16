<?php

/**
 * Form validation class.
 */
class Form
{
    const DEFAULT_GROUP = "default";

    private $valid;
    private $groups;
    private $currentGroup;

    function __construct()
    {
        $this->valid = true;
        $this->groups = array();
        $this->group(self::DEFAULT_GROUP);
    }

    /**
     * Starts a new named group of fields.  All calls to field() after
     * this will add fields to this group, until the next call to
     * group().
     * @param string $name
     */
    function group($name)
    {
        $this->groups[$name] = array();
        $this->currentGroup = $name;
    }

    /**
     * Returns assoc-array of all groups and fields inside them,
     * except the default group.
     * @return array
     */
    function allGroups()
    {
        $filtered = array();
        foreach ($this->groups as $name => $group) {
            if ($name != self::DEFAULT_GROUP) {
                $filtered[$name] = $group;
            }
        }
        return $filtered;
    }

    /**
     * Defines a new field.
     *
     * @param string $type Name of field type:
     * - text
     * - textarea
     * - select
     * - file
     * @param array $opts additional options to pass to the field constructor.
     * @return Field the newly created field.
     */
    function field($type, $opts=array())
    {
        $className = ucfirst($type)."Field";
        $field = new $className($opts);

        $this->groups[$this->currentGroup][$opts["name"]] = $field;

        return $field;
    }

    /**
     * Populates form fields with $_POST or $_GET data.
     * @param array $data
     */
    function fill($data)
    {
        foreach ($this->groups as $fields) {
            foreach ($fields as $field) {
                $field->fill($data);
            }
        }
    }

    /**
     * Validates all form fields.
     * @return boolean True when all fields are valid.
     */
    function validate()
    {
        $this->valid = true;
        foreach ($this->groups as $fields) {
            foreach ($fields as $field) {
                if (!$field->validate()) {
                    $this->valid = false;
                }
            }
        }
        return $this->valid;
    }

    /**
     * @return boolean True when the form is valid.
     */
    function valid()
    {
        return $this->valid;
    }
}

/**
 * Base class for all form fields.
 */
class Field
{
    protected $name;
    protected $label;
    protected $required;
    protected $opts;
    protected $valid;
    protected $value;
    protected $validator = null;

    function __construct($opts)
    {
        $this->name = $opts["name"];
        $this->label = isset($opts["label"]) ? $opts["label"] : "";
        $this->required = isset($opts["required"]) && $opts["required"];
        $this->opts = $opts;
        $this->valid = true;
        $this->value = "";
        $this->initValidator($opts);
    }

    private function initValidator($opts) {
        if (isset($opts["validator"]) && $opts["validator"]) {
            $className = ucfirst($opts["validator"])."Validator";
            $this->validator = new $className();
        }
    }

    /**
     * Populates field with $_POST or $_GET data.
     */
    function fill($data)
    {
        $this->value = isset($data[$this->name]) ? $data[$this->name] : "";
    }

    /**
     * @return string Value of the field
     */
    function val()
    {
        return $this->value;
    }

    /**
     * @return string Label text associated with the field.
     */
    function label()
    {
        return $this->label;
    }

    /**
     * @return string HTML input field.
     */
    function html()
    {
        throw new Exception("html() method not implemented.");
    }

    /**
     * Validates the field.
     * @return boolean True when validation succeeded.
     */
    function validate()
    {
        if ($this->required && !$this->val()) {
            $this->valid = false;
        }

        if ($this->val() && $this->validator) {
            $this->valid = $this->validator->validate($this->val());
        }

        return $this->valid;
    }

    /**
     * @return boolean True when field is valid.
     */
    function valid()
    {
        return $this->valid;
    }

    /**
     * @return string CSS class names to show for this field.
     */
    function cssCls()
    {
        $required = $this->required ? "required" : "";
        $valid = $this->valid() ? "" : "invalid";
        return $required." ".$valid;
    }
}

/**
 * Field that renders into <input type="text">
 */
class TextField extends Field
{
    function html()
    {
        return "<input type='text' name='{$this->name}' value='{$this->val()}'>";
    }
}

/**
 * Field that renders into <textarea>
 */
class TextareaField extends Field
{
    function html()
    {
        return "<textarea name='{$this->name}' rows='10' cols='40'>{$this->val()}</textarea>";
    }
}

/**
 * Field that renders into <select>
 */
class SelectField extends Field
{
    function html()
    {
        return "<select name='{$this->name}'>{$this->optionsHtml()}</select>";
    }

    private function optionsHtml()
    {
        $opts = "";
        foreach ($this->opts["options"] as $v) {
            $selected = ($v == $this->val()) ? "selected='selected'" : "";
            $opts .= "<option value='$v' $selected>$v</option>";
        }
        return $opts;
    }

    function validate()
    {
        // Consider the field empty when first default option selected.
        if ($this->required && $this->val() == $this->opts["options"][0]) {
            $this->valid = false;
        }

        return $this->valid;
    }
}

/**
 * Field that renders into <input type="file">
 */
class FileField extends Field
{
    function fill($data)
    {
        $this->value = isset($data[$this->name]) ? $data[$this->name] : "";
    }

    function html()
    {
        return "<input type='file' name='{$this->name}[]' multiple='multiple'>";
    }
}

/**
 * Simple e-mail validation.
 */
class EmailValidator
{
    function validate($value)
    {
        return !!preg_match('/^\S+@\S+\.\S+$/', $value);
    }
}
