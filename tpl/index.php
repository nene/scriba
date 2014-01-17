<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tõlkebüroo Scriba</title>
  <link rel="stylesheet/less" type="text/css" href="<?=$scriba->rootUrl()?>/css/styles.less">
  <script src="<?=$scriba->rootUrl()?>/js/less.js" type="text/javascript"></script>
  <script src="<?=$scriba->rootUrl()?>/js/jquery.js" type="text/javascript"></script>
  <script src="<?=$scriba->rootUrl()?>/js/jquery.slides/jquery.slides.js" type="text/javascript"></script>
  <script src="<?=$scriba->rootUrl()?>/js/main.js" type="text/javascript"></script>
  <?php if ($scriba->isAdmin()): ?>
    <script> var SCRIBA_BASE_URL = "<?=$scriba->baseUrl()?>"; </script>
    <script src="<?=$scriba->rootUrl()?>/js/admin.js" type="text/javascript"></script>
  <?php endif; ?>
</head>
<body>

  <div id="container">

  <header>
    <ul id="language-menu">
        <li><a href="<?=$scriba->rootUrl()?>/et/<?=$scriba->currentPage()?>" title="Eesti keeles">
          <img src="<?=$scriba->rootUrl()?>/images/et.gif"/>
        </a></li>
        <li><a href="<?=$scriba->rootUrl()?>/en/<?=$scriba->currentPage()?>" title="In English">
          <img src="<?=$scriba->rootUrl()?>/images/en.gif"/>
        </a></li>
        <li><a href="<?=$scriba->rootUrl()?>/fi/<?=$scriba->currentPage()?>" title="Suomen kielen">
          <img src="<?=$scriba->rootUrl()?>/images/fi.gif"/>
        </a></li>
        <li><a href="<?=$scriba->rootUrl()?>/sv/<?=$scriba->currentPage()?>" title="På svenska">
          <img src="<?=$scriba->rootUrl()?>/images/sv.gif"/>
        </a></li>
        <li><a href="<?=$scriba->rootUrl()?>/ru/<?=$scriba->currentPage()?>" title="По русски">
          <img src="<?=$scriba->rootUrl()?>/images/ru.gif"/>
        </a></li>
    </ul>

     <h1 id="logo"><a href="<?=$scriba->baseUrl()?>/"><?=_("Scriba &ndash; kirjalik ja suuline tõlge")?></a></h1>

    <div id="iso-9001">
      <a href="<?=$scriba->baseUrl()?>/contact"><img src="<?=$scriba->rootUrl()?>/images/ISO9001.png" alt="<?=_('ISO 9001')?>" width="147"/></a>
    </div>

    <ul id="top-menu">
<?php
    foreach ($scriba->mainMenu() as $name => $title) {
        if ($scriba->currentPage() == $name) {
            echo "<li><strong>$title</strong></li>";
        } else {
            echo "<li><a href='{$scriba->baseUrl()}/{$name}'>{$title}</a></li>";
        }
    }
?>
    </ul>
  </header>

  <article>

    <?=$article?>

    <?php if ($scriba->isAskPriceButtonVisible()): ?>
    <p class="clear">
      <a href="<?=$scriba->baseUrl()?>/price-query" class="button"><?=_("Küsi hinnapakkumist")?> &nbsp; &gt;</a>
    </p>
    <?php endif; ?>


  </article>

  </div>

  <div id="footer-container">
  <footer>
    <div id="languages">
     <h2><?=_("Keelevalik")?></h2>
      <ul>
          <?php foreach($scriba->languages() as $lang) { echo "<li>$lang</li>"; } ?>
      </ul>
    </div>

    <div id="contact">
      <?=$scriba->markdown("footer-contact")?>
    </div>

    <div class="clear"></div>

  </footer>
  </div>

</body>
</html>
