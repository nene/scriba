<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title><?=$scriba->getFullTitle()?></title>

  <?php if ($scriba->isDebug()): ?>
  <link rel="stylesheet/less" type="text/css" href="<?=$scriba->rootUrl()?>/css/styles.less">
  <script src="<?=$scriba->rootUrl()?>/js/lib/less.js" type="text/javascript"></script>
  <?php else: ?>
  <link rel="stylesheet" type="text/css" href="<?=$scriba->rootUrl()?>/css/styles.min.css">
  <?php endif; ?>

  <script src="<?=$scriba->rootUrl()?>/js/lib/jquery.js" type="text/javascript"></script>

  <?php if ($scriba->isAdmin()): ?>
    <script> var SCRIBA_BASE_URL = "<?=$scriba->baseUrl()?>"; </script>
    <script src="<?=$scriba->rootUrl()?>/js/admin.js" type="text/javascript"></script>
  <?php endif; ?>

</head>
<body>

  <div id="container">

  <header>
    <?php
     // Instead of linking "/front-page", just link to "/"
     $page = $scriba->currentPage() == "front-page" ? "" : $scriba->currentPage();
    ?>
    <ul id="language-menu">
        <li><a href="<?=$scriba->rootUrl()?>/et/<?=$page?>" title="Eesti keeles">
          <img src="<?=$scriba->rootUrl()?>/images/et.gif"/>
        </a></li>
        <li><a href="<?=$scriba->rootUrl()?>/en/<?=$page?>" title="In English">
          <img src="<?=$scriba->rootUrl()?>/images/en.gif"/>
        </a></li>
        <li><a href="<?=$scriba->rootUrl()?>/ru/<?=$page?>" title="По русски">
          <img src="<?=$scriba->rootUrl()?>/images/ru.gif"/>
        </a></li>
    </ul>

     <h1 id="logo"><a href="<?=$scriba->baseUrl()?>/">
       <?=_("Scriba &ndash; kirjalik ja suuline tõlge")?>
     </a></h1>

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
      <a href="<?=$scriba->baseUrl()?>/price-query" class="button">
        <?=_("Küsi hinnapakkumist")?> &nbsp; &gt;
      </a>
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
