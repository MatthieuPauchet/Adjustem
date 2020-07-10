<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Menuiserie_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    // permet de récupérer la liste des détails associés à leur rubrique pour une menuiserie
    public function get_menuiserie_detail($men_id)
    {
        $requete = $this->db->query("SELECT det_nom, rub_nom FROM compose_det_men JOIN detail ON com_det_men_det_id = det_id JOIN rubrique ON det_rub_id=rub_id WHERE com_det_men_men_id = ? ORDER BY rub_id asc", array($men_id));
        return $requete->result();
    }

    // permet de récupérer les caractéristique d'une menuiserie
    public function get_menuiserie_info($men_id){
        $requete = $this->db->query("SELECT * FROM menuiserie WHERE men_id = ?", array($men_id));
        return $requete->row();
    }


    //  permet d'initialiser une nouvelle menuiserie et de récupérer men_id pour les autres fonctions
    public function create_menuiserie()
    {
        // afin d'insérer une ligne dans la table disque et de récupérer l'id de l'insert on ouvre une transaction
        $this->db->trans_start();
        $data = array(
            'men_nombre_vantaux' => 1
        );
        $this->db->insert("menuiserie", $data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }

    // permet de supprimer les caractéristiques et détails associés à une menuiserie
    public function delete_menuiserie()
    {
        //on récupère l'id qui vient d'être controlé;
        $id = $this->session->men_id;
        
        //on supprime la ligne non validé dans menuiserie pendant le retour à l'accueil
        $this->db->where('com_det_men_men_id', $id);
        $this->db->delete("compose_det_men");

        //on supprime la ligne non validé dans menuiserie pendant le retour à l'accueil
        $this->db->where('men_id', $id);
        $this->db->delete("menuiserie");

    }

    // permet de lier un détail choisi à la menuiserie en cours
    public function set_menuiserie_detail($men_id, $det_id)
    {
        $data = array(
            'com_det_men_men_id' => $men_id,
            'com_det_men_det_id' => $det_id
        );
        $this->db->insert("compose_det_men", $data);
    }

    // permet de supprimer un détail précis associés à une menuiserie
    public function delete_menuiserie_detail($men_id, $det_id)
    {
        $data = array(
            'com_det_men_men_id' => $men_id,
            'com_det_men_det_id' => $det_id
        );
        $this->db->delete("compose_det_men", $data);
    }

    // permet d'update la table menuiserie avec une caractérique choisie
    public function set_men_info($attribut, $val_attribut,$men_id ){
        $this->db->set($attribut, $val_attribut);
        $this->db->where('men_id', $men_id);
        $this->db->update("menuiserie");
    }




}
