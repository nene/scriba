<?php

$form = new Form();

$sections = array();

$personal = array();
$personal[]= $form->field("text", array(
    "label" => "Eesnimi:",
    "name" => "firstName",
    "required" => true
));
$personal[]= $form->field("text", array(
    "label" => "Perenimi:",
    "name" => "lastName",
    "required" => true
));
$personal[]= $form->field("text", array(
    "label" => "Sünniaeg:",
    "name" => "birthDay",
    "required" => true
));
$sections["Isikuandmed"] = $personal;

$contact = array();
$contact[]= $form->field("text", array(
    "label" => "Aadress:",
    "name" => "address",
    "required" => true
));
$contact[]= $form->field("text", array(
    "label" => "Telefon:",
    "name" => "phone",
    "required" => true
));
$contact[]= $form->field("text", array(
    "label" => "E-post:",
    "name" => "email",
    "required" => true,
    "validator" => "email"
));
$contact[]= $form->field("text", array(
    "label" => "Skype kasutajatunnus:",
    "name" => "skypeId"
));
$sections["Kontakt"] = $contact;

$experience = array();
$experience[]= $form->field("text", array(
    "label" => "Emakeel:",
    "name" => "nativeLanguage",
    "required" => true
));
$experience[]= $form->field("textarea", array(
    "label" => "Hariduskäik",
    "name" => "education",
    "required" => true
));
$experience[]= $form->field("textarea", array(
    "label" => "Tehtud tööd:",
    "name" => "translationExperience",
    "required" => true
));
$sections["Kogemused"] = $experience;

$skills = array();
$skills[]= $form->field("textarea", array(
    "label" => "Tõlkesuunad:",
    "name" => "languageCombinations",
    "required" => true
));
$skills[]= $form->field("textarea", array(
    "label" => "Tõlkevaldkonnad:",
    "name" => "education",
    "required" => true
));
$skills[]= $form->field("text", array(
    "label" => "Kas teete suulist tõlget?:",
    "name" => "oralTranslationSkills",
    "required" => true
));
$skills[]= $form->field("text", array(
    "label" => "Notariaalne kinnitamine?:",
    "name" => "notarisationPossibility",
    "required" => true
));
$sections["Tõlketeenused"] = $skills;

$salary = array();
$salary[]= $form->field("text", array(
    "label" => "Ühe lehekülje hind (neto):",
    "name" => "pricePerPage",
    "required" => true
));
$salary[]= $form->field("text", array(
    "label" => "Kas olete FIE või eraisik?:",
    "name" => "selfEmployedOrPrivate",
    "required" => true
));
$sections["Palgasoov"] = $salary;


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

  <?php foreach ($sections as $sectionLabel => $section): ?>

  <fieldset>
    <legend><?=$sectionLabel?></legend>

    <?php foreach ($section as $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$field->label(); ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <?php endforeach; ?>

  <p class="submit"><button type="submit" class="button">Saada</button></p>

</form>

<script src="js/fileupload.js"></script>
