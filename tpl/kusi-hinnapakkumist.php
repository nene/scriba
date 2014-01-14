<h2>Tõlkebüroo hinnapäring</h2>

<p>Scriba tõlkebüroo kindlustab Teie tellimusele lühikese tarneaja,
tasemel küljenduse ja <i>native speaker</i>’i korrektuuri. Kui Teie firmal on
vaja tellida tõlkeid võrdlemisi tihti, soovitame pöörduda meie poole,
et küsida püsikliendilepingut, millega kaasneb
<strong>hinnaalandus</strong> meie tavalisest hinnakirjast.</p>

<form action="" method="post" id="ask-price-form">

  <fieldset>
    <legend>Tellija</legend>

    <p class="required"><label>Firma või eraisiku nimi:</label>
      <input type="text" name="name"></p>

    <p class="required"><label>E-post:</label>
      <input type="text" name="email"></p>

    <p class="required"><label>Telefoninumber:</label>
      <input type="text" name="phone"></p>
  </fieldset>

  <fieldset>
    <legend>Tõlge</legend>

    <p class="required"><label>Tõlkesuund:</label>
      <select name="from_lang">
        <option selected="selected">Keelest...</option>
        <?php foreach(languages() as $lang) { echo "<option value='$lang'>$lang</option>"; } ?>
      </select>
      <select name="to_lang">
        <option selected="selected">Keelde...</option>
        <?php foreach(languages() as $lang) { echo "<option value='$lang'>$lang</option>"; } ?>
      </select>
    </p>

    <p class="required"><label>Lisainformatsioon:</label>
      <textarea name="description" rows="10" cols="40"></textarea></p>

    <p><label>Tõlke tähtaeg (valikuline):</label>
      <input type="text" name="deadline"></p>
  </fieldset>

  <fieldset>
    <legend>Failid</legend>

    <p>Soovitame lisada hinnapäringule kindlasti tõlkimist vajav tekst,
      et saaksime Teile täpsema pakkumise teha.</p>

    <p><button type="button" class="upload-button">Vali failid...</button></p>

    <!-- The actual file input field that we hide away -->
    <div class="file-input"><input type="file" name="files[]" multiple="multiple"></div>

    <!-- Empty list that gets populated with selected files -->
    <ul class="upload-filelist"></ul>

  </fieldset>

  <p class="submit"><button type="submit" class="button">Saada</button></p>

</form>

<script src="js/fileupload.js"></script>
