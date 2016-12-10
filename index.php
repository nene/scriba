<?php
require_once "lib/Content.php";
require_once "lib/Template.php";
require_once "lib/Locale.php";
require_once "lib/Auth.php";
require_once "lib/Form.php";


class Scriba {
    private $config;
    private $lang;
    private $locale;
    private $currentPage;
    private $content;
    private $template;
    private $subTitle;

    public function __construct($config)
    {
        $this->config = $config;
        $this->lang = "et";
        $this->locale = new Locale("locale");
        $this->currentPage = "front-page";
        $this->template = new Template();
    }

    /**
     * Renders and displays the specified page.
     * @param array $query PHP $_GET array.
     */
    public function route($request)
    {
        // Switch content directory depending on selected language
        if (!empty($request["lang"])) {
            $this->lang = $request["lang"];
            $this->locale->set($this->lang);
        }
        $this->content = new Content("content/".$this->lang);

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
            $this->setSubTitle($this->content->title($this->currentPage()));
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

        if ($this->isAdmin()) {
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
            _("prantsuse keel"),
            _("rootsi keel"),
            _("rumeenia keel"),
            _("saksa keel"),
            _("soome keel"),
            _("tšehhi keel"),
            _("türgi keel"),
            _("ungari keel"),
            _("ukraina keel"),
            _("vene keel"),
        );
    }

    /**
     * Attempts a login with given user and pass.
     * @return boolean True on success.
     */
    public function login($user, $pass)
    {
        $auth = new Auth($this->config["users"]);

        if ($auth->login($user, $pass)) {
            $_SESSION['user'] = $user;
            $_SESSION['admin'] = true;
            return true;
        }

        return false;
    }

    /**
     * Logs the current user out.
     */
    public function logout()
    {
        unset($_SESSION['user']);
        unset($_SESSION['admin']);
    }

    /**
     * Returns the ruut URL + language code.
     * Use this to as a base for all normal links.
     */
    public function baseUrl() {
        return $this->rootUrl() . "/" . $this->lang;
    }

    /**
     * Returns the true root URL of the app.
     * Use this as a base when linking assets (CSS, JS, images).
     */
    public function rootUrl() {
        return $this->config["base_url"];
    }

    /**
     * True when the working in administrator-mode.
     */
    public function isAdmin() {
        return isset($_SESSION['admin']) && $_SESSION['admin'] === true;
    }

    /**
     * True when debug mode is enabled;
     */
    public function isDebug() {
        return isset($this->config["debug"]) && $this->config["debug"];
    }

    /**
     * Generates data for main menu.
     */
    public function mainMenu()
    {
        $menu = array(
            "price-list" => _("Hinnakiri"),
            "faq" => _("KKK"),
            "job-offer" => _("Tule tööle"),
            "contact" => _("Kontakt"),
        );

        // When admin is logged in, add logout button
        if ($this->isAdmin()) {
            $menu["logout"] = _("Logi välja");
        }

        return $menu;
    }

    /**
     * Returns the full title of the current page.
     */
    public function getFullTitle()
    {
        $prefix = ($this->subTitle) ? $this->subTitle . " - " : "";
        return $prefix . _("Tõlkebüroo Scriba");
    }

    /**
     * Sets the page title (this will be prepended to the site title).
     */
    public function setSubTitle($title)
    {
        $this->subTitle = $title;
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
            "admin" => true,
        );
        return !array_key_exists($this->currentPage(), $exclude);
    }

}

session_start();

$config = include("config.php");

$scriba = new Scriba($config);

$scriba->route($_REQUEST);








