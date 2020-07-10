<?php

class commande_model extends CI_Model {

    public function __construct()
	{
		$this->load->database();
    }
    
    // récupère les éléments d'un client'
    public function get_num_commande_max() {
        $requete = $this->db->query("SELECT MAX(com_facture_numero) FROM commande;");
        return $requete->row();
    }

    //  permet d'initialiser une nouvelle menuiserie et de récupérer men_id pour les autres fonctions
    public function create_commande($commande) {
        $this->db->trans_start();
        $this->db->insert("commande", $commande);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }

    // gère l'insert dans la table posseder
    public function insert_posseder($posseder){
        $this->db->insert("posseder", $posseder);
    }

    // récupère une commande en fonction de son id
    public function get_commande($com_id){
        $this->db->select("*");
        $this->db->from("commande");
        $this->db->where('com_id', $com_id);
        $query = $this->db->get();
        return $query->row();
    }

    // récupère la liste des commandes d'un client
    public function get_commandes($cli_id){
        $this->db->order_by('com_date ','desc') ;
        $commandes = $this->db->get_where("commande",array('com_cli_id'=> $cli_id));
        return $commandes->result();
    }

    // récupère les lignes d'une commande pour avoir son détail
    public function get_ligne_commande($com_id)
    {
        $this->db->select('*');
        $this->db->from('posseder');
        $this->db->join('menuiserie', 'pos_men_id = men_id');
        $this->db->where('pos_com_id', $com_id);

        $query = $this->db->get();

        return $query->result();
    }

    // permet d'update la table commande avec une caractérique choisie
    public function set_commande($attribut, $val_attribut,$com_id ){
        $this->db->set($attribut, $val_attribut);
        $this->db->where('com_id', $com_id);
        $this->db->update("commande");
    }

}