<br>
<div class="row">
    <div class="col-0 col-sm-2"></div>
    <h4>Récapitulatif de votre menuiserie </h4>
</div>
<hr>
<!-- On affiche sous forme de tableau le récap des choix précédement effectués -->
<div class="row">
    <div class="col-12 col-lg-6">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Rubrique</th>
                    <th scope="col">Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Hauteur</td>
                    <td><?= $infos_menuiserie->men_hauteur ?>mm</td>
                </tr>
                <tr>
                    <td>Largeur</td>
                    <td><?= $infos_menuiserie->men_largeur ?>mm</td>
                </tr>
                <?php foreach ($details_menuiserie as $detail) { ?>
                    <tr>
                        <td class="capitalize"><?= $detail->rub_nom ?></td>
                        <td><?= $detail->det_nom ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="col-12 col-lg-6">
        <div class="row">
            <div class="col-12">
                <p>Veuillez choisir la quantité avant de valider votre menuiserie</p>
            </div>
            <!-- On fait un formulaire avec la quantité de menuiserie à sélectionner
                 Pour cela on a placé un input caché pour récupérer la valeur qui est identique à celle du bouton -->
            <div class="col-12">
                <form action="<?= site_url("Panier/Ajout") ?>" method="post">
                    <div class="col-4 inline">
                        <div class="btn-group inline" role="group" aria-label="Basic example">
                            <a id="quantity-" class="btn btn-light">-</a>
                            <button id="quantity" class="btn" disabled>1</button>
                            <a id="quantity+" class="btn btn-light">+</a>
                        </div>
                    </div>
                    <input id="input_quantity" name="quantity" type="text" value="1" class="invisible">
                    <div class="col-8 inline">
                        <button type="submit" class="btn btn-success inline">Valider mon choix</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>