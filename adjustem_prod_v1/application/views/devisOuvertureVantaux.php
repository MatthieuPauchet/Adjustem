<div class="col-12 col-lg-9">
    <h5> Choix du type d'ouverture</h5>
    <div class="row">
        <?php $count = 0; 
        foreach ($details_fenetre_simple as $detail) {
            $count++ ?>
            <div class="col-12 col-sm-6 col-md-4" name="vantail">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center h50">
                        <h6 class="card-title"><?= $detail->det_nom ?></h6>
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
        <?php foreach ($details_fenetre_double as $detail) { ?>
            <div class="col-12 col-md-6 col-lg-4 invisible" name="vantaux">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center h50">
                        <h6 class="card-title"><?= $detail->det_nom ?></h6>
                    </div>
                    <div class="card-body h250">
                        <label>
                            <input class="form-check-input" type="radio" name="det_id" value="<?= $detail->det_id ?>" required>
                            <img class="card-img-top h200" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
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
    <div class="col-3 col-md-2 col-xl-1">
        <button type="submit" class="btn btn-info">continuer</button>
    </div>
    <div class="col-6">
        <a class="btn btn-secondary" href="<?= site_url("DevisMatiere/annulation") ?>">Retour arrière</a>
    </div>
</div>
</form>