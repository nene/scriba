<?php
require_once "lib/Content.php";
require_once "lib/Template.php";
require_once "lib/Form.php";


class Scriba {
    private $config;
    private $currentPage;
    private $admin;
    private $content;
    private $template;

    public function __construct($config)
    {
        $this->config = $config;
        $this->currentPage = "front-page";
        $this->admin = false;
        $this->content = new Content();
        $this->template = new Template();
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

        if (isset($request["source"])) {
            // An ajax request for Markdown source
            header("Content-type: text/plain");
            echo $this->content->source($this->currentPage());
            return;
        } elseif (isset($request["save"])) {
            // An ajax request to save Markdown source
            header("Content-type: text/html");
            $text = isset($request["text"]) ? $request["text"] : "";
            $this->content->save($this->currentPage(), $text);
            echo $this->markdown($this->currentPage());
            return;
        } elseif ($this->template->exists($this->currentPage())) {
            $article = $this->template->render($this->currentPage(), array(
                "scriba" => $this,
            ));
        } elseif ($this->content->exists($this->currentPage())) {
            $article = $this->markdown($this->currentPage());
        } else {
            header('HTTP/1.0 404 Not Found');
            $article = $this->markdown("404");
        }

        echo $this->template->render("index", array(
            "article" => $article,
            "scriba" => $this,
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
     * Returns HTML-rendered markdown content of a page.
     */
    public function markdown($name)
    {
        $html = $this->content->html($name);

        if ($this->admin) {
            return "<div class='editable' data-name='{$name}'>{$html}</div>";
        }
        else {
            return $html;
        }
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
     * Generates data for main menu.
     */
    public function mainMenu()
    {
        return array(
            "price-list" => _("Hinnakiri"),
            "faq" => _("KKK"),
            "job-offer" => _("Tule tööle"),
            "contact" => _("Kontakt"),
        );
    }

    /**
     * True when the ask price button should be shown on the current
     * page.
     */
    public function isAskPriceButtonVisible()
    {
        $exclude = array(
            "price-query" => true,
            "contact" => true,
            "job-offer" => true,
        );
        return !array_key_exists($this->currentPage(), $exclude);
    }

}

$config = include("config.php");

$scriba = new Scriba($config);

$scriba->route($_REQUEST);








