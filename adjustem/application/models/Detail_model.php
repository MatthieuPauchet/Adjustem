<?php

class detail_model extends CI_Model {

    public function __construct()
	{
		$this->load->database();
    }
    
    // récupère tous les éléments de la table détail appartenant à une rubrique
    public function get_details_rubrique($rub_id) {
        $requete = $this->db->query("select * from detail where det_rub_id = ?",array($rub_id));
        return $requete->result();
    }

    // récupère un détail précis
    public function get_details($det_id) {
        $requete = $this->db->query("select * from detail where det_id = ?",array($det_id));
        return $requete->result();
    } 
}