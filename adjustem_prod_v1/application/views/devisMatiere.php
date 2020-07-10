<br>
<div class="row">
    <div class="col-0 col-md-2"></div>
    <h4>Sélectionnez la matière de votre Menuiserie ainsi que sa couleur</h4>
</div>
<hr>
<form action="<?= site_url('DevisMatiere/validation') ?>" method="post">
    <!-- On affiche d'abord le choix des matières sous forme de Card avec photo -->
    <div class="row">
        <?php $count = 0;
        foreach ($details_matiere as $detail_matiere) {
            $count++ ?>
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center h50">
                        <h5 class="card-title"><?= $detail_matiere->det_nom ?></h5>
                    </div>
                    <div class="card-body h250">
                        <label>
                            <input class="form-check-input" type="radio" name="det_id" value="<?= $detail_matiere->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top" src="<?= base_url("assets/images/") . $detail_matiere->det_photo ?>" alt="<?= $detail_matiere->det_photo ?>">
                        </label>
                    </div>
                    <div class="card-footer text-center h100">
                        <p class="card-text"><?= $detail_matiere->det_descriptif ?></p>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <br>
    </div>
    <hr>
    <!-- On affiche ensuite la couleur extérieure avec un titre en caché afin de voir quel couleur est sélectionné et l'afficher à coté de la coloris
        Pareil avec la couleur intérieure -->
    <div class="row">
        <div class="col-12 col-sm-6">
            <?php $count = 0;
            foreach ($details_coul_ext as $detail) :
                $count++; ?>
                <?php if ($count == 1) { ?>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-md-8">
                            <h5>Coloris extérieure </h5>
                        </div>
                        <div class="col-4 col-sm-12 col-md-4">
                            <h6 id="choix_coul_ext" class="droite"><?= $detail->det_nom ?></h6>
                        </div>
                    </div>
                    <div class="row">
                    <?php } ?>
                    <div class="col-2 col-sm-3 col-md-2">
                        <h6 name="titreExt" class="invisible"><?= $detail->det_nom ?></h6>
                        <br>
                        <label>
                            <input class="form-check-input" type="radio" name="couleur_ext" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                <?php endforeach; ?>
                    </div>
        </div>
        <div class="col-12 col-sm-6">
            <?php $count = 0;
            foreach ($details_coul_int as $detail) :
                $count++ ?>
                <?php if ($count == 1) { ?>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-md-8">
                            <h5>Coloris intérieure </h5>
                        </div>
                        <div class="col-4 col-sm-12 col-md-4">
                            <h6 id="choix_coul_int" class="droite"><?= $detail->det_nom ?></h6>
                        </div>
                    </div>
                    <div class="row">
                    <?php } ?>
                    <div class="col-2 col-sm-3 col-md-2">
                        <h6 name="titreInt" class="invisible"><?= $detail->det_nom ?></h6>
                        <br>
                        <label>
                            <input class="form-check-input" type="radio" name="couleur_int" id="inlineRadio1" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                <?php endforeach; ?>
                    </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-3 col-md-2 col-xl-1">
            <button type="submit" class="btn btn-info">continuer</button>
        </div>
        <div class="col-6">
            <a class="btn btn-secondary" href="<?= site_url("DevisType/annulation") ?>">Retour arrière</a>
        </div>
    </div>
</form>