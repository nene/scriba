<?php
error_reporting(E_ALL);

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

/**
 * True when Markdown content-page exists with given name.
 */
function is_template_page($name)
{
    return file_exists("tpl/".$name.".php");
}

/**
 * Generates data for main menu.
 */
function main_menu()
{
    return array(
        "hinnakiri" => "Hinnakiri",
        "kkk" => "KKK",
        "toopakkumine" => "Tule tööle",
        "kontakt" => "Kontakt",
    );
}

// Select page
$page_name = isset($_GET["page"]) && !empty($_GET["page"]) ? $_GET["page"] : "front-page";
if (is_content_page($page_name)) {
    $article = markdown($page_name);
} elseif (is_template_page($page_name)) {
    $article = template($page_name);
} else {
    $article = markdown("404");
}



echo template("index", array(
    "article" => $article,
    "show_ask_price_button" => true,
    "page_name" => $page_name,
    "main_menu" => main_menu(),
));
