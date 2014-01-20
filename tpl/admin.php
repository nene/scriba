<?php
$scriba->setSubTitle(_("Administreerimisliides"));

$loginFailed = false;

if (isset($_POST["user"]) && isset($_POST["pass"])) {
    if ($scriba->login($_POST["user"], $_POST["pass"])) {
        header("Location: ".$scriba->baseUrl());
        exit(0);
    } else {
        $loginFailed = true;
    }
}


?>

<h2>Administreerimisliides</h2>

<form action="" method="POST" id="login-form">
  <?php if ($loginFailed) { ?>
    <p class="error-summary"><?=_("Vale kasutajanimi või parool.")?></p>
  <?php } ?>

    <p class="small"><label class="field-label"><?=_("Kasutajanimi:")?></label>
       <input type="text" name="user"></p>

    <p class="small"><label class="field-label"><?=_("Parool:")?></label>
       <input type="password" name="pass"></p>

    <button type="submit" class="button">Logi sisse</button>
</form>
