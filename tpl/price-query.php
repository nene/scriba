<?php
$scriba->setSubTitle(_("Hinnapäring"));

$form = new Form();

$name = $form->field("text", array(
    "name" => "name",
    "required" => true
));
$email = $form->field("text", array(
    "name" => "email",
    "size" => "small",
    "required" => true,
    "validator" => "email"
));
$phone = $form->field("text", array(
    "name" => "phone",
    "size" => "small",
    "required" => true
));
$fromLang = $form->field("select", array(
    "name" => "from_lang",
    "required" => true,
    "options" => array_merge(array(_("keelest...")), $scriba->languages(), array(_("muu..."))),
));
$toLang = $form->field("select", array(
    "name" => "to_lang",
    "required" => true,
    "options" => array_merge(array(_("keelde...")), $scriba->languages(), array(_("muu...")))
));
$description = $form->field("textarea", array(
    "name" => "description",
    "required" => true
));
$deadline = $form->field("text", array(
    "name" => "deadline"
));
$files = $form->field("file", array(
    "name" => "files"
));

if (!empty($_POST)) {
    $form->fill($_POST);
    $form->validate();
}

?>

<?=$scriba->markdown("price-query")?>

<form action="" method="post" id="ask-price-form">

  <?php if (!$form->valid()) { ?>
    <p class="error-summary"><?=_("Palun täitke kohustuslikud väljad!")?></p>
  <?php } ?>

  <fieldset>
    <legend><?=_("Tellija")?></legend>

    <p class="<?=$name->cssCls();?>">
      <label class="field-label"><?=_("Firma või eraisiku nimi:")?></label>
      <?=$name->html(); ?></p>

    <p class="<?=$email->cssCls();?>">
      <label class="field-label"><?=_("E-post:")?></label>
      <?=$email->html(); ?></p>

    <p class="<?=$phone->cssCls();?>">
      <label class="field-label"><?=_("Telefoninumber:")?></label>
      <?=$phone->html(); ?></p>
  </fieldset>

  <fieldset>
    <legend><?=_("Tõlge")?></legend>

    <p class="<?=$fromLang->cssCls();?> <?=$toLang->cssCls();?>">
      <label class="field-label"><?=_("Tõlkesuund:")?></label>
      <?=$fromLang->html(); ?>
      <?=$toLang->html(); ?>
    </p>

    <p class="<?=$description->cssCls();?>">
      <label class="field-label"><?=_("Lisainformatsioon:")?></label>
      <?=$description->html(); ?></p>

    <p class="<?=$deadline->cssCls();?>">
      <label class="field-label"><?=_("Tõlke tähtaeg:")?></label>
      <?=$deadline->html(); ?></p>
  </fieldset>

  <fieldset>
    <legend><?=_("Failid")?></legend>

    <p><?=_("Lisa tõlkimist vajav tekst, et saaksime täpsema pakkumise teha.")?></p>

    <p class="<?=$files->cssCls();?>">
      <button type="button" class="upload-button"><?=_("Vali failid...")?></button>
    </p>

    <!-- The actual file input field that we hide away -->
    <div class="file-input"><?=$files->html(); ?></div>

    <!-- Empty list that gets populated with selected files -->
    <ul class="upload-filelist"></ul>

  </fieldset>

  <p class="submit"><button type="submit" class="button"><?=_("Saada")?></button></p>

</form>

<script src="<?=$scriba->rootUrl()?>js/fileupload.js"></script>
