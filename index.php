<?php
error_reporting(E_ALL);

require_once "lib/php-markdown/Michelf/Markdown.inc.php";
use \Michelf\Markdown;

require_once "lib/Form.php";

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

/**
 * Returns array of all the languages supported by Scriba.
 */
function languages()
{
    return array(
        "aserbaidžaani keel",
        "bulgaaria keel",
        "hiina keel",
        "hispaania keel",
        "hollandi keel",
        "inglise keel",
        "itaalia keel",
        "jaapani keel",
        "kreeka keel",
        "ladina keel",
        "leedu keel",
        "läti keel",
        "norra keel",
        "poola keel",
        "portugali keel",
        "prantsuse keel",
        "rootsi keel",
        "rumeenia keel",
        "saksa keel",
        "soome keel",
        "taani keel",
        "tšehhi keel",
        "türgi keel",
        "ungari keel",
        "ukraina keel",
        "vene keel",
    );
}

/**
 * True when the ask price button should be shown on given page.
 */
function has_ask_button($page_name)
{
    $exclude = array(
        "hinnaparing" => true,
    );
    return !array_key_exists($page_name, $exclude);
}

// Select page
$page_name = isset($_GET["page"]) && !empty($_GET["page"]) ? $_GET["page"] : "front-page";
if (is_content_page($page_name)) {
    $article = markdown($page_name);
} elseif (is_template_page($page_name)) {
    $article = template($page_name);
} else {
    header('HTTP/1.0 404 Not Found');
    $article = markdown("404");
}



echo template("index", array(
    "article" => $article,
    "show_ask_price_button" => has_ask_button($page_name),
    "page_name" => $page_name,
    "main_menu" => main_menu(),
));
