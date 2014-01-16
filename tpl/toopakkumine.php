<?php

$form = new Form();

$sections = array();

$personal = array();
$personal["Eesnimi:"] = $form->field(
    "text",
    array("name" => "firstName", "required" => true)
);
$personal["Perenimi:"] = $form->field(
    "text",
    array("name" => "lastName", "required" => true)
);
$personal["Sünniaeg:"] = $form->field(
    "text",
    array("name" => "birthDay", "required" => true)
);
$sections["Isikuandmed"] = $personal;

$contact = array();
$contact["Aadress:"] = $form->field(
    "text",
    array("name" => "address", "required" => true)
);
$contact["Telefon:"] = $form->field(
    "text",
    array("name" => "phone", "required" => true)
);
$contact["E-post:"] = $form->field(
    "text",
    array("name" => "email", "required" => true, "validator" => "email")
);
$contact["Skype kasutajatunnus:"] = $form->field(
    "text",
    array("name" => "skypeId")
);
$sections["Kontakt"] = $contact;

$experience = array();
$experience["Emakeel:"] = $form->field(
    "text",
    array("name" => "nativeLanguage", "required" => true)
);
$experience["Hariduskäik"] = $form->field(
    "textarea",
    array("name" => "education", "required" => true)
);
$experience["Tehtud tööd:"] = $form->field(
    "textarea",
    array("name" => "translationExperience", "required" => true)
);
$sections["Kogemused"] = $experience;

$skills = array();
$skills["Tõlkesuunad:"] = $form->field(
    "textarea",
    array("name" => "languageCombinations", "required" => true)
);
$skills["Tõlkevaldkonnad:"] = $form->field(
    "textarea",
    array("name" => "education", "required" => true)
);
$skills["Kas teete suulist tõlget?:"] = $form->field(
    "text",
    array("name" => "oralTranslationSkills", "required" => true)
);
$skills["Notariaalne kinnitamine?:"] = $form->field(
    "text",
    array("name" => "notarisationPossibility", "required" => true)
);
$sections["Tõlketeenused"] = $skills;

$salary = array();
$salary["Ühe lehekülje hind (neto):"] = $form->field(
    "text",
    array("name" => "pricePerPage", "required" => true)
);
$salary["Kas olete FIE või eraisik?"] = $form->field(
    "text",
    array("name" => "selfEmployedOrPrivate", "required" => true)
);
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

    <?php foreach ($section as $label => $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$label ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <?php endforeach; ?>

  <p class="submit"><button type="submit" class="button">Saada</button></p>

</form>

<script src="js/fileupload.js"></script>
