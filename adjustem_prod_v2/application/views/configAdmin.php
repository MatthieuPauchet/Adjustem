<br>
<form action="<?= site_url('admin/config') ?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-4">
            <h5>Police de caractère</h5>
        </div>
        <div class="col-4">
            <select class="form-control" name="police" size="1">
                <option value="Arial">Arial</option>
                <option value="Helvetica Neue">Helvetica Neue</option>
                <option value="Calibri (Corps)">Calibri (Corps)</option>
                <option value="BerBerlin Sans FBlin">Berlin Sans FB</option>
                <option value="Century">Century</option>
            </select>
        </div>
        <div class="col-4">
            <h6>En cours : <?= $config->con_police ?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h5>Couleur bouton Continuer</h5>
        </div>
        <div class="col-4">
            <select class="form-control" name="bouton_continuer" size="1">
                <option value="btn-primary" selected>Bleu roi</option>
                <option value="btn-secondary">Gris</option>
                <option value="btn-success">Vert</option>
                <option value="btn-danger">Rouge</option>
                <option value="btn-warning">Jaune</option>
                <option value="btn-light">Blanc</option>
                <option value="btn-dark">Noir</option>
                <option value="btn-info">Bleu Ciel</option>
            </select>
        </div>
        <div class="col-4">
            <button class="btn <?= $config->con_bouton_continuer?>">Test Continuer</button>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h5>Couleur bouton Retour arrière</h5>
        </div>
        <div class="col-4">
            <select class="form-control" name="bouton_retour" size="1">
                <option value="btn-secondary" selected>Gris</option>
                <option value="btn-primary">Bleu roi</option>
                <option value="btn-success">Vert</option>
                <option value="btn-danger">Rouge</option>
                <option value="btn-warning">Jaune</option>
                <option value="btn-light">Blanc</option>
                <option value="btn-dark">Noir</option>
                <option value="btn-info">Bleu Ciel</option>
            </select>
        </div>
        <div class="col-4">
            <button class="btn <?= $config->con_bouton_retour?>">Test Retour</button>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h5>Couleur bouton Valider</h5>
        </div>
        <div class="col-4">
            <select class="form-control" name="bouton_valider" size="1">
                <option value="btn-success" selected>Vert</option>
                <option value="btn-secondary">Gris</option>
                <option value="btn-primary">Bleu roi</option>
                <option value="btn-danger">Rouge</option>
                <option value="btn-warning">Jaune</option>
                <option value="btn-light">Blanc</option>
                <option value="btn-dark">Noir</option>
                <option value="btn-info">Bleu Ciel</option>
            </select>
        </div>
        <div class="col-4">
            <button class="btn <?= $config->con_bouton_valider?>">Test Valider</button>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <h5>Couleur bouton Annuler</h5>
        </div>
        <div class="col-4">
            <select class="form-control" name="bouton_annuler" size="1">
                <option value="btn-danger" selected>Rouge</option>
                <option value="btn-secondary">Gris</option>
                <option value="btn-primary">Bleu roi</option>
                <option value="btn-success">Vert</option>
                <option value="btn-warning">Jaune</option>
                <option value="btn-light">Blanc</option>
                <option value="btn-dark">Noir</option>
                <option value="btn-info">Bleu Ciel</option>
            </select>
        </div>
        <div class="col-4">
            <button class="btn <?= $config->con_bouton_annuler?>">Test Annuler</button>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
           <h5>Logo</h5>
        </div>
        <div>
            <input class="form-control" type="file" name="logo">
        </div>
        <div class="col-4">
            <h6>En cours : <?= $config->con_logo ?></h6>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-5"></div>
        <div class="col-auto">
            <button type="submit" class="btn <?= $config->con_bouton_valider?> ml-auto" id="submit">Envoyer</button>
            <button type="reset" class="btn <?= $config->con_bouton_annuler?> mr-auto">Annuler</button>
        </div>
    </div>
</form>