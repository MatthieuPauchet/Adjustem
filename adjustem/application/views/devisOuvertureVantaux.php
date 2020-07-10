<div class="col-12 col-lg-9">
    <h5> Choix du type d'ouverture</h5>
    <div class="row">
        <?php $count = 0; 
        foreach ($details_fenetre_simple as $detail) {
            $count++ ?>
            <div class="col-12 col-sm-6 col-md-4" name="vantail">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center headerCard_devisOuverture">
                        <h6 class="card-title"><?= $detail->det_nom ?></h6>
                    </div>
                    <div class="card-body bodyCard_devisOuverture">
                        <label>
                            <input class="form-check-input" type="radio" name="det_id" value="<?= $detail->det_id ?>" required <?php $count == 1 ? print "checked" : "" ?>>
                            <img class="card-img-top img_devisOuverture" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <?php foreach ($details_fenetre_double as $detail) { ?>
            <div class="col-12 col-sm-6 col-md-4 invisible" name="vantaux">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center headerCard_devisOuverture">
                        <h6 class="card-title"><?= $detail->det_nom ?></h6>
                    </div>
                    <div class="card-body bodyCard_devisOuverture">
                        <label>
                            <input class="form-check-input" type="radio" name="det_id" value="<?= $detail->det_id ?>" required>
                            <img class="card-img-top img_devisOuverture" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <br>
    </div>
</div>

</div>
<div class="row">
    <div class="col-4 col-xs-3 col-md-2 col-xl-1">
        <button type="submit" class="btn <?= $config->con_bouton_continuer?>">continuer</button>
    </div>
    <div class="col-6">
        <a class="btn <?= $config->con_bouton_retour?>" href="<?= site_url("DevisMatiere/annulation") ?>">Retour arrière</a>
    </div>
</div>
</form>