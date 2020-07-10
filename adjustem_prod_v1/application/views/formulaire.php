<hr>

<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
        <a class="btn btn-light">
            <legend id="legend_connection">Déjà Inscrit - Se connecter</legend>
        </a>
    </div>
    <div class="col-2"></div>
    <div class="col-4">
        <a  class="btn btn-light">
            <legend id="legend_inscription">Formulaire d'inscription</legend>
        </a> 
    </div>
    <div class="col-1"></div>
</div>
<hr>
<!-- 1er formulaire pour se connecter en étant déjà inscrit -->
<form action="<?= site_url('Connection/login') ?>" id="form_connection" form="form-group" enctype="multipart/form-data" method="POST" class="">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2">
            <label class="text-right" for="mail">Email</label>
        </div>
        <div class="col-3">
            <input class="form-control" name="mail" type="text" id="mail">
            <span id="aide_mail"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-3"></div>
        <div class="col-2">
            <label class="text-right" for="password">Mot de passe</label>
        </div>
        <div class="col-3">
            <input class="form-control" name="password" type="password" id="password">
            <span id="aide_password"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-auto">
            <button type="submit" class="btn btn-success ml-auto" id="submit">Envoyer</button>
            <button type="reset" class="btn btn-danger mr-auto">Annuler</button>
        </div>
    </div>
</form>
<!-- 2nd formulaire pour s'inscrire sans être connecté -->
<form action="<?= site_url('Connection/Inscription') ?>" id="form_inscription" form="form-group" enctype="multipart/form-data" method="POST" class="invisible">
    <div class="row">
        <div class="col-sm-4 col-lg-2">
            <label for="cli_nom">Nom *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <input class="form-control" name="cli_nom" type="text" id="cli_nom">
            <span id="aideCli_nom"></span>
        </div>
        <div class="col-sm-4 col-lg-2">
            <label for="cli_prenom">Prénom *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <input class="form-control" name="cli_prenom" type="text" id="cli_prenom">
            <span id="aideCli_prenom"></span>
        </div>
    </div>
    <div class=row>
        <div class="col-sm-4 col-lg-2">
            <label for="cli_rue">Adresse *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <textarea class="form-control" type="text" name="cli_rue" id="cli_rue" rows="6"></textarea>
            <span id="aideCli_rue"></span>
        </div>
        <div class="col-12 col-lg-6">
            <div class="row">
                <div class="col-sm-4">
                    <label for="cli_code_postal">Code postal *</label>
                </div>
                <div class="col-sm-8">
                    <input class="form-control" name="cli_code_postal" type="text" id="cli_code_postal">
                    <span id="aideCli_code_postal"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label for="cli_ville">Ville *</label>
                </div>
                <div class="col-sm-8">
                    <input class="form-control" name="cli_ville" type="text" id="cli_ville">
                    <span id="aideCli_ville"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <label for="cli_pays">Pays *</label>
                </div>
                <div class="col-sm-8">
                    <input class="form-control" name="cli_pays" type="text" id="cli_pays">
                    <span id="aideCli_pays"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-lg-2">
            <label for="cli_mail">Email *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <input class="form-control" name="cli_mail" type="text" id="cli_mail">
            <span id="aideCli_email"></span>
        </div>

        <div class="col-sm-4 col-lg-2">
            <label for="cli_telephone">Télephone *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <input class="form-control" name="cli_telephone" type="text" id="cli_telephone">
            <span id="aideCli_telephone"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-lg-2">
            <label for="cli_password">Mot de passe *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <input class="form-control" name="cli_password" type="password" id="cli_password">
            <span id="aideCli_password"></span>
        </div>

        <div class="col-sm-4 col-lg-2">
            <label for="cli_password2">Confirmez mot de passe *</label>
        </div>
        <div class="col-sm-8 col-lg-4">
            <input class="form-control" name="cli_password2" type="password" id="cli_password2">
            <span id="aideCli_password2"></span>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <p id="rouge">* Ces zones sont obligatoires</p>
        </div>
    </div>
    <br>
    <div class="col-auto modal-footer">
        <button type="submit" class="btn btn-success ml-auto" id="submit_inscription">Envoyer</button>
        <button type="reset" class="btn btn-danger mr-auto">Annuler</button>
    </div>
</form>
<div class="row">
    <div class="col-2"></div>
    <div class="col-6">
        <a href="<?= $_SERVER["HTTP_REFERER"] ?>" class="btn btn-info">Retour précédent</a>
    </div>
</div>