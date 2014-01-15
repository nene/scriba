<?php

$form = new Form();

$name = $form->field(
    "text",
    array("name" => "name", "required" => true)
);
$email = $form->field(
    "text",
    array("name" => "email", "required" => true, "validator" => "email")
);
$phone = $form->field(
    "text",
    array("name" => "phone", "required" => true)
);
$fromLang = $form->field(
    "select",
    array(
        "name" => "from_lang",
        "required" => true,
        "options" => array_merge(array("keelest..."), $scriba->languages(), array("muu...")),
    )
);
$toLang = $form->field(
    "select",
    array(
        "name" => "to_lang",
        "required" => true,
        "options" => array_merge(array("keelde..."), $scriba->languages(), array("muu..."))
    )
);
$description = $form->field(
    "textarea",
    array("name" => "description", "required" => true)
);
$deadline = $form->field(
    "text",
    array("name" => "deadline")
);
$files = $form->field(
    "file",
    array("name" => "files")
);

if (!empty($_POST)) {
    $form->fill($_POST);
    $form->validate();
}

?>

<h2>Hinnapäring</h2>

<p>Scriba tõlkebüroo kindlustab tellimusele lühikese tarneaja,
  tasemel küljenduse ja <i>native speaker</i>’i korrektuuri.</p>

<p>Kui soovid tellida tõlkeid võrdlemisi tihti,
  <a href="<?=$base_url?>/kontakt">küsi püsikliendilepingut</a>,
  millega kaasneb <strong>hinnaalandus</strong>.</p>

<form action="" method="post" id="ask-price-form">

  <?php if (!$form->valid()) { ?>
  <p class="error-summary">Palun täitke kohustuslikud väljad!</p>
  <?php } ?>

  <fieldset>
    <legend>Tellija</legend>

    <p class="<?=$name->cssCls();?>">
      <label>Firma või eraisiku nimi:</label>
      <?=$name->html(); ?></p>

    <p class="<?=$email->cssCls();?>">
      <label>E-post:</label>
      <?=$email->html(); ?></p>

    <p class="<?=$phone->cssCls();?>">
      <label>Telefoninumber:</label>
      <?=$phone->html(); ?></p>
  </fieldset>

  <fieldset>
    <legend>Tõlge</legend>

    <p class="<?=$fromLang->cssCls();?> <?=$toLang->cssCls();?>">
      <label>Tõlkesuund:</label>
      <?=$fromLang->html(); ?>
      <?=$toLang->html(); ?>
    </p>

    <p class="<?=$description->cssCls();?>">
      <label>Lisainformatsioon:</label>
      <?=$description->html(); ?></p>

    <p class="<?=$deadline->cssCls();?>">
      <label>Tõlke tähtaeg:</label>
      <?=$deadline->html(); ?></p>
  </fieldset>

  <fieldset>
    <legend>Failid</legend>

    <p>Lisa tõlkimist vajav tekst, et saaksime täpsema pakkumise teha.</p>

    <p class="<?=$files->cssCls();?>">
      <button type="button" class="upload-button">Vali failid...</button>
    </p>

    <!-- The actual file input field that we hide away -->
    <div class="file-input"><?=$files->html(); ?></div>

    <!-- Empty list that gets populated with selected files -->
    <ul class="upload-filelist"></ul>

  </fieldset>

  <p class="submit"><button type="submit" class="button">Saada</button></p>

</form>

<script src="js/fileupload.js"></script>
