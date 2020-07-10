<?php
class Panier extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detail_model');
        $this->load->model('menuiserie_model');
    }

    public function index()
    {

        $data["panier"] = $this->basket->get_basket();

        $this->load->view("header.php");
        $this->load->view("devisPanier.php", $data);
        $this->load->view("footer.php");
    }

    // méthode pour ajouter un élément dans le panier
    public function Ajout()
    {
        if ($this->input->post()) {
            $men_id = $this->session->men_id;

            // on génère un prix aléatoire qu'on ajoute à notre table menuiserie
            $prixHT = rand(153, 765);
            $this->menuiserie_model->set_men_info('men_prix_HT', $prixHT, $men_id);

            $men = $this->menuiserie_model->get_menuiserie_info($men_id);

            $TVA = $men->men_taux_TVA;
            $prixTTC = $prixHT * (1 + ($TVA / 100));

            if ($TVA == 20) {
                $montant_TVA20 = $prixTTC - $prixHT;
                $montant_TVA5 = 0;
            } elseif ($TVA == 5.5) {
                $montant_TVA5 = $prixTTC - $prixHT;
                $montant_TVA20 = 0;
            }

            $this->menuiserie_model->set_men_info('men_prix_TTC', $prixTTC, $men_id);
            $this->menuiserie_model->set_men_info('men_montant_TVA20', $montant_TVA20, $men_id);
            $this->menuiserie_model->set_men_info('men_montant_TVA5', $montant_TVA5, $men_id);

            $menuiserie_info = $this->menuiserie_model->get_menuiserie_info($men_id);
            $menuiserie_detail = $this->menuiserie_model->get_menuiserie_detail($men_id);

            $tab = [
                "men_id" => $menuiserie_info->men_id,
                "hauteur" => $menuiserie_info->men_hauteur,
                "largeur" => $menuiserie_info->men_largeur,
                "nombre_vantaux" => $menuiserie_info->men_nombre_vantaux,
                "men_prix_HT" => $menuiserie_info->men_prix_HT,
                "men_taux_TVA" => $menuiserie_info->men_taux_TVA,
                "men_montant_TVA20" => $menuiserie_info->men_montant_TVA20,
                "men_montant_TVA5" => $menuiserie_info->men_montant_TVA5,
                "men_prix_TTC" => $menuiserie_info->men_prix_TTC,
            ];

            foreach ($menuiserie_detail as $detail) {
                $key = $detail->rub_nom;
                $value = $detail->det_nom;
                $tab[$key] = $value;
            }

            $data = $this->input->post();
            $quantity = $data['quantity'];

            $this->basket->add($tab, $quantity);


            redirect(site_url("Panier"));
        }
    }

    public function SupprimerLigne($id)
    {
        $menuiserie_detail = $this->menuiserie_model->get_menuiserie_detail($id);
        $menuiserie_info = $this->menuiserie_model->get_menuiserie_info($id);

        $tab = [
            "men_id" => $menuiserie_info->men_id,
            "hauteur" => $menuiserie_info->men_hauteur,
            "largeur" => $menuiserie_info->men_largeur,
            "nombre_vantaux" => $menuiserie_info->men_nombre_vantaux,
            "men_prix_HT" => $menuiserie_info->men_prix_HT,
            "men_taux_TVA" => $menuiserie_info->men_taux_TVA,
            "men_montant_TVA20" => $menuiserie_info->men_montant_TVA20,
            "men_montant_TVA5" => $menuiserie_info->men_montant_TVA5,
            "men_prix_TTC" => $menuiserie_info->men_prix_TTC,
        ];

        foreach ($menuiserie_detail as $detail) {
            $key = $detail->rub_nom;
            $value = $detail->det_nom;
            $tab[$key] = $value;
        }

        $this->basket->remove($tab);

        redirect(site_url("Panier"));
    }

    public function AjoutUn($id)
    {
        foreach ($this->basket->get_basket() as $value) {
            if ($value["element"]["men_id"] == $id) {
                $this->basket->add($value["element"], 1);
            }
        }

        redirect(site_url("Panier"));
    }

    public function RetraitUn($id)
    {
        foreach ($this->basket->get_basket() as $value) {
            if ($value["element"]["men_id"] == $id) {
                $this->basket->edit_quantity($value["element"], $value["qty"] - 1);
            }
        }

        redirect(site_url("Panier"));
    }



    public function Clean()
    {
        $this->basket->clean();

        redirect(site_url("Panier"));
    }
}
