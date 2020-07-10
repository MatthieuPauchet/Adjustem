<?php

class client_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // récupère les éléments d'un client'
    public function get_client()
    {
        $requete = $this->db->query("select * from client where cli_mail=?", array($this->auth->get_login()));
        return $requete->row();
    }

    // méthode pour récupérer l'id du client
    public function get_client_id()
    {
        $requete = $this->db->query("select cli_id from client where cli_mail=?", array($this->auth->get_login()));
        $client = $requete->row();
        return $client->cli_id;
    }

    // méthode pour insérer une ligne à la table client 
    public function set_client($tab)
    {
        $this->db->insert("client", $tab);
    }

    // méthode pour controler l'acces au détail d'un devis qui permet de controler que la personne connectée est la même qui a réalisé le devis
    public function check_com_to_cli($com_id)
    {
        $query = $this->db->get_where("commande", array('com_id' => $com_id));
        $commande = $query->row();
        $com_cli_id = $commande->com_cli_id;
        $cli_id = $this->get_client_id();
        if ($com_cli_id == $cli_id) {
            return true;
        } else {
            return false;
        }
    }
}
