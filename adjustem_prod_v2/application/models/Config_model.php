<?php


class Config_model extends CI_Model {

    public function __construct()
	{
		$this->load->database();
    }
    
    public function getConfig() {
        $requete = $this->db->query("SELECT * FROM config");
        return $requete->row();
    }

    public function setConfig($con_police, $con_bouton_continuer, $con_bouton_retour, $con_bouton_valider, $con_bouton_annuler) {
        $this->db->set('con_police', $con_police);
        $this->db->set('con_bouton_continuer', $con_bouton_continuer);
        $this->db->set('con_bouton_retour', $con_bouton_retour);
        $this->db->set('con_bouton_valider', $con_bouton_valider);
        $this->db->set('con_bouton_annuler', $con_bouton_annuler);
        $this->db->where('con_id', 1);
        $this->db->update("config");
    }

    public function setCon_logo($logo){
        $this->db->set('con_logo', $logo);
        $this->db->where('con_id', 1);
        $this->db->update("config");
    }

    public function getCon_police(){        
        $config = $this->getConfig();
        return $config->con_police;
    }

    public function getCon_logo(){        
        $config = $this->getConfig();
        return $config->con_logo;
    }

    public function getCon_bouton_continuer(){        
        $config = $this->getConfig();
        return $config->con_bouton_continuer;
    }

    public function getCon_bouton_retour(){        
        $config = $this->getConfig();
        return $config->con_bouton_retour;
    }
    
}