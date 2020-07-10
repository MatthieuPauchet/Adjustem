<br>
<div class="row">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-md-10">
        <h4>Choix du type de Vitrage</h4>
    </div>
</div>
<hr>
<form action="<?= site_url('DevisVitrage/validation') ?>" method="post">

    <div class="row">
        <div class="col-12 col-md-6">
            <h5>Choix du vitrage acoustique</h5>
            <div class="row">
                <div class="form-check col-4">
                    <label>
                        <input class="form-check-input" type="radio" name="vit_perf_acoustique" value="1" checked>
                        <img class="h100" src="<?= base_url("assets/images/") . "vitrageAcoustique1.png" ?>" alt="1">
                    </label>
                </div>
                <div class="form-check col-4">
                    <label>
                        <input class="form-check-input" type="radio" name="vit_perf_acoustique" value="2">
                        <img class="h100" src="<?= base_url("assets/images/") . "vitrageAcoustique2.png" ?>" alt="2">
                    </label>
                </div>
                <div class="form-check col-4">
                    <label>
                        <input class="form-check-input" type="radio" name="vit_perf_acoustique" value="3">
                        <img class="h100" src="<?= base_url("assets/images/") . "vitrageAcoustique3.png" ?>" alt="3">
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <h5>Choix du vitrage sécurité</h5>
            <div class="row">
                <div class="form-check col-4">
                    <label>
                        <input class="form-check-input" type="radio" name="vit_perf_securite" value="1" checked>
                        <img class="h100" src="<?= base_url("assets/images/") . "vitrageSecurite1.png" ?>" alt="1">
                    </label>
                </div>
                <div class="form-check col-4">
                    <label>
                        <input class="form-check-input" type="radio" name="vit_perf_securite" value="2">
                        <img class="h100" src="<?= base_url("assets/images/") . "vitrageSecurite2.png" ?>" alt="2">
                    </label>
                </div>
                <div class="form-check col-4">
                    <label>
                        <input class="form-check-input" type="radio" name="vit_perf_securite" value="3">
                        <img class="h100" src="<?= base_url("assets/images/") . "vitrageSecurite3.png" ?>" alt="3">
                    </label>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <!-- <div class="row"> -->
    <?php $count = 0;
    foreach ($type_vitrage as $vitrage) : $count++; ?>
        <?php if ($count == 1) { ?>
            <div class="row">
                <div class="col-12">
                    <h6 class="inline">Votre vitrage sélectionné est le suivant :
                        <h5 class="inline"><span id="choix_vitrage_composition"><?= $vitrage->vit_composition ?></span>
                        - Sw = <span id="choix_vitrage_sw"><?= $vitrage->vit_sw ?></span>
                        - Uw = <span id="choix_vitrage_uw"><?= $vitrage->vit_uw ?></span></h5>
                    </h6>
                </div>
            </div>
        <?php } ?>
        <div class="col-12 invisible">
            <h6 name="vit_composition_list"><?= $vitrage->vit_composition ?></h6>
            <h6 name="vit_sw_list"><?= $vitrage->vit_sw ?></h6>
            <h6 name="vit_uw_list"><?= $vitrage->vit_uw ?></h6>
        </div>
    <?php endforeach; ?>
    <!-- </div> -->

    <hr>
    <div class="row">
        <div class="col-12 col-md-6">
            <h5>Choix de la finition du vitrage</h5>
            <div class="row">
                <?php $count = 0;
                foreach ($finition_vitrage as $detail) {
                    $count++ ?>
                    <div class="col-4">
                        <h6 name="titreExt" class="invisible"><?= $detail->det_nom ?></h6>
                        <br>
                        <label>
                            <input class="form-check-input" type="radio" name="finition_vitrage" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-4 col-xs-3 col-md-2 col-xl-1">
            <button type="submit" class="btn <?= $config->con_bouton_continuer?>">continuer</button>
        </div>
        <div class="col-6">
            <a class="btn <?= $config->con_bouton_retour?>" href="<?= site_url("DevisOuverture/annulation") ?>">Retour arrière</a>
        </div>
    </div>
</form>


<script>
    var type_vitrage = <?= $type_vitrage ?>;
</script>