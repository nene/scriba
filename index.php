<?php
require_once "lib/php-markdown/Michelf/Markdown.inc.php";
use \Michelf\Markdown;

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

/**
 * Helper function for markdown conversion of content.
 */
function markdown($name)
{
    $text = file_get_contents("content/".$name.".md");
    return Markdown::defaultTransform($text);
}


// Select page
switch ($_GET["page"]) {
case "kkk":
    $article = markdown("kkk");
    break;
default:
    $article = template("front-page");
}



echo template("index", array(
    "article" => $article,
));
