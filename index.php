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
    $base_url = "/scriba";
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

/**
 * True when Markdown content-page exists with given name.
 */
function is_content_page($name)
{
    return file_exists("content/".$name.".md");
}


// Select page
if (isset($_GET["page"]) && is_content_page($_GET["page"])) {
    $article = markdown($_GET["page"]);
} else {
    $article = template("front-page");
}



echo template("index", array(
    "article" => $article,
    "show_ask_price_button" => true,
));
