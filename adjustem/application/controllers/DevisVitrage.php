
<?php
class DevisVitrage extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
        $this->load->model('menuiserie_model');
        $this->load->model('vitrage_model');
        $this->load->model('config_model');
    }

    public function index()
    {
        // on récupère les données nécessaires dans notre vue
        $data['finition_vitrage'] = $this->detail_model->get_details_rubrique(20);
        $data['type_vitrage'] = $this->vitrage_model->get_vitrages();
		$data['config'] = $this->config_model->getConfig();

        $this->load->view("header.php", $data);
        $this->load->view("devisVitrage.php", $data);
        $this->load->view("footer.php");
    }

    public function validation()
    {
        // on impose un if pour controler l'accès à la méthode
        if ($this->input->post()) {

            $tab = $this->input->post();
            $men_id = $this->session->men_id;
            $this->session->set_userdata('finition', $tab["finition_vitrage"]);

            // on récupère le vitrage sélectionné en fonction des choix effectué afin d'insérer la clé étrangère à la table menuiserie
            $vitrage= $this->vitrage_model->get_vitrage($tab["vit_perf_acoustique"], $tab["vit_perf_securite"]);
            $men_vit_id = $vitrage->vit_id;


            $this->menuiserie_model->set_men_info("men_vit_id", $men_vit_id, $men_id);

            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["finition_vitrage"]);
        
            redirect(site_url('DevisVolet'));
        }
    }

    // méthode pour gérer la suppression des choix effectués précédement sur un retour arrière
    public function annulation()
    {
        $finition = $this->session->finition;
        $men_id = $this->session->men_id;
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $finition);

        redirect(site_url("DevisVitrage"));
    }


}