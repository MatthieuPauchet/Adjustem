<?php
class RecapDevis extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('commande_model');
        $this->load->model('client_model');
        $this->load->model('menuiserie_model');
    }

    public function index()
    {
        // Protection de la page : accessible pour les clients uniquement
        $this->auth->authorized(["client"], "Welcome/Loose");

        // requête pour récupérer toutes les informations du client
        $data['client'] = $this->client_model->get_client();
        $cli_id = $this->client_model->get_client_id();
        $data['commandes'] = $this->commande_model->get_commandes($cli_id);

        $this->load->view("header.php");
        $this->load->view("historiquePerso.php", $data);
        $this->load->view("footer.php");
    }

    public function detail($com_id)
    {
        // on vérifie que le client connecté accède bien à un de ses devis
        if ($this->client_model->check_com_to_cli($com_id)) {

            // on récupère chaque ligne de commande et les details des menuseries

            $lignes_commande = $this->commande_model->get_ligne_commande($com_id);

            $this->basket->clean();
            
            foreach ($lignes_commande as $ligne) {

                $men_id = $ligne->men_id;
                $menuiserie_detail = $this->menuiserie_model->get_menuiserie_detail($men_id);

                $tab = [
                    "men_id" => $ligne->men_id,
                    "hauteur" => $ligne->men_hauteur,
                    "largeur" => $ligne->men_largeur,
                    "nombre_vantaux" => $ligne->men_nombre_vantaux,
                    "men_prix_HT" => $ligne->men_prix_HT,
                    "men_taux_TVA" => $ligne->men_taux_TVA,
                    "men_montant_TVA20" => $ligne->men_montant_TVA20,
                    "men_montant_TVA5" => $ligne->men_montant_TVA5,
                    "men_prix_TTC" => $ligne->men_prix_TTC,
                ];
    
                foreach ($menuiserie_detail as $detail) {
                    $key = $detail->rub_nom;
                    $value = $detail->det_nom;
                    $tab[$key] = $value;
                } 
    
                $this->basket->add($tab, $ligne->pos_quantite_commandee);    
            }

            $data["panier"] = $this->basket->get_basket();
            $data["commande"] = $this->commande_model->get_commande($com_id);

            $this->load->view("header.php");
            $this->load->view("historiqueDevis.php",$data);
            $this->load->view("footer.php");
        } else {
            redirect(site_url("Welcome/loose"));
        }
    }
}
