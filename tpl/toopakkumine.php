<?php

$form = new Form();

$form->group("Isikuandmed");
$form->field("text", array(
    "label" => "Eesnimi:",
    "name" => "firstName",
    "required" => true
));
$form->field("text", array(
    "label" => "Perenimi:",
    "name" => "lastName",
    "required" => true
));
$form->field("text", array(
    "label" => "Sünniaeg:",
    "name" => "birthDay",
    "required" => true
));

$form->group("Kontakt");
$form->field("text", array(
    "label" => "Aadress:",
    "name" => "address",
    "required" => true
));
$form->field("text", array(
    "label" => "Telefon:",
    "name" => "phone",
    "required" => true
));
$form->field("text", array(
    "label" => "E-post:",
    "name" => "email",
    "required" => true,
    "validator" => "email"
));
$form->field("text", array(
    "label" => "Skype kasutajatunnus:",
    "name" => "skypeId"
));

$form->group("Kogemused");
$form->field("text", array(
    "label" => "Emakeel:",
    "name" => "nativeLanguage",
    "required" => true
));
$form->field("textarea", array(
    "label" => "Hariduskäik",
    "name" => "education",
    "required" => true
));
$form->field("textarea", array(
    "label" => "Tehtud tööd:",
    "name" => "translationExperience",
    "required" => true
));

$form->group("Tõlketeenused");
$form->field("textarea", array(
    "label" => "Tõlkesuunad:",
    "name" => "languageCombinations",
    "required" => true
));
$form->field("textarea", array(
    "label" => "Tõlkevaldkonnad:",
    "name" => "education",
    "required" => true
));
$form->field("text", array(
    "label" => "Kas teete suulist tõlget?:",
    "name" => "oralTranslationSkills",
    "required" => true
));
$form->field("text", array(
    "label" => "Notariaalne kinnitamine?:",
    "name" => "notarisationPossibility",
    "required" => true
));

$form->group("Palgasoov");
$form->field("text", array(
    "label" => "Ühe lehekülje hind (neto):",
    "name" => "pricePerPage",
    "required" => true
));
$form->field("text", array(
    "label" => "Kas olete FIE või eraisik?:",
    "name" => "selfEmployedOrPrivate",
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
  <p class="error-summary">Palun täitke kohustuslikud väljad!</p>
  <?php } ?>

  <?php foreach ($form->allGroups() as $label => $group): ?>

  <fieldset>
    <legend><?=$label?></legend>

    <?php foreach ($group as $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$field->label(); ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <?php endforeach; ?>

  <p class="submit"><button type="submit" class="button">Saada</button></p>

</form>

<script src="js/fileupload.js"></script>