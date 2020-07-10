<?php
class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->model('config_model');		
    }

    public function index()
    {
		$data['config'] = $this->config_model->getConfig();

        $this->load->view("header.php", $data);
        $this->load->view("admin.php", $data);
        $this->load->view("footer.php");
    }

    public function login(){
        $data['config'] = $this->config_model->getConfig();

        if ($this->input->post()) {
            $m = $this->input->post("mail");
            $p = $this->input->post("password");

            if ($this->auth->login($m, $p, "employe")){

                $this->load->view("header.php", $data);
                $this->load->view("configAdmin.php", $data);
                $this->load->view("footer.php");
            }
            else {
                $this->load->view("header.php", $data);
                $this->load->view("formulaireError.php");
                $this->load->view("admin.php", $data);
                $this->load->view("footer.php");
            }
        } else {
            $this->load->view("header.php", $data);
            $this->load->view("loose.php");
            $this->load->view("footer.php");
        }
    }

    public function config(){
        if ($this->input->post()) {

            // permet l'affichage de toutes les tâches effectuées
            $this->output->enable_profiler(TRUE);

            $police = $this->input->post("police");
            $bouton_continuer = $this->input->post("bouton_continuer");
            $bouton_retour = $this->input->post("bouton_retour");
            $bouton_valider = $this->input->post("bouton_valider");
            $bouton_annuler = $this->input->post("bouton_annuler");

            // On créé un tableau de configuration pour l'upload
            $config['upload_path'] = './assets/images/'; // chemin où sera stocké le fichier
            $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Types autorisés (ici pour des images)
            
            // On initialise la config 
            $this->upload->initialize($config);

            if ($this->upload->do_upload("logo")) {

                // stocke sous forme de tableau toutes les données du fichier téléchargé
                $res = $this->upload->data();

                $random = rand(10000, 99999);

                $logo = "logo".$random.$res["file_ext"];
                // commande pour renommer le chemin et le fichier avec extension : rename ('chemin existant','chemin futur')
                rename($res["full_path"], $res["file_path"] .$logo);

                $this->config_model->setCon_logo($logo);      
                
                $this->session->set_userdata('testLOGO', 'IN');
                
            } else {
                $this->session->set_userdata('testLOGO', 'OUT');

            }
                        
            $this->config_model->setConfig($police, $bouton_continuer, $bouton_retour, $bouton_valider, $bouton_annuler);

            redirect(site_url("Admin/login"));            
        }
    }
}