<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rubrique_model extends CI_Model{

    public function __construct()
	{
		$this->load->database();
    }
    
    // récupére un élément de rubrique
    public function get_rubrique($rub_id) {
        $requete = $this->db->query("select * from rubrique where rub_id = ?", array($rub_id));
        return $requete->result();
    }    
}