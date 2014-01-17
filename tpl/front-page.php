<div id="ordering-presentation">
     <h2><?=_("Tõlketöö tellimine:")?></h2>

<div id="slides">
  <div class="slide slide-1">
  <p><span class="nr">1</span> <strong><?=_("Saada päring")?></strong>
  <?=_("Kirjuta meile, mis keelest mis keelde kirjalikku või suulist tõlget soovid.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-2">
  <p><span class="nr">2</span> <strong><?=_("Teeme pakkumise")?></strong>
  <?=_("Vastame esimesel võimalusel ja teatame tõlketöö maksumuse ning tähtaja.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-3">
  <p><span class="nr">3</span> <strong><?=_("Kinnita tellimus")?></strong>
  <?=_("Kui oled hinnapakkumisega nõus, saada e-postiga tellimuse kinnitus.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-4">
  <p><span class="nr">4</span> <strong><?=_("Tõlkimine")?></strong>
  <?=_("Pärast tõlke valmimist toimub materjali kujundamine, korrektuur ja ülevaatus toimetaja poolt.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

  <div class="slide slide-5">
  <p><span class="nr">5</span> <strong><?=_("Valmis")?></strong>
  <?=_("Toimetame tõlgitud materjalid sinuni.")?>
  <a class="slidesjs-next slidesjs-navigation" href="#">&gt;</a></p>
  </div>

</div>

<p class="ask-price"><a href="<?=$base_url?>/price-query" class="button"><?=_("Küsi hinnapakkumist")?> &nbsp; &gt;</a></p>
</div>


<div class="col-1">
  <h2><?=_("Teenused")?></h2>

  <ul id="services">
    <li class="written-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/written-translation"><?=_("Kirjalik tõlge")?></a></h3>
      <p><?=_("Tõlke saadame tagasi võimalikult originaalilähedase kujundusega. Keerukamate formaatide ja trükiste puhul pakume ka küljendusteenust.")?>
      <a href="<?=$scriba->baseUrl()?>/written-translation"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="oral-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/oral-translation"><?=_("Suuline tõlge")?></a></h3>
      <p><?=_("Konverentsidel, koosolekutel kui ka muudel üritustel, kus on oluline, et info jõuaks kõikide kuulajateni võimalikult kiiresti.")?>
      <a href="<?=$scriba->baseUrl()?>/oral-translation"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="referative-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/referatiivne-tolge"><?=_("Referatiivne tõlge")?></a></h3>
      <p><?=_("Kui teil pole tarvis täielikku viimistletud tõlget, vaid tarvis saada pigem kirjalik või suuline ülevaade teksti sisust.")?>
      <a href="<?=$scriba->baseUrl()?>/referatiivne-tolge"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="proofreading">
      <h3><a href="<?=$scriba->baseUrl()?>/korrektuur-ja-toimetamine"><?=_("Korrektuur ja toimetamine")?></a></h3>
      <p><?=_("Teksti korrektuur tähendab teksti õigekeelsusnõuetega vastavusse viimist ja trükivigade parandamist.  Toimetamine sisaldab teksti keelelist ja ka sisulist parandamist.")?>
      <a href="<?=$scriba->baseUrl()?>/korrektuur-ja-toimetamine"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="notarisation">
      <h3><a href="<?=$scriba->baseUrl()?>/notariaalne-kinnitamine"><?=_("Notariaalne kinnitamine")?></a></h3>
      <p><?=_("Tõlgitud dokumentide välisriigis kasutamiseks võidakse nõuda notariaalselt kinnitatud tõlkeid.")?>
      <a href="<?=$scriba->baseUrl()?>/notariaalne-kinnitamine"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="apostilling">
      <h3><a href="<?=$scriba->baseUrl()?>/apostillimine"><?=_("Apostillimine")?></a></h3>
      <p><?=_("Apostill näitab välisriigi ametnikule, et mis tahes apostilliga kinnitatud dokumendi välja andnud asutus eksisteerib ning tohib taolisi dokumente välja anda.")?>
      <a href="<?=$scriba->baseUrl()?>/apostillimine"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="legal-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/oigustolge"><?=_("Õigustõlge")?></a></h3>
      <p><?=_("Õigustekstide tõlke alla kuuluvad tõlkijalt ülimat täpsust ja korrektsust nõudvad õigusaktide ja muude juriidiliste dokumentide tõlked.")?>
      <a href="<?=$scriba->baseUrl()?>/oigustolge"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="technical-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/tehnikatolge"><?=_("Tehnikatõlge")?></a></h3>
      <p><?=_("Tehnikatõlge on ala, kus saavad kokku tõlkijate keelelised teadmised ja tehnikainimeste erialateadmised.")?>
      <a href="<?=$scriba->baseUrl()?>/tehnikatolge"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="web-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/kodulehe-tolge"><?=_("Kodulehe tõlge")?></a></h3>
      <p><?=_("Meil on laialdased kogemused kodulehtede tõlkimisel: oleme teinud nii eesti- kui ka võõrkeelsele tekstile korrektuuri, parandanud trüki- ja kirjavigu.")?>
      <a href="<?=$scriba->baseUrl()?>/kodulehe-tolge"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="manual-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/kasutusjuhendi-tolge"><?=_("Kasutusjuhendi tõlge")?></a></h3>
      <p><?=_("Kasutusjuhendid erinevad teistest tekstidest oma ülesehituse ja keelekasutuse poolest, mistõttu on vajalik, et tõlkijal oleks selles vallas piisavalt kogemust, et tagada parim tulemus.")?>
      <a href="<?=$scriba->baseUrl()?>/kasutusjuhendi-tolge"><?=_("Loe edasi")?></a></p>
    </li>
    <li class="movie-translation">
      <h3><a href="<?=$scriba->baseUrl()?>/filmitolge"><?=_("Filmitõlge")?></a></h3>
      <p><?=_("Kuigi filmiklipp võib lühike tunduda, võib tõlkimist vajav tekst üsnagi pikk tulla ning seega soovitame selleks tööks piisavalt aega varuda.")?>
      <a href="<?=$scriba->baseUrl()?>/filmitolge"><?=_("Loe edasi")?></a></p>
    </li>
  </ul>

</div>

<div class="col-2" id="client-quotes">

  <h2><?=_("Kliendid meist")?></h2>

  <div class="client-quote">
    <blockquote>
      <p><strong>Tõlked valmisid täpselt kokkulepitud ajaks.</strong></p>
      <p>Kasutasime Scriba Tõlkebüroo teenuseid ventilaatorite ja
      teiste ventilatsiooniseadmete brošüüride tõlkimiseks soome
      keelde. Tõlked valmisid täpselt kokkulepitud
      ajaks. Tavaliselt on tehniliste tõlgete puhul vaja teha
      hiljem mitmeid parandusi, kuid Scriba tõlge oli teostatud
      väga professionaalselt ja täpseid tehnilisi termineid
      kasutades. Tõlketööle veel hiljem lisandunud fraasid said
      tõlgitud samal päeval. Hinnatase oli ka väga
      taskukohane. Seepärast kasutan Scriba teenuseid vajadusel ka
      edaspidi ja soovitan seda kindlasti ka kõikidele
      teistele.</p>
    </blockquote>

    <p class="client">Margus (kirjalik tõlge)</p>
  </div>

  <div class="client-quote">
    <blockquote>
      <p><strong>Rõõm oli tõdeda, et nad hoolitsesid meie
      tellimuse eest nii, nagu see oleks ka nende jaoks
      eksistentsiaalne küsimus.</strong></p>
      <p>Oleme Scriba Tõlkebüroole usaldanud ühe oma olulisima
      ülesande &ndash; meie vahetu esindamine klientidele. Sellise
      koostöövormi kõige olulisemaks märksõnaks on usaldus, mis
      teatavasti kasvab ajas ja kogemustes. Lühikese aja, ent
      olulise kogemuse võrra rikkamana, teame omalt poolt väita,
      et ka Scriba meeskond teab hästi, mida tähendab tähtaeg,
      ladus koostöö ja oma erialale täielik pühendumine. Rõõm oli
      tõdeda, et nad hoolitsesid meie tellimuse eest nii, nagu see
      oleks ka nende jaoks eksistentsiaalne küsimus, mis oluliselt
      vähendab tellijapoolset muret kvaliteedikriteeriumite
      pärast.</p>
    </blockquote>

    <p class="client">Kristiina (suuline tõlge)</p>
  </div>

</div>

