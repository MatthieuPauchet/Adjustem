
<!-- formulaire de validation de commande pour pré-remplir la table commande avec l'adresse de facturation et livraison pré-rempli en fonction du client -->
<form action="<?= site_url('PanierValidation/Validation') ?>" form="form-group" enctype="multipart/form-data" method="POST">
    <hr>
    <div class="row">
        <div class="col-12 text-center">
            <h2>Formulaire de Validation de votre devis <?=  date('Y-m-d H:i:s') ?></h2>
        </div>
    </div>
    <hr>
    <!-- TODO: formulaire JS de contrôle de saisie -->
    <fieldset>
        <div class="row">
            <div class="col-12 text-center">
                <h4>Adresse de Livraison</h4>
            </div>
        </div>
        <div class=row>
            <div class="col-sm-4 col-lg-2">
                <label for="com_livraison_rue">Adresse *</label>
            </div>
            <div class="col-sm-8 col-lg-4">
                <textarea class="form-control" type="text" name="com_livraison_rue" id="com_livraison_rue" rows="6"><?= $client->cli_rue ?></textarea>
                <span id=" aide_com_livraison_rue"></span>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="com_livraison_code_postal">Code postal *</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="com_livraison_code_postal" type="text" id="com_livraison_code_postal" value="<?= $client->cli_code_postal ?>">
                        <span id="aide_com_livraison_code_postal"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="com_livraison_ville">Ville *</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="com_livraison_ville" type="text" id="com_livraison_ville" value="<?= $client->cli_ville ?>">
                        <span id="aide_com_livraison_code_postal"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="com_livraison_pays">Pays *</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="com_livraison_pays" type="text" id="com_livraison_pays" value="<?= $client->cli_pays ?>">
                        <span id="aide_com_livraison_pays"></span>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
    <br>
    <fieldset>
        <div class="row">
            <div class="col-12 text-center">
                <h4>Adresse de Facturation</h4>
            </div>
        </div>
        <div class=row>
            <div class="col-sm-4 col-lg-2">
                <label for="com_facture_rue">Adresse *</label>
            </div>
            <div class="col-sm-8 col-lg-4">
                <textarea class="form-control" type="text" name="com_facture_rue" id="com_facture_rue" rows="6"><?= $client->cli_rue ?></textarea>
                <span id=" aide_com_facture_rue"></span>
            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-sm-4">
                        <label for="com_facture_code_postal">Code postal *</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="com_facture_code_postal" type="text" id="com_facture_code_postal" value="<?= $client->cli_code_postal ?>">
                        <span id="aide_com_facture_code_postal"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="com_facture_ville">Ville *</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="com_facture_ville" type="text" id="com_facture_ville" value="<?= $client->cli_ville ?>">
                        <span id="aide_com_facture_ville"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="com_facture_pays">Pays *</label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="com_facture_pays" type="text" id="com_facture_pays" value="<?= $client->cli_pays ?>">
                        <span id="aide_com_facture_pays"></span>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <div class="row">
        <div class="col-12">
            <p id="rouge">* Ces zones sont obligatoires</p>
        </div>
    </div>
    <br>
    <div class="col-auto modal-footer">
        <button type="submit" class="btn btn-success ml-auto" id="submit">Valider devis</button>
        <a href="<?= site_url("Panier") ?>" class="btn btn-danger mr-auto">Annuler</a>
    </div>


</form>