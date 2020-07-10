
<?php
class DevisVolet extends CI_Controller
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
        $data['couleurs_vr'] = $this->detail_model->get_details_rubrique(9);
        $data['manoeuvres_vr'] = $this->detail_model->get_details_rubrique(10);
        $data['matieres_lame'] = $this->detail_model->get_details_rubrique(11);
		$data['config'] = $this->config_model->getConfig();

        $this->load->view("header.php", $data);
        $this->load->view("devisVolet.php", $data);
        $this->load->view("footer.php");
    }

    public function validation()
    {
        if ($this->input->post()) {

            $tab = $this->input->post();

            $men_id = $this->session->men_id;
            $this->session->set_userdata('matieres_lame', $tab["det_id"]);
            $this->session->set_userdata('couleur_VR', $tab["det_id"]);
            $this->session->set_userdata('manoeuvre_VR', $tab["det_id"]);

            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["matieres_lame"]);
            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["couleur_VR"]);
            $this->menuiserie_model->set_menuiserie_detail($men_id, $tab["manoeuvre_VR"]);

            redirect(site_url('DevisRecap'));
        }
    }

    public function annulation()
    {
        $matieres_lame = $this->session->matieres_lame;
        $couleur_VR = $this->session->couleur_VR;
        $manoeuvre_VR = $this->session->manoeuvre_VR;
        $men_id = $this->session->men_id;

        $this->menuiserie_model->delete_menuiserie_detail($men_id, $matieres_lame);
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $couleur_VR);
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $manoeuvre_VR);

        redirect(site_url("DevisVolet"));
    }
}
