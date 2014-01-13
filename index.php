<?php

/**
 * Applies template to given variables.
 * Returns the rendered template as a string.
 */
function template($name, $vars=array())
{
    ob_start();
    extract($vars, EXTR_SKIP);
    include "tpl/".$name.".php";
    return ob_get_clean();
}

echo template("index", array(
    "article" => template("front-page"),
));
