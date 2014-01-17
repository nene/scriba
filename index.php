<?php
require_once "lib/php-markdown/Michelf/Markdown.inc.php";

require_once "lib/Form.php";

class Scriba {
    private $config;
    private $currentPage;
    private $admin;

    public function __construct($config)
    {
        $this->config = $config;
        $this->currentPage = "front-page";
        $this->admin = false;
    }

    /**
     * Renders and displays the specified page.
     * @param array $query PHP $_GET array.
     */
    public function route($request)
    {
        if (isset($request["admin"])) {
            $this->admin = true;
        }

        if (!empty($request["page"])) {
            $this->currentPage = $request["page"];
        }

        if (isset($request["markdownSource"])) {
            // An ajax request for Markdown source
            header("Content-type: text/plain");
            echo $this->markdownSource($this->currentPage());
            return;
        } elseif (isset($request["markdown"])) {
            // An ajax request to render Markdown into HTML
            header("Content-type: text/html");
            $text = isset($request["text"]) ? $request["text"] : "";
            echo $this->toMarkdown($this->currentPage(), $text);
            return;
        } elseif ($this->isTemplatePage($this->currentPage())) {
            $article = $this->template($this->currentPage());
        } elseif ($this->isContentPage($this->currentPage())) {
            $article = $this->markdown($this->currentPage());
        } else {
            header('HTTP/1.0 404 Not Found');
            $article = $this->markdown("404");
        }

        echo $this->template("index", array(
            "article" => $article
        ));
    }

    /**
     * @return string The name of the current page
     */
    public function currentPage()
    {
        return $this->currentPage;
    }

    /**
     * Applies template to given variables.
     * Returns the rendered template as a string.
     */
    public function template($name, $vars=array())
    {
        ob_start();
        extract($vars, EXTR_SKIP);
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
        return $this->toMarkdown($name, $text);
    }

    /**
     * Renders given markdown text as HTML
     */
    private function toMarkdown($name, $text) {
        $html = \Michelf\Markdown::defaultTransform($text);

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
            _("aserbaidžaani keel"),
            _("bulgaaria keel"),
            _("hiina keel"),
            _("hispaania keel"),
            _("hollandi keel"),
            _("inglise keel"),
            _("itaalia keel"),
            _("jaapani keel"),
            _("kreeka keel"),
            _("ladina keel"),
            _("leedu keel"),
            _("läti keel"),
            _("norra keel"),
            _("poola keel"),
            _("portugali keel"),
            _("prantsuse keel"),
            _("rootsi keel"),
            _("rumeenia keel"),
            _("saksa keel"),
            _("soome keel"),
            _("taani keel"),
            _("tšehhi keel"),
            _("türgi keel"),
            _("ungari keel"),
            _("ukraina keel"),
            _("vene keel"),
        );
    }

    /**
     * Returns the base-url of the app.
     */
    public function baseUrl() {
        return $this->config["base_url"];
    }

    /**
     * True when the working in administrator-mode.
     */
    public function isAdmin() {
        return $this->admin;
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
    public function mainMenu()
    {
        return array(
            "hinnakiri" => _("Hinnakiri"),
            "kkk" => _("KKK"),
            "toopakkumine" => _("Tule tööle"),
            "kontakt" => _("Kontakt"),
        );
    }

    /**
     * True when the ask price button should be shown on the current
     * page.
     */
    public function isAskPriceButtonVisible()
    {
        $exclude = array(
            "hinnaparing" => true,
            "kontakt" => true,
            "toopakkumine" => true,
        );
        return !array_key_exists($this->currentPage(), $exclude);
    }

}

$config = include("config.php");

$scriba = new Scriba($config);

$scriba->route($_REQUEST);








