<br>
<div class="row">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-md-10">
        <h4>Choix du Volet Roulant</h4>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-1 col-sm-2 col-md-3 col-lg-4"></div>
    <div class="col-10 col-sm-8 col-md-6 col-lg-4">
        <h5>Avec ou sans Volet Roulant ?</h5>
        <div class="row">
            <div class="form-check col-6">
                <label>
                    <input class="form-check-input" type="radio" name="VR" id="sansVR" value="1" checked>
                    <img class="" src="<?= base_url("assets/images/") . "sansVR.png" ?>" alt="mm">
                </label>
            </div>
            <div class="form-check col-6">
                <label>
                    <input class="form-check-input" type="radio" name="VR" id="avecVR" value="2">
                    <img class="" src="<?= base_url("assets/images/") . "avecVR.png" ?>" alt="cm">
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row" id="lien">
    <div class="col-12">
        <hr>
    </div>
    <div class="col-4 col-xs-3 col-md-2 col-xl-1">
        <a class="btn <?= $config->con_bouton_continuer?>" href="<?= site_url('DevisRecap') ?>">continuer</a>
    </div>
    <div class="col-6">
        <a class="btn <?= $config->con_bouton_retour?>" href="<?= site_url("DevisVitrage/annulation") ?>">Retour arrière</a>
    </div>
</div>
<hr>
<form id="detailVR" class="invisible" action="<?= site_url('DevisVolet/validation') ?>" method="post">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-12">
                    <h5>Choix matière des lames</h5>
                </div>
            </div>
            <hr>
            <div class="row">
                <?php $count = 0;
                foreach ($matieres_lame as $detail) {
                    $count++ ?>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-4" name="vantail">
                        <div class="card MLD20" style="width: 18rem">
                            <div class="card-body h150">
                                <label>
                                    <input class="form-check-input" type="radio" name="matieres_lame" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                                    <img class="card-img-top h100" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                                </label>
                            </div>
                            <div class="card-footer text-center h65">
                                <h6 class="card-title"><?= $detail->det_nom ?></h6>
                                <!-- <p class="card-text"><?= $detail->det_descriptif ?></p> -->
                            </div>
                        </div>
                    </div>
                    <br>
                <?php } ?>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <?php $count = 0;
            foreach ($couleurs_vr as $detail) :
                $count++ ?>
                <?php if ($count == 1) { ?>
                    <div class="row">
                        <div class="col-8 col-sm-8 col-md-8">
                            <h5>choix couleur volet roulant</h5>
                        </div>
                        <div class="col-4 col-sm-4 col-md-4">
                            <h6 id="choix_couleur" class="droite"><?= $detail->det_nom ?></h6>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                    <?php } ?>
                    <div class="col-3 col-sm-2 col-lg-3">
                        <h6 name="titreCouleur" class="invisible"><?= $detail->det_nom ?></h6>
                        <br>
                        <label>
                            <input class="form-check-input" type="radio" name="couleur_VR" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                <?php endforeach; ?>
                    </div>
                    <hr>
                    <?php $count = 0;
                    foreach ($manoeuvres_vr as $detail) :
                        $count++ ?>
                        <?php if ($count == 1) { ?>

                            <div class="row">
                                <div class="col-8 col-sm-8 col-md-8">
                                    <h5>choix manoeuvre volet roulant</h5>
                                </div>
                                <div class="col-4 col-sm-4 col-md-4">
                                    <h6 id="choix_commande" class="droite"><?= $detail->det_nom ?></h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                            <?php } ?>

                            <div class="col-3 col-sm-2 col-lg-3">
                                <h6 name="titreManoeuvre" class="invisible"><?= $detail->det_nom ?></h6>
                                <label>
                                    <input class="form-check-input" type="radio" name="manoeuvre_VR" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                                    <img class="card-img-top h65" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                                </label>
                            </div>
                            <br>
                        <?php endforeach; ?>
                            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-4 col-xs-3 col-md-2 col-xl-1">
            <button type="submit" class="btn <?= $config->con_bouton_continuer?>">continuer</button>
        </div>
        <div class="col-6">
            <a class="btn <?= $config->con_bouton_retour?>" href="<?= site_url("DevisVitrage/annulation") ?>">Retour arrière</a>
        </div>
    </div>
</form>