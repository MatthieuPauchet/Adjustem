<br>
<div class="row">
    <div class="col-1 col-sm-3 col-md-4"></div>
    <div class="col-10 col-sm-8 col-md-6">
        <a class="btn btn-light">
            <legend id="legend_connection"> Se connecter en Admin </legend>
        </a>
    </div>
</div>
<br>
<form action="<?= site_url('Admin/login') ?>" id="form_connection" form="form-group" enctype="multipart/form-data" method="POST" class="">
    <div class="row">
        <div class="col-2 col-md-3"></div>
        <div class="col-4 col-md-3">
            <label class="text-end" for="mail">Email</label>
        </div>
        <div class="col-4 col-md-3">
            <input class="form-control" name="mail" type="text" id="mail">
            <span id="aide_mail"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-1 col-sm-2 col-md-3"></div>
        <div class="col-5 col-sm-4 col-md-3">
            <label class="text-end" for="password">Mot de passe</label>
        </div>
        <div class="col-4 col-md-3">
            <input class="form-control" name="password" type="password" id="password">
            <span id="aide_password"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-auto">
            <button type="submit" class="btn <?= $config->con_bouton_valider?> ml-auto" id="submit">Envoyer</button>
            <button type="reset" class="btn <?= $config->con_bouton_annuler?> mr-auto">Annuler</button>
        </div>
    </div>
</form>