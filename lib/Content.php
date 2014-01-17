<?php
require_once "lib/php-markdown/Michelf/Markdown.inc.php";

/**
 * Handles loading and saving Markdown content.
 */
class Content {
    /**
     * Returns HTML-rendered markdown content of a page.
     */
    public function html($name)
    {
        $text = $this->source($name);
        return \Michelf\Markdown::defaultTransform($text);
    }

    /**
     * Retrieves the source markdown text.
     */
    public function source($name)
    {
        return file_get_contents("content/".$name.".md");
    }

    /**
     * Saves the markdown content.
     */
    public function save($name, $text)
    {
        file_put_contents("content/".$name.".md", $text);
    }

    /**
     * True when content page with given name exists;
     */
    public function exists($name)
    {
        return file_exists("content/".$name.".md");
    }
}
