        <hr>
        <?php if ($this->session->men_id > 0) :?>
        <div class="row">
            <a class="btn btn-light" href="<?= base_url() ?>">retour accueil</a>
        </div>
        <?php endif;?>
    </div>
</body>
    <!-- JavaScript pour le controle de formulaire -->
    <!-- <script src="/Fil_Rouge_AFPA/assets/js/validationForm.js"></script> -->
    <script src="<?= base_url("assets/js/validationForm.js")?>"></script>
    <!-- Lien vers le CDN de JavaScript, necessaire au Boostrap présent dans le Header.php | ATTENTION A L'ORDRE !-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</html>