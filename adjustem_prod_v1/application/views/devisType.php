<br>
<div class="row">
    <div class="col-2"></div>
    <h4>Sélectionnez votre type de Menuiserie ainsi que ses dimensions</h4>
</div>
<hr>
<form action="<?= site_url('DevisType/validation') ?>" method="post">
    <div class="row">
        <?php $count = 0;
        foreach ($details as $detail) {
            $count++ ?>
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center h50">
                        <h5 class="card-title"><?= $detail->det_nom ?></h5>
                    </div>
                    <div class="card-body h250">
                        <label>
                            <input class="form-check-input" type="radio" name="det_id" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top h200" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <br>
    </div>
    <hr>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="row">
                <div class="col-12">
                    <h5>Choisissez votre unité de mesure</h5>
                </div>
            </div>
            <div class="row">
                <div class="form-check col-6">
                    <label>
                        <input class="form-check-input" type="radio" name="mesure" id="mm" value="mm" checked>
                        <img src="<?= base_url("assets/images/") . "mm.png" ?>" alt="mm">
                    </label>
                </div>
                <div class="form-check col-6">
                    <label>
                        <input class="form-check-input" type="radio" name="mesure" id="cm" value="cm">
                        <img src="<?= base_url("assets/images/") . "cm.png" ?>" alt="cm">
                    </label>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="row">
                <div class="col-12">
                    <h5>Rentrez les dimensions de mur à mur</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <label for="men_hauteur">hauteur</label>
                </div>
                <div class="col-4">
                    <input class="form-control" name="men_hauteur" type="text" id="men_hauteur" required>
                </div>
                <div class="col-2">
                    <label for="men_largeur">largeur</label>
                </div>
                <div class="col-4">
                    <input class="form-control" name="men_largeur" type="text" id="men_largeur" required>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <span id="span_men_hauteur">(entre 327 et 3000mm)</span>
                </div>
                <div class="col-6">
                    <span id="span_men_largeur">(entre 225 et 5900mm)</span>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-3 col-md-2 col-xl-1">
            <button type="submit" id="submit_type" class="btn btn-info" disabled>continuer</button>
        </div>
        <div class="col-6">
            <a class="btn btn-secondary" href="<?= site_url("DevisPose/annulation") ?>">Retour sur la pose</a>
        </div>
    </div>
</form>