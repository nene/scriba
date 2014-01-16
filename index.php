<?php
error_reporting(E_ALL);

require_once "lib/php-markdown/Michelf/Markdown.inc.php";
use \Michelf\Markdown;

require_once "lib/Form.php";

class Scriba {
    private $config;
    private $admin;

    public function __construct($config)
    {
        $this->config = $config;
        $this->admin = true;
    }

    /**
     * Renders and displays the specified page.
     * @param array $query PHP $_GET array.
     */
    public function route($request)
    {
        $page_name = (isset($request["page"]) && $request["page"]) ? $request["page"] : "front-page";

        if ($page_name == "markdownSource" && isset($request["name"])) {
            // An ajax request for Markdown source
            header("Content-type: text/plain");
            echo $this->markdownSource($request["name"]);
            return;
        } elseif ($this->isTemplatePage($page_name)) {
            $article = $this->template($page_name);
        } elseif ($this->isContentPage($page_name)) {
            $article = $this->markdown($page_name);
        } else {
            header('HTTP/1.0 404 Not Found');
            $article = $this->markdown("404");
        }

        echo $this->template("index", array(
            "article" => $article,
            "show_ask_price_button" => $this->hasAskButton($page_name),
            "page_name" => $page_name,
            "main_menu" => $this->mainMenu(),
        ));
    }

    /**
     * Applies template to given variables.
     * Returns the rendered template as a string.
     */
    public function template($name, $vars=array())
    {
        ob_start();
        extract($vars, EXTR_SKIP);
        $base_url = $this->config["base_url"];
        $scriba = $this;
        include "tpl/".$name.".php";
        return ob_get_clean();
    }

    /**
     * Helper function for markdown conversion of content.
     */
    public function markdown($name)
    {
        $text = $this->markdownSource($name);
        $html = Markdown::defaultTransform($text);

        if ($this->admin) {
            return "<div class='editable' data-name='{$name}'>{$html}</div>";
        }
        else {
            return $html;
        }
    }

    /**
     * Retrieves the source markdown text.
     */
    private function markdownSource($name)
    {
        return file_get_contents("content/".$name.".md");
    }

    /**
     * Returns array of all the languages supported by Scriba.
     */
    public function languages()
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
     * True when Markdown content-page exists with given name.
     */
    private function isContentPage($name)
    {
        return file_exists("content/".$name.".md");
    }

    /**
     * True when Markdown content-page exists with given name.
     */
    private function isTemplatePage($name)
    {
        return file_exists("tpl/".$name.".php");
    }

    /**
     * Generates data for main menu.
     */
    private function mainMenu()
    {
        return array(
            "hinnakiri" => "Hinnakiri",
            "kkk" => "KKK",
            "toopakkumine" => "Tule tööle",
            "kontakt" => "Kontakt",
        );
    }

    /**
     * True when the ask price button should be shown on given page.
     */
    private function hasAskButton($page_name)
    {
        $exclude = array(
            "hinnaparing" => true,
            "kontakt" => true,
            "toopakkumine" => true,
        );
        return !array_key_exists($page_name, $exclude);
    }

}

$config = include("config.php");

$scriba = new Scriba($config);

$scriba->route($_GET);








