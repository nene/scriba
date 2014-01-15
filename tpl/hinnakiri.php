<?php

// Pull the content from Markdown file
$content = $scriba->markdown("hinnakiri");

// Generate table of all supported languages
$languages_table = "<ul>";
foreach ($scriba->languages() as $lang) {
    $languages_table .= "<li>$lang</li>";
}
$languages_table .= "</ul>";

// Inject the languages table into content
echo strtr($content, array("{languages_table}" => $languages_table));

