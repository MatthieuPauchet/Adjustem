<?php
class DevisRecap extends CI_Controller
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
        $men_id = $this->session->men_id;
        $data['details_menuiserie'] = $this->menuiserie_model->get_menuiserie_detail($men_id);
        $data['infos_menuiserie'] = $this->menuiserie_model->get_menuiserie_info($men_id);        
		$data['config'] = $this->config_model->getConfig();

        $this->load->view("header.php", $data);
        $this->load->view("devisRecap.php", $data);
        $this->load->view("footer.php");
    } 
}
