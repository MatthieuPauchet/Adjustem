<div class="row">
    <h5>Bonjour <span class="capitalize"><?= $client->cli_prenom ?></span> <span class="capitalize"><?= $client->cli_nom ?></span>, ci_dessous l'historique de vos devis</h5>
</div>

<div class="row">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">N° devis</th>
                <th scope="col">Date</th>
                <th scope="col">Etat</th>
                <th scope="col">montant HT</th>
                <th scope="col">montant TTC</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($commandes as $commande) { ?>
                <tr>
                    <td class="capitalize"><?= $commande->com_id ?></td>
                    <td><?= $commande->com_date ?></td>
                    <td><?= $commande->com_etat ?></td>
                    <td><?= $commande->com_total_HT ?></td>
                    <td><?= $commande->com_total_TTC ?></td>
                    <td><a href="<?= site_url('RecapDevis/detail/').$commande->com_id ?>" class="btn btn-info">Detail</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>