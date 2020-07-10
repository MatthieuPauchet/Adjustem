<?php
class DevisPose extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
        $this->load->model('menuiserie_model');
    }

    public function index()
    {
        $data['details'] = $this->detail_model->get_details_rubrique(4);

        $this->load->view("header.php");
        $this->load->view("devisPose.php", $data);
        $this->load->view("footer.php");
    }

    public function validation()
    {
        if ($this->input->post()) {

            $tab = $this->input->post();
            $det_id = $tab['det_id'];
            $this->session->set_userdata('pose1', $det_id);

            $men_id = $this->session->men_id;
            $this->menuiserie_model->set_menuiserie_detail($men_id, $det_id);

            if ($det_id==1) {
                $tva = 20;
            } else {
                $tva = 5.5;
            }

            $this->menuiserie_model->set_men_info('men_taux_TVA', $tva, $men_id );

            redirect(site_url('DevisType'));
        } else {
            redirect(site_url("Welcome/loose"));

        }
    }

    public function annulation()
    {
        $pose = $this->session->pose1;
        $men_id = $this->session->men_id;
        $this->menuiserie_model->delete_menuiserie_detail($men_id, $pose);

        redirect(site_url("DevisPose"));
    }
}
