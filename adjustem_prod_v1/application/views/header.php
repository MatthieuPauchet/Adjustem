<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Devis Adjustem</title>
    <!-- Icone de adjutsem apparaissant dans l'onglet du navigateur -->
    <link rel="icon" type="image/png" href="http://www.adjustem.com/images/puce-titre.png" />
    <!-- Lien vers le CDN Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Feuille de style CSS UNIQUE pour le site  -->
    <link rel="stylesheet" href=<?= base_url("assets/css/css_adjustem.css") ?>>
</head>

<body>
    <div class="container">
        <div class="row marginTop">            
            <div class="col-12 col-md-4 col-lg-3">
                <img id="logo_header" src="http://www.adjustem.com/images/logo_adjustem.png" alt="logo adjustem">
            </div>
            <!-- <pre>
                <?php print_r($this->session); ?>
            </pre> -->
            <div class="col-12 col-md-8 col-lg-5 text-center">
                <h3>Votre devis menuiserie sur mesure</h3>
            </div>
            <div class="col-12 col-lg-4" id="bouton_header">
                <?php if ($this->auth->is_logged()) : ?>
                    <a href="<?= site_url('RecapDevis') ?>" class="btn btn-info inline">Espace personnel</a>
                    <a href="<?= site_url('Connection/logout') ?>" class="btn btn-light inline">Se déconnecter</a>
                <?php else : ?>
                    <a href="<?= site_url('Connection') ?>" class="btn btn-success">Se connecter</a>
                <?php endif; ?>
            </div>
        </div>