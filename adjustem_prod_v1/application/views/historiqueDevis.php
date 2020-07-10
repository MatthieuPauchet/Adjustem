<br>
<div class="row">
    <div class="col-2"></div>
    <?php if (count($panier) != 0) { ?>
        <h4 style="text-align: left">Contenu de votre <span class="capitalize"><?= $commande->com_etat?></span></h4>
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
<hr>
<div class="row">
    <a href="<?=site_url('ImpressionDevis/')?>" class="btn btn-info marginRight">PDF</a>
    <?php if ($commande->com_etat == "panier") { ?>
        <a href="<?=site_url('PanierValidation/PanierToDevis/').$commande->com_id?>" class="btn btn-success">Valider devis</a>
    <?php } ?>
    <!-- <a href="<?=site_url('ImpressionDevis/bootstrap/') ?>" class="btn btn-info">PDF - Bootstrap</a> -->
</div>