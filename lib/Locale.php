<?php
/**
 * Handles initialization of Gettext localization.
 */
class Locale {
    private $dir;
    private $lang;
    private $localeMap;

    /**
     * Initializes with path to the locale directory.
     * @param string $dir
     */
    public function __construct($dir)
    {
        $this->dir = $dir;

        $this->localeMap = array(
            "et" => array("locale" => "et_EE", "label" => "Eesti keeles"),
            "en" => array("locale" => "en_US", "label" => "In English"),
            "ru" => array("locale" => "ru_RU", "label" => "По русский"),
        );
    }

    /**
     * Switches the locale given a two-letter language code.
     * @param string $lang
     */
    public function set($lang)
    {
        $this->lang = $lang;
        $locale = $this->langToLocale($lang);

        putenv('LC_ALL=' . $locale);
        putenv('LANG=' . $locale);
        putenv('LANGUAGE=' . $locale);
        bindtextdomain($locale, $this->dir);
        setlocale(LC_ALL, $locale);
        textdomain($locale);
    }

    public function getMenu()
    {
        $menu = array();
        foreach ($this->localeMap as $lang => $data) {
            $menu[$lang] = array(
                "label" => $data["label"],
                "active" => $lang == $this->lang,
            );
        }
        return $menu;
    }

    /**
     * Maps language code to full locale code.
     */
    private function langToLocale($lang)
    {
        return $this->localeMap[$lang]["locale"];
    }
}
