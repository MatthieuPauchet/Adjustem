<?php
class DevisType extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
        $this->load->model('menuiserie_model');
        $this->load->model('config_model');
    }

    public function index()
    {
        $data['details'] = $this->detail_model->get_details_rubrique(5);
		$data['config'] = $this->config_model->getConfig();

        $this->load->view("header.php", $data);
        $this->load->view("devisType.php", $data);
        $this->load->view("footer.php");
    }

    public function validation()
    {
        $tab = $this->input->post();
        $det_id = $tab['det_id'];
        $men_id = $this->session->men_id;
        $this->session->set_userdata('men_type_id', $det_id);
        $this->session->set_userdata('type1', $det_id);

        // on vérifie l'unité de mesure sélectionnée afin de convertir la valeur en mm pour la stocker dans la bdd
        if ($tab['mesure'] == 'cm') {
            $tab['men_hauteur'] *= 10;
            $tab['men_largeur'] *= 10;
        };
        
        if ($tab['men_hauteur']>325 && $tab['men_hauteur']<3001 && $tab['men_largeur']>224 && $tab['men_largeur']<5901) {

            $this->menuiserie_model->set_menuiserie_detail($men_id, $det_id);

            $this->menuiserie_model->set_men_info('men_hauteur', $tab['men_hauteur'], $men_id);
            $this->menuiserie_model->set_men_info('men_largeur', $tab['men_largeur'], $men_id);

            redirect(site_url('DevisMatiere'));
        }        
    }

    public function annulation()
    {
        $pose = $this->session->type1;
        $men_id = $this->session->men_id;
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $pose);

        redirect(site_url("DevisType"));
    }
}
