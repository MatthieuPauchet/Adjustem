<br>
<div class="row">
    <div class="col-1 col-sm-2"></div>
    <h4>Sélectionnez votre type de Pose</h4>
</div>
<hr>
<form action="<?= site_url('DevisPose/validation') ?>" method="post">
    <div class="row">
        <?php $count = 0; foreach ($details as $detail) { $count++ ?>
            <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="card MLD20" style="width: 18rem">
                    <div class="card-header text-center h80">
                        <h5 class="card-title"><?= $detail->det_nom ?></h5>
                    </div>
                    <div class="card-body h250">
                        <label>
                            <input class="form-check-input" type="radio" name="det_id" value="<?= $detail->det_id ?>" required <?php $count==1 ? print "checked" : "" ?>>
                            <img class="card-img-top" src="<?= base_url("assets/images/") . $detail->det_photo ?>" alt="<?= $detail->det_photo ?>">
                        </label>
                    </div>
                    <div class="card-footer text-center h100">
                        <p class="card-text"><?= $detail->det_descriptif ?></p>
                    </div>
                </div>
            </div>
            <br>
        <?php } ?>
        <br>
    </div>
    <hr>
    <div class="row">
        <button type="submit" class="btn btn-info">Continuer</button>
    </div>
</form>