<br>
<div class="row">
    <div class="col-2"></div>
    <?php if (count($panier) != 0) { ?>
        <h4 style="text-align: left">Contenu de votre Panier</h4>
    <?php } else { ?>
        <h4 style="text-align: left">Votre panier est vide <span style='font-size:50px;'>&#128532;</span> </h4>
    <?php } ?>
</div>
<hr>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Désignation</th>
                    <th scope="col">TVA</th>
                    <th scope="col">P.U HT</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total HT</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0;
                foreach ($panier as $ligne) : $count++; ?>
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <h5><?= $count . " - " . $ligne["element"]["type de menuiserie"] ?></h5>
                                    <h6>Hauteur : <?= $ligne["element"]["hauteur"] ?>mm</h6>
                                    <h6>Largeur : <?= $ligne["element"]["largeur"] ?>mm</h6>
                                    <h6><?= $ligne["element"]["type de pose"] ?></h6>
                                </div>
                                <div class="col-12 col-md-6">
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
                        <!-- <td><?= $ligne["qty"] ?></td> -->
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?= site_url('Panier/RetraitUn/') . $ligne["element"]["men_id"]  ?>" class="btn btn-secondary">-</a>
                                <button type="button" class="btn btn-light" disabled><?= $ligne["qty"] ?></button>
                                <a href="<?= site_url('Panier/AjoutUn/') . $ligne["element"]["men_id"]  ?>" class="btn btn-secondary">+</a>
                            </div>
                        </td>
                        <td><?= number_format($ligne["element"]["men_prix_HT"] * $ligne["qty"], 2, ',', ' ') ?> €</td>
                        <td>
                            <a href="<?= site_url("Panier/SupprimerLigne/") . $ligne["element"]["men_id"] ?>" class="btn btn-danger">X</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <?php if ($this->basket->get_price_sum("men_prix_HT") > 0) : ?>
            <h5 class="text-right">Sous-total ligne HT : <?= number_format($this->basket->get_price_sum("men_prix_HT"), 2, ',', ' ') ?> €</h5>
            <?php if ($this->basket->get_price_sum("men_montant_TVA5") > 0) { ?>
                <h5 class="text-right">TVA 5.5% : <?= number_format($this->basket->get_price_sum("men_montant_TVA5"), 2, ',', ' ') ?> €</h5>
            <?php } ?>
            <?php if ($this->basket->get_price_sum("men_montant_TVA20") > 0) { ?>
                <h5 class="text-right">TVA 20% : <?= number_format($this->basket->get_price_sum("men_montant_TVA20"), 2, ',', ' ') ?> €</h5>
            <?php } ?>
            <h4 class="text-right">Total ligne TTC : <?= number_format($this->basket->get_price_sum("men_prix_TTC"), 2, ',', ' ') ?> €</h4>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <a href="<?= site_url("Welcome/initialisation") ?>" class="btn btn-primary">Ajouter une menuiserie</a>
        <?php if (count($panier) != 0) { ?>
            <?php if ($this->auth->is_logged()) : ?>
                <a href="<?= site_url('PanierValidation') ?>" class="btn btn-success">Valider mon devis</a>
                <a href="<?= site_url('PanierValidation/enregistrer') ?>" class="btn btn-success">Enregistrer mon panier</a>
            <?php else : ?>
                <span>Veuillez vous connecter pour valider votre devis</span>
            <?php endif; ?>
            <a href="<?= site_url("Panier/Clean") ?>" class="btn btn-danger">Vider Panier</a>
        <?php } ?>
    </div>
</div>