<?php
class DevisOuverture extends CI_Controller
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
        $men_type_id = $this->session->men_type_id;
        $data['config'] = $this->config_model->getConfig();

        // on controle le type de menuiserie selectionné préalablement afin de d'afficher les bon choix d'ouvertures
        if ($men_type_id == 6) {
            $data['details_fenetre_simple'] = $this->detail_model->get_details_rubrique(28);
            $data['details_fenetre_double'] = $this->detail_model->get_details_rubrique(29);

            $this->load->view("header.php",$data);
            $this->load->view("devisOuvertureNbBis.php");
            $this->load->view("devisOuvertureVantaux.php", $data);
            $this->load->view("footer.php");
        } else {
            if ($men_type_id == 4) {
                $data['details_fenetre_simple'] = $this->detail_model->get_details_rubrique(24);
                $data['details_fenetre_double'] = $this->detail_model->get_details_rubrique(25);
            } elseif ($men_type_id == 5) {
                $data['details_fenetre_simple'] = $this->detail_model->get_details_rubrique(26);
                $data['details_fenetre_double'] = $this->detail_model->get_details_rubrique(27);
            }
            $this->load->view("header.php", $data);
            $this->load->view("devisOuvertureNb.php");
            $this->load->view("devisOuvertureVantaux.php", $data);
            $this->load->view("footer.php");
        }
    }

    public function validation()
    {
        if ($this->input->post()) {
            $tab = $this->input->post();
            $men_id = $this->session->men_id;
            $this->session->set_userdata('ouverture', $tab["det_id"]);
            $this->session->set_userdata('nb_vantaux', $tab["nb_vantaux"]);

            $this->menuiserie_model->set_men_info("men_nombre_vantaux", $tab["nb_vantaux"], $men_id);
            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["det_id"]);
        }        
        redirect(site_url('DevisVitrage'));
    }

    public function annulation()
    {
        $ouverture = $this->session->ouverture;
        $men_id = $this->session->men_id;
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $ouverture);

        redirect(site_url("DevisOuverture"));
    }
}
