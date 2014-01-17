<?php
require_once "lib/php-markdown/Michelf/Markdown.inc.php";

/**
 * Handles loading and saving Markdown content.
 */
class Content {
    private $path;

    /**
     * Initializes with path to the content directory.
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

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
        if ($this->exists($name)) {
            return file_get_contents($this->filename($name));
        } else {
            return "## "._("404 Lehekülge ei leitud");
        }
    }

    /**
     * Saves the markdown content.
     */
    public function save($name, $text)
    {
        file_put_contents($this->filename($name), $text);
    }

    /**
     * True when content page with given name exists;
     */
    public function exists($name)
    {
        return file_exists($this->filename($name));
    }

    /**
     * Turns content identifier into filename.
     */
    private function filename($name)
    {
        return $this->path."/".$name.".md";
    }
}
