<br>
<div class="row">
    <div class="col-0 col-md-2"></div>
    <div class="col-12 col-md-10">
        <h4>Sélectionnez le type d'ouverture</h4>
    </div>
</div>
<hr>
<form action="<?= site_url('DevisOuverture/validation') ?>" method="post">
    <div class="row">
        <div class="col-12 col-sm-6 col-lg-3">
            <h5>choix nombre de vantaux</h5>
            <div class="row">
                <div class="form-check col-6">
                    <label>
                        <input class="form-check-input" type="radio" name="nb_vantaux" id="vantail1" value="2" checked>
                        <img class="h100" src="<?= base_url("assets/images/") . "vantail2.png" ?>" alt="mm">
                    </label>
                </div>
                <div class="form-check col-6">
                    <label>
                        <input class="form-check-input" type="radio" name="nb_vantaux" id="vantail2" value="3">
                        <img class="h100" src="<?= base_url("assets/images/") . "vantail3.png" ?>" alt="cm">
                    </label>
                </div>
            </div>
        </div>