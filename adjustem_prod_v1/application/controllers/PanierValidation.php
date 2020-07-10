<?php
class PanierValidation extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('menuiserie_model');
        $this->load->model('commande_model');
    }

    public function index()
    {

        // Protection de la page : accessible pour les clients uniquement
        $this->auth->authorized(["client"], "Welcome/Loose");

        // requête pour récupérer toutes les informations du client
        $data['client'] = $this->client_model->get_client();

        $this->load->view("header.php");
        $this->load->view("panierValidation.php", $data);
        $this->load->view("footer.php");
    }

    public function validation()
    {
        // Protection de la page : accessible pour le groupe employé uniquement
        $this->auth->authorized(["client"], "Welcome/Loose");

        $data['client'] = $this->client_model->get_client();

        $this->form_validation->set_rules('com_livraison_rue', 'adresse',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('com_livraison_code_postal', 'required|code postal',  'regex_match[/^[0-9]{5}$/]');
        $this->form_validation->set_rules('com_livraison_ville', 'ville',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('com_livraison_pays', 'pays',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('com_facture_rue', 'adresse',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('com_facture_code_postal', 'required|code postal',  'regex_match[/^[0-9]{5}$/]');
        $this->form_validation->set_rules('com_facture_ville', 'ville',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('com_facture_pays', 'pays',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');



        // if ($this->input->post() && $this->form_validation->run()) {
        if ($this->input->post()) {

            // permet l'affichage de toutes les tâches effectuées
            $this->output->enable_profiler(TRUE);


            // création d'un tableau avec tous les champs à insérer dans la table client 
            $commande = array(
                'com_livraison_rue' => htmlentities($this->input->post('com_livraison_rue')),
                'com_livraison_code_postal' => htmlentities($this->input->post('com_livraison_code_postal')),
                'com_livraison_ville' => htmlentities($this->input->post('com_livraison_ville')),
                'com_livraison_pays' => htmlentities($this->input->post('com_livraison_pays')),
                'com_facture_rue' => htmlentities($this->input->post('com_facture_rue')),
                'com_facture_code_postal' => htmlentities($this->input->post('com_facture_code_postal')),
                'com_facture_ville' => htmlentities($this->input->post('com_facture_ville')),
                'com_facture_pays' => htmlentities($this->input->post('com_facture_pays')),
                'com_date' => date('Y-m-d H:i:s'),
                'com_total_HT' => $this->basket->get_price_sum("men_prix_HT") * $data['client']->cli_coefficient,
                'com_total_TTC' => $this->basket->get_price_sum("men_prix_TTC") * $data['client']->cli_coefficient,
                'com_montant_TVA5' => $this->basket->get_price_sum("men_montant_TVA5"),
                'com_montant_TVA20' => $this->basket->get_price_sum("men_montant_TVA20"),
                'com_etat' => "devis",
                'com_livraison_avancement' => "en attente",
                // TODO: fixer le com_facture_numero 
                'com_facture_numero' => null,
                'com_paiement_date' => date('Y-m-d H:i:s'),
                'com_facture_date' =>  date('Y-m-d H:i:s'),
                'com_cli_id' => $data['client']->cli_id,
            );

            $id = $this->commande_model->create_commande($commande);
            $panier_contenu = $this->basket->get_basket();
            foreach ($panier_contenu as $ligne) :
                $posseder = array(
                    'pos_men_id' => $ligne["element"]["men_id"],
                    'pos_com_id' => $id,
                    'pos_quantite_commandee' => $ligne["qty"],
                    'pos_prix_unitaire_HT' => $ligne["element"]["men_prix_HT"] * $data['client']->cli_coefficient,
                    'pos_taux_TVA' => $ligne["element"]["men_taux_TVA"],
                    'pos_montant_TVA5' => $ligne["element"]["men_montant_TVA5"] * $data['client']->cli_coefficient,
                    'pos_montant_TVA20' => $ligne["element"]["men_montant_TVA20"] * $data['client']->cli_coefficient,
                );
                $this->commande_model->insert_posseder($posseder);
            endforeach;

            $this->basket->clean();
            $this->session->set_userdata('men_id', 0);
            redirect(site_url("Welcome"));
        } else {

            redirect(site_url("Welcome/Loose"));
        }
    }

    public function enregistrer()
    {
        // Protection de la page : accessible pour le groupe employé uniquement
        $this->auth->authorized(["client"], "Welcome/Loose");

        $data['client'] = $this->client_model->get_client();

        // permet l'affichage de toutes les tâches effectuées
        $this->output->enable_profiler(TRUE);


        // création d'un tableau avec tous les champs à insérer dans la table client 
        $commande = array(
            'com_date' => date('Y-m-d H:i:s'),
            'com_total_HT' => $this->basket->get_price_sum("men_prix_HT") * $data['client']->cli_coefficient,
            'com_total_TTC' => $this->basket->get_price_sum("men_prix_TTC") * $data['client']->cli_coefficient,
            'com_montant_TVA5' => $this->basket->get_price_sum("men_montant_TVA5"),
            'com_montant_TVA20' => $this->basket->get_price_sum("men_montant_TVA20"),
            'com_etat' => "panier",
            'com_livraison_avancement' => "en attente",
            'com_facture_numero' => null,
            'com_paiement_date' => date('Y-m-d H:i:s'),
            'com_facture_date' =>  date('Y-m-d H:i:s'),
            'com_cli_id' => $data['client']->cli_id,
        );

        $id = $this->commande_model->create_commande($commande);
        $panier_contenu = $this->basket->get_basket();
        foreach ($panier_contenu as $ligne) :
            $posseder = array(
                'pos_men_id' => (int)$ligne["element"]["men_id"],
                'pos_com_id' => $id,
                'pos_quantite_commandee' => $ligne["qty"],
                'pos_prix_unitaire_HT' => $ligne["element"]["men_prix_HT"] * $data['client']->cli_coefficient,
                'pos_taux_TVA' => (double)$ligne["element"]["men_taux_TVA"],
                'pos_montant_TVA5' => $ligne["element"]["men_montant_TVA5"] * $data['client']->cli_coefficient,
                'pos_montant_TVA20' => $ligne["element"]["men_montant_TVA20"] * $data['client']->cli_coefficient,
            );
            $this->commande_model->insert_posseder($posseder);
        endforeach;

        $this->basket->clean();
        $this->session->set_userdata('men_id', 0);
        redirect(site_url("Welcome"));
    }

    public function PanierToDevis($com_id) {
        $this->commande_model->set_commande("com_etat", "devis",$com_id );

        redirect(site_url("RecapDevis/detail/").$com_id);
    }
}
