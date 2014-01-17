<?php

$form = new Form();

$form->group(_("Isikuandmed"));
$form->field("text", array(
    "label" => _("Eesnimi:"),
    "name" => "firstName",
    "required" => true
));
$form->field("text", array(
    "label" => _("Perenimi:"),
    "name" => "lastName",
    "required" => true
));
$form->field("text", array(
    "label" => _("Sünniaeg:"),
    "name" => "birthDay",
    "size" => "small",
    "required" => true
));

$form->group(_("Kontakt"));
$form->field("text", array(
    "label" => _("Aadress:"),
    "name" => "address",
    "required" => true
));
$form->field("text", array(
    "label" => _("Telefon:"),
    "name" => "phone",
    "size" => "small",
    "required" => true
));
$form->field("text", array(
    "label" => _("E-post:"),
    "name" => "email",
    "size" => "small",
    "required" => true,
    "validator" => "email"
));
$form->field("text", array(
    "label" => _("Skype kasutajatunnus:"),
    "name" => "skypeId",
    "size" => "small",
));

$form->group(_("Kogemused"));
$form->field("text", array(
    "label" => _("Emakeel:"),
    "name" => "nativeLanguage",
    "size" => "small",
    "required" => true
));
$form->field("textarea", array(
    "label" => _("Hariduskäik"),
    "name" => "education",
    "required" => true
));
$form->field("textarea", array(
    "label" => "Tehtud tööd:",
    "name" => "translationExperience",
    "required" => true
));

$form->group(_("Tõlketeenused"));
$form->field("textarea", array(
    "label" => _("Tõlkesuunad:"),
    "name" => "languageCombinations",
    "required" => true
));
$form->field("textarea", array(
    "label" => _("Tõlkevaldkonnad:"),
    "name" => "education",
    "required" => true
));
$form->field("radio", array(
    "label" => _("Kas teete suulist tõlget?:"),
    "name" => "oralTranslationSkills",
    "options" => array(_("Jah"), _("Ei")),
    "required" => true
));
$form->field("radio", array(
    "label" => _("Notariaalne kinnitamine?:"),
    "name" => "notarisationPossibility",
    "options" => array(_("Jah"), _("Ei")),
    "required" => true
));

$form->group(_("Palgasoov"));
$form->field("text", array(
    "label" => _("Ühe lehekülje hind (neto):"),
    "name" => "pricePerPage",
    "size" => "small",
    "required" => true
));
$form->field("radio", array(
    "label" => _("Kas olete FIE või eraisik?:"),
    "name" => "selfEmployedOrPrivate",
    "options" => array(_("FIE"), _("Eraisik")),
    "required" => true
));


if (!empty($_POST)) {
    $form->fill($_POST);
    $form->validate();
}

?>

<?=$scriba->markdown("toopakkumine");?>

<form action="" method="post" id="job-offer-form">

  <?php if (!$form->valid()) { ?>
    <p class="error-summary"><?=_("Palun täitke kohustuslikud väljad!")?></p>
  <?php } ?>

  <?php foreach ($form->allGroups() as $label => $group): ?>

  <fieldset>
    <legend><?=$label?></legend>

    <?php foreach ($group as $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label class="field-label"><?=$field->label(); ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <?php endforeach; ?>

  <p class="submit"><button type="submit" class="button"><?=_("Saada")?></button></p>

</form>

<script src="js/fileupload.js"></script>
