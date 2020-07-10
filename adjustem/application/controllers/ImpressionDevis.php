<?php
class ImpressionDevis extends CI_controller
{

// ce controller permet de gérer la création du devis PDF via DomPDF

    public function __construct()
    {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('menuiserie_model');
        $this->load->model('config_model');
        $this->load->library('pdf');
    }

    public function index()
    {
        $panier = $this->basket->get_basket();
        $client = $this->client_model->get_client();
		$config = $this->config_model->getConfig();

        // on commence toujours par la balise style pour gérer son CSS (pas de lien vers fichier externe possible)
        $html = '
        <style>
            .width10 {
                width: 10%;
            }

            .width45 {
                width: 45%;
                vertical-align: top;
            }

            .width50 {
                width: 50%;
                vertical-align: top;
            }

            .width55 {
                width: 55%;
            }
        
            .width100 {
                width: 100%;
            }

            .sans-bordure{
                border: 0px;
                padding: 0px;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }
        
            td, th {
                border: 1px solid #343A40;
                text-align: left;
                padding: 5px;
            }
        
            thead {
                background-color: #343A40;
                color:white;  
                font-weight:bolder ;          
            }

            .bold{
                font-weight:bold;
                font-size: 18px;
            }

            .bolder{
                font-weight:bold;
                font-size: 21px;
            }


            .text-right {
                text-align: right;
            }
            
            .text-center {
                text-align: center;
            }
            
            .capitalize {
                text-transform: capitalize;
            }
        </style>';  

        // on gère ensuite le contenu de notre vue en utilisant bien le ".=" qui permet d'ajouter le code à la suite
        $html .= '
        <table>
            <tbody>
                <tr class="sans-bordure">
                    <td class="sans-bordure width50">
                        <img width="8cm;" src="assets/images/'.$config->con_logo.'" alt="probleme!!!">
                    </td>
                    <td class="sans-bordure"><h2>Devis</h2></td>
                </tr>
                <tr>
                <td class="sans-bordure"></td>
                <td class="sans-bordure">
                    <div class="bold"><span class="capitalize">'.$client->cli_nom.'</span> <span class="capitalize">'.$client->cli_prenom.'</span></div>
                    <div>'.$client->cli_rue.'</div>
                    <div>'.$client->cli_code_postal.'</div>
                    <div>'.$client->cli_ville.'</div>
                </td>
            </tr>
                <tr>
                    <td class="sans-bordure">
                        <div><strong>Livraison :</strong></div>
                        <div><strong>Date : </strong>'.date("d/m/Y").'</div>
                        <div><strong>Délai : </strong>5 semaines</div>
                    </td>
                    <td class="sans-bordure"></td>
                </tr>
            </tbody>
        </table>

        <br>
        <table class="width100">
            <thead>
                <tr>
                    <th class="width55">Désignation</th>
                    <th class="width10 text-center">TVA</th>
                    <th class="text-center">P.U HT</th>
                    <th class="width10 text-center">Qté</th>
                    <th class="text-center">Total HT</th>
                </tr>
            </thead>
            <tbody>';
        // avant chaque boucle, on stoppe le html et on le reprends
        $count = 0;
        foreach ($panier as $ligne) :
            $count++;                    
            $html .= '
                <tr>
                    <td>
                        <div class="bolder capitalize">'. $ligne["element"]["type de menuiserie"] .'</div>
                        <ul>
                            <li>Hauteur : '. $ligne["element"]["hauteur"] .'mm</li>
                            <li>Largeur : '. $ligne["element"]["largeur"] .'mm</li>
                            <li>'. $ligne["element"]["type de pose"] .'</li>
                            ';
                            $mo = 0;
                            foreach ($ligne["element"] as $key => $value) {
                            $mo++;
                            if ($mo > 11) {
                            $html .='
                            <li> <span style="text-transform:capitalize;"> '. $key .' : </span><span style="text-transform:capitalize;"> '. $value .'</span></li>
                            ';
                            }
                            }
                            $html .='
                        </ul>
                    </td>
                    <td class="text-center">'. number_format($ligne["element"]["men_taux_TVA"], 2, ",", " ") .'%</td>
                    <td class="text-center">'. number_format($ligne["element"]["men_prix_HT"], 2, ",", " ") .' €</td>
                    <td class="text-center">'. $ligne["qty"] .'</td>
                    <td class="text-center">'. number_format($ligne["element"]["men_prix_HT"] * $ligne["qty"], 2, ",", " ") .' €</td>
                </tr>                
            ';
        endforeach;
                
                 
        $html .='
            </tbody>
        </table>
        <div>Règlement : paiement à la commande</div>
        <div class="width100">
                <div class="text-right bold">Sous-total HT : '. number_format($this->basket->get_price_sum("men_prix_HT"), 2, ",", " ") .' €</div>
                ';
        if ($this->basket->get_price_sum("men_montant_TVA5") > 0) { 
            $html .='
                <div class="text-right bold">TVA 5.5% : '. number_format($this->basket->get_price_sum("men_montant_TVA5"), 2, ",", " ") .' €</div>';
        }
        if ($this->basket->get_price_sum("men_montant_TVA20") > 0) {
            $html .='
                <div class="text-right bold">TVA 20% : '. number_format($this->basket->get_price_sum("men_montant_TVA20"), 2, ",", " ") .' €</div>';
        }
        $html .='
            <div class="text-right bolder">Total TTC : '. number_format($this->basket->get_price_sum("men_prix_TTC"), 2, ",", " ") .' €</div>
        </div>
        <br>
        <strong>Bon pour commande</strong>
        <div>le :</div>    
        <div>à :</div>    
        <div>Signature :</div>
        ';

        
        $this->pdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $this->pdf->setPaper('A4', 'portrait');
        // 2eme paramètre optionel, portrait par défaut sinon "landscape"

        // Render the HTML as PDF
        $this->pdf->render();

        // Output the generated PDF to Browser
        $men_id = $panier["0"]["element"]["men_id"];
        $nomPDF = "devis".$client->cli_nom.$men_id;
        $this->pdf->stream($nomPDF, array("Attachment" => 0));
        //1 = Download
        //0 =  Preview
    }

    // test mise en page avec Bootstrap
    public function bootstrap($com_id){
        $data["panier"] = $this->basket->get_basket();
        $data["client"] = $this->client_model->get_client();

        $this->load->view("devisPDF.php", $data);
    }

}
