<?php
/**
 * Handles initialization of Gettext localization.
 */
class Locale {
    private $dir;

    /**
     * Initializes with path to the locale directory.
     * @param string $dir
     */
    public function __construct($dir)
    {
        $this->dir = $dir;
    }

    /**
     * Switches the locale given a two-letter language code.
     * @param string $lang
     */
    public function set($lang)
    {
        $locale = $this->langToLocale($lang);

        putenv('LC_ALL=' . $locale);
        putenv('LANG=' . $locale);
        putenv('LANGUAGE=' . $locale);
        bindtextdomain($locale, $this->dir);
        setlocale(LC_ALL, $locale);
        textdomain($locale);
    }

    /**
     * Maps language code to full locale code.
     */
    private function langToLocale($lang)
    {
        $map = array(
            "et" => "et_EE",
            "en" => "en_US",
            "ru" => "ru_RU",
        );
        return $map[$lang];
    }
}
