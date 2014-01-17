<?php

/**
 * Basic PHP templating system.
 *
 * It simply extracts an assoc-array of variables, includes given PHP
 * file and buffers all the generated output into a string which it
 * then returns.
 */
class Template {
    /**
     * Applies template with a given name to given variables.
     * @return sting The rendered template as a string.
     */
    public function apply($name, $vars=array())
    {
        ob_start();
        extract($vars, EXTR_SKIP);
        include "tpl/".$name.".php";
        return ob_get_clean();
    }

    /**
     * True when tempate with given name exists.
     */
    public function exists($name)
    {
        return file_exists("tpl/".$name.".php");
    }
}
