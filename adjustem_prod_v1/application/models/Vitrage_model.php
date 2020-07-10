<?php

class vitrage_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // sélectionne un vitrage en fonction de 2 éléments where (acoustique et sécurité)
    public function get_vitrage($acoustique, $securite)
    {
        $this->db->select("*");
        $this->db->from("vitrage");
        $this->db->where('vit_perf_acoustique', $acoustique);
        $this->db->where('vit_perf_securite', $securite);
        $q = $this->db->get();
        return $q->row();
    }

    // récupère l'ensemble de la table vitrage
    public function get_vitrages() {
        $requete = $this->db->query("SELECT * FROM vitrage");
        return $requete->result();
    }
}
