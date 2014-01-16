<?php

$form = new Form();

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

$salary = array();
$salary["Ühe lehekülje hind (neto):"] = $form->field(
    "text",
    array("name" => "pricePerPage", "required" => true)
);
$salary["Kas olete FIE või eraisik?"] = $form->field(
    "text",
    array("name" => "selfEmployedOrPrivate", "required" => true)
);

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

  <fieldset>
    <legend>Isikuandmed</legend>

    <?php foreach ($personal as $label => $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$label ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <fieldset>
    <legend>Kontakt</legend>

    <?php foreach ($contact as $label => $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$label ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <fieldset>
    <legend>Kogemused</legend>

    <?php foreach ($experience as $label => $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$label ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <fieldset>
    <legend>Tõlketeenused</legend>

    <?php foreach ($skills as $label => $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$label ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <fieldset>
    <legend>Palgasoov</legend>

    <?php foreach ($salary as $label => $field): ?>

        <p class="<?=$field->cssCls();?>">
          <label><?=$label ?></label>
          <?=$field->html();?></p>

    <?php endforeach; ?>

  </fieldset>

  <p class="submit"><button type="submit" class="button">Saada</button></p>

</form>

<script src="js/fileupload.js"></script>
