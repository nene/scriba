<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tõlkebüroo Scriba</title>
  <link rel="stylesheet/less" type="text/css" href="css/styles.less">
  <script src="js/less.js" type="text/javascript"></script>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/jquery.slides/jquery.slides.js" type="text/javascript"></script>
  <script src="js/main.js" type="text/javascript"></script>
</head>
<body>

  <div id="container">

  <header>
    <ul id="language-menu">
        <li><a href="et.html" title="Eesti keeles"><img src="images/et.gif"/></a></li>
        <li><a href="en.html" title="In English"><img src="images/en.gif"/></a></li>
        <li><a href="fi.html" title="Suomen kielen"><img src="images/fi.gif"/></a></li>
        <li><a href="sv.html" title="På svenska"><img src="images/sv.gif"/></a></li>
        <li><a href="ru.html" title="По русски"><img src="images/ru.gif"/></a></li>
    </ul>

    <h1 id="logo"><a href="<?=$base_url?>/">Scriba &ndash; kirjalik ja suuline tõlge</a></h1>

    <div id="iso-9001">
      <a href="<?=$base_url?>/kontakt"><img src="images/ISO9001.png" alt="ISO 9001" width="147"/></a>
    </div>

    <ul id="top-menu">
<?php
    foreach ($main_menu as $name => $title) {
        if ($page_name==$name) {
            echo "<li><strong>$title</strong></li>";
        } else {
            echo "<li><a href='$base_url/$name'>$title</a></li>";
        }
    }
?>
    </ul>
  </header>

  <article>

    <?=$article?>

    <?php if ($show_ask_price_button) { ?>
    <p class="clear">
        <a href="<?=$base_url?>/hinnaparing" class="button">Küsi hinnapakkumist &nbsp; &gt;</a>
    </p>
    <?php } ?>


  </article>

  </div>

  <div id="footer-container">
  <footer>
    <div id="languages">
      <h2>Keelevalik</h2>
      <ul>
          <?php foreach(languages() as $lang) { echo "<li>$lang</li>"; } ?>
      </ul>
    </div>

    <div id="contact">
      <h2>Scriba OÜ</h2>
      <p>
        <span class="label">Juhataja:</span> Esper Linask<br>
        <span class="label">Aadress:</span> Õpetaja 9, 51003 Tartu<br>
        <span class="label">Registrikood:</span> 11439609<br>
        <span class="label">Tel:</span> 738 0806 /  528 6768<br>
        <span class="label">E-post:</span> info@scriba.ee
      </p>
    </div>

    <div class="clear"></div>

  </footer>
  </div>

</body>
</html>
