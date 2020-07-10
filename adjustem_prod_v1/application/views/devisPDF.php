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
    <style>


    </style>
</head>

<body>
    <div class="container">

        <div class="row">
            <div class="col-6">
                <img src="http://www.adjustem.com/images/logo_adjustem.png" alt="logo">
            </div>
            <div class="col-6">
                <h2>Devis</h2>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6">
                <h6>Livraison :</h6>
                <h6>Date : <span><?= date('d/m/Y') ?></span></h6>
                <h6>Délai : <span>5 semaines</span></h6>
            </div>
            <div class="col-6">
                <h5><span class="capitalize"><?= $client->cli_nom ?></span> <span class="capitalize"><?= $client->cli_prenom ?></span></h5>
                <div><?= $client->cli_rue ?></div>
                <div><?= $client->cli_code_postal ?></div>
                <div><?= $client->cli_ville ?></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Désignation</th>
                            <th scope="col">TVA</th>
                            <th scope="col">P.U HT</th>
                            <th scope="col">Qté</th>
                            <th scope="col">Total HT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 0;
                        foreach ($panier as $ligne) : $count++; ?>
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-6">
                                            <h5><?= $count . " - " . $ligne["element"]["type de menuiserie"] ?></h5>
                                            <h6>Hauteur : <?= $ligne["element"]["hauteur"] ?>mm</h6>
                                            <h6>Largeur : <?= $ligne["element"]["largeur"] ?>mm</h6>
                                            <h6><?= $ligne["element"]["type de pose"] ?></h6>
                                        </div>
                                        <div class="col-6">
                                            <ul>
                                                <?php $mo = 0;
                                                foreach ($ligne["element"] as $key => $value) {
                                                    $mo++ ?>
                                                    <?php if ($mo > 11) { ?>
                                                        <li> <span style="text-transform:capitalize;"> <?= $key ?> : </span><span style="text-transform:capitalize;"> <?= $value ?></span></li>
                                                    <?php } ?>
                                                <?php } ?>
                                            </ul>
                                        </div>
                                    </div>

                                </td>
                                <td><?= number_format($ligne["element"]["men_taux_TVA"], 2, ',', ' ') ?>%</td>
                                <td><?= number_format($ligne["element"]["men_prix_HT"], 2, ',', ' ') ?> €</td>
                                <td><?= $ligne["qty"] ?></td>
                                <td><?= number_format($ligne["element"]["men_prix_HT"] * $ligne["qty"], 2, ',', ' ') ?> €</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div>Règlement : paiement à la commande</div>
        </div>
        <div class="row">
            <div class="col-12">
                <?php if ($this->basket->get_price_sum("men_prix_HT") > 0) : ?>
                    <h5 class="text-right">Sous-total HT : <?= number_format($this->basket->get_price_sum("men_prix_HT"), 2, ',', ' ') ?> €</h5>
                    <?php if ($this->basket->get_price_sum("men_montant_TVA5") > 0) { ?>
                        <h5 class="text-right">TVA 5.5% : <?= number_format($this->basket->get_price_sum("men_montant_TVA5"), 2, ',', ' ') ?> €</h5>
                    <?php } ?>
                    <?php if ($this->basket->get_price_sum("men_montant_TVA20") > 0) { ?>
                        <h5 class="text-right">TVA 20% : <?= number_format($this->basket->get_price_sum("men_montant_TVA20"), 2, ',', ' ') ?> €</h5>
                    <?php } ?>
                    <h4 class="text-right">Total TTC : <?= number_format($this->basket->get_price_sum("men_prix_TTC"), 2, ',', ' ') ?> €</h4>
                <?php endif; ?>
            </div>
        </div>
        <div class="row">
            <h6>Bon pour commande</h6>
        </div>
        <div class="row">
            <div>le :</div>
        </div>
        <div class="row">
            <div>à :</div>
        </div>
        <div class="row">
            <div>Signature :</div>
        </div>
    </div>
</body>