<?php
class DevisMatiere extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
        $this->load->model('menuiserie_model');
    }

    public function index(){

        // on récupère les données nécessaire pour notre vue
            $data['details_matiere'] = $this->detail_model->get_details_rubrique(6);
            $data['details_coul_int'] = $this->detail_model->get_details_rubrique(7);
            $data['details_coul_ext'] = $this->detail_model->get_details_rubrique(8);

            $this->load->view("header.php");
            $this->load->view("devisMatiere.php",$data);
            $this->load->view("footer.php");
    }

    public function validation()
    {
        // on fait un if pour controler que l'acces ne puisse se faire que depuis le formulaire de validation
        if ($this->input->post()) {
            $tab = $this->input->post();
            $men_id = $this->session->men_id;
            $this->session->set_userdata('matiere', $tab["det_id"]);
            $this->session->set_userdata('couleur_int', $tab["couleur_ext"]);
            $this->session->set_userdata('couleur_ext', $tab["couleur_int"]);


            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["det_id"]);
            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["couleur_ext"]);
            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["couleur_int"]);

            redirect(site_url('DevisOuverture'));
        }
    }

    // méthode pour supprimer les détail qui ont été sélectionné sur un retour arrière
    public function annulation()
    {
        $matiere = $this->session->matiere;
        $couleur_int = $this->session->couleur_int;
        $couleur_ext = $this->session->couleur_ext;
        $men_id = $this->session->men_id;
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $matiere);
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $couleur_int);
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $couleur_ext);

        redirect(site_url("DevisMatiere"));
    }
}