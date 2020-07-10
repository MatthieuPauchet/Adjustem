<?php
class Connection extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // on récupère l'url de provenance afin d'assurer la redirection à la page d'origine
        $data['precedent']=$_SERVER["HTTP_REFERER"];
        $this->session->set_userdata('origin_form', $_SERVER["HTTP_REFERER"]);


        $this->load->view("header.php");
        $this->load->view("formulaire.php",$data);
        $this->load->view("footer.php");
    }

    // méthode pour gérer l'inscription d'un client
    public function Inscription () {
        
        // on mets en place un controle des champs saisis
        $this->form_validation->set_rules('cli_nom', 'nom',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('cli_prenom', 'prénom',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('cli_rue', 'adresse',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('cli_code_postal', 'required|code postal',  'regex_match[/^[0-9]{5}$/]');
        $this->form_validation->set_rules('cli_ville', 'ville',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('cli_pays', 'pays',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë ]{1,50}$/]');
        $this->form_validation->set_rules('cli_mail', 'email',  'required|regex_match[/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/]|is_unique[client.cli_mail]');
        $this->form_validation->set_rules('cli_telephone', 'téléphone',  'required|regex_match[/^[0-9]{10,}$/]');
        $this->form_validation->set_rules('cli_password', 'password',  'required|regex_match[/^[a-zA-Z0-9\'-àéèêâûùë!?:&]{1,50}$/]');

        //---------------------------------------------------------------------------------------------- 
        // autre méthode pouvant gerer la longueur min/max ainsi que le caractère unique (is_unique)
        // $this->form_validation->set_rules(
        // 	'artist_name', 
        // 	'Le nom de l\'artiste',
        // 	'required|min_length[5]|max_length[12]|is_unique[artist.artist_name]',
        // );
        //---------------------------------------------------------------------------------------------- 

        if ($this->input->post() && $this->form_validation->run()) {

            // permet l'affichage de toutes les tâches effectuées
            $this->output->enable_profiler(TRUE);

            // on récupère le password et on le hash
            $password = $this->input->post('cli_password');
            $password_hash = password_hash($password, PASSWORD_DEFAULT);

            // création d'un tableau avec tous les champs à insérer dans la table client 
            $tab = array(
                'cli_nom' => htmlentities($this->input->post('cli_nom')),
                'cli_prenom' => htmlentities($this->input->post('cli_prenom')),
                'cli_rue' => htmlentities($this->input->post('cli_rue')),
                'cli_code_postal' => htmlentities($this->input->post('cli_code_postal')),
                'cli_ville' => htmlentities($this->input->post('cli_ville')),
                'cli_pays' => htmlentities($this->input->post('cli_pays')),
                'cli_mail' => htmlentities($this->input->post('cli_mail')),
                'cli_telephone' => htmlentities($this->input->post('cli_telephone')),
                'cli_password' => $password_hash,
            ) ;

            // afin d'insérer une ligne dans la table disque et de récupérer l'id de l'insert on ouvre une transaction
            $this->db->trans_start();
            $this->db->insert("client", $tab);
            $id = $this->db->insert_id();
            $this->db->trans_complete();


            $e = $this->input->post("cli_mail");
            $p = $this->input->post("cli_password");

            if ($this->auth->login($e, $p, "client")) {
                redirect($this->session->origin_form);
            } 
            else if ($this->auth->login($e, $p, "employé")){
                redirect($this->session->origin_form);
            }
            else {
                redirect(site_url("Welcome/loose"));
            }

        } else {
        
        $this->load->view("header.php");
        $this->load->view("formulaire.php");
        $this->load->view("footer.php");
        }
    }

    // méthode pour gérer la déconnexion
    public function logout(){
        $this->auth->logout();
        redirect(site_url("Welcome"));
    }

    // méthode pour gérer la connexion
    public function login(){
        if ($this->input->post()) {
            $m = $this->input->post("mail");
            $p = $this->input->post("password");

            var_dump($this->auth->login($m, $p, "client"));
            if ($this->auth->login($m, $p, "client")==true) {
                redirect($this->session->origin_form);
            } 
            else if ($this->auth->login($m, $p, "employe")){
                redirect($this->session->origin_form);
            }
            else {
                $this->load->view("header.php");
                $this->load->view("formulaireError.php");
                $this->load->view("formulaire.php");
                $this->load->view("footer.php");
            }
        }
    }
}
