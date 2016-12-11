<div id="ordering-presentation">
     <h2><?=_("Tõlketöö tellimine:")?></h2>

<div id="slides">
  <div class="slide slide-1">
  <p><span class="nr">1</span> <strong><?=_("Saatke päring")?></strong>
  <?=_("Kirjutage meile, mis keelest mis keelde kirjalikku või suulist tõlget soovite.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-2">
  <p><span class="nr">2</span> <strong><?=_("Teeme pakkumise")?></strong>
  <?=_("Vastame esimesel võimalusel ja teatame tõlketöö maksumuse ning tähtaja.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-3">
  <p><span class="nr">3</span> <strong><?=_("Kinnitage tellimus")?></strong>
  <?=_("Kui olete hinnapakkumisega nõus, saatke e-postiga tellimuse kinnitus.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-4">
  <p><span class="nr">4</span> <strong><?=_("Tõlkimine")?></strong>
  <?=_("Pärast tõlke valmimist toimub materjali kujundamine, korrektuur ja ülevaatus toimetaja poolt.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-5">
  <p><span class="nr">5</span> <strong><?=_("Valmis")?></strong>
  <?=_("Toimetame tõlgitud materjalid teieni.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

</div>

<p class="ask-price"><a href="<?=$scriba->baseUrl()?>/price-query" class="button"><?=_("Küsi hinnapakkumist")?> &nbsp; &gt;</a></p>
</div>


<div class="col-1">
  <h2><?=_("Teenused")?></h2>

  <ul id="services">
    <li class="written-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/written-translation"><span><?=_("Kirjalik tõlge")?></span></a></h3>
    </li>
    <li class="oral-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/oral-translation"><span><?=_("Suuline tõlge")?></span></a></h3>
    </li>
    <li class="proofreading">
      <h3><a href="<?=$scriba->baseUrl()?>/proofreading"><span><?=_("Korrektuur ja toimetamine")?></span></a></h3>
    </li>
    <li class="notarisation">
      <h3><a href="<?=$scriba->baseUrl()?>/notarisation"><span><?=_("Notariaalne kinnitamine")?></span></a></h3>
    </li>
    <li class="apostilling">
      <h3><a href="<?=$scriba->baseUrl()?>/apostilling"><span><?=_("Apostillimine")?></span></a></h3>
    </li>
    <li class="legal-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/legal-translation"><span><?=_("Õigustõlge")?></span></a></h3>
    </li>
    <li class="technical-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/technical-translation"><span><?=_("Tehnikatõlge")?></span></a></h3>
    </li>
    <li class="web-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/web-translation"><span><?=_("Kodulehe tõlge")?></span></a></h3>
    </li>
    <li class="manual-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/manual-translation"><span><?=_("Kasutusjuhendi tõlge")?></span></a></h3>
    </li>
    <li class="movie-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/movie-translation"><span><?=_("Filmitõlge")?></span></a></h3>
    </li>
  </ul>

</div>

<div class="col-2" id="client-quotes">

  <h2><?=_("Kliendid meist")?></h2>

  <?=$scriba->markdown("client-quotes")?>

</div>

<script src="<?=$scriba->rootUrl()?>/js/lib/jquery.slides/jquery.slides.js" type="text/javascript"></script>
<script src="<?=$scriba->rootUrl()?>/js/slider.js" type="text/javascript"></script>
