<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();
		$this->load->model('menuiserie_model');
		$this->load->model('config_model');			
    }
	
	public function index()
	{
		if ($this->session->men_id > 0) {
            $this->menuiserie_model->delete_menuiserie();
		}
		$this->basket->clean();
		$this->session->set_userdata('men_id', 0);
		$data['config'] = $this->config_model->getConfig();

        $this->load->view("header.php", $data);
        $this->load->view("accueil.php", $data);
        $this->load->view("footer.php");
	}

	public function initialisation(){		
		
		$id = $this->menuiserie_model->create_menuiserie();
		$this->session->set_userdata('men_id', $id);		
        redirect(site_url("DevisPose"));
	}

	public function loose(){
		$data['config'] = $this->config_model->getConfig();

		$this->load->view("header.php", $data);
        $this->load->view("loose.php", $data);
        $this->load->view("footer.php");
	}
}
