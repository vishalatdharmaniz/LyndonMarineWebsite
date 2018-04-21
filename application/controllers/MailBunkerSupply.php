<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailBunkerSupply extends CI_Controller
 {

  public function index($checkbox_ids,$email_of_recepient)
    {
        $return_url_after_search_and_mail = $this->agent->referrer();
        $checkbox_ids_array = explode("@", $checkbox_ids);  
        $checkbox_ids = array(); 
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
        $this->load->model('BunkerSupply_model');
      
        $txt = "Good Day <br><br> Please find here list of bunker supply requested:<br><br><br>";
        $bunker_id= $checkbox_ids[0];
        $bunker_supply_data = $this->BunkerSupply_model->get_bunker_supply_data($bunker_id);
        $vessel_id = $bunker_supply_data[0]["vessel_id"];
        $vessel_data = $this->BunkerSupply_model->get_vessel_details_by_vessel_id($vessel_id); 


        foreach ($checkbox_ids as $bunker_id)
        {

            $bunker_supply_data = $this->BunkerSupply_model->get_bunker_supply_data($bunker_id);   

            $data['bunker_supply_data'] = $bunker_supply_data[0];
            $bunker_supply_name=$bunker_supply_data[0]['suppliers']; 
            $supply_port=$bunker_supply_data[0]['port_of_supply'];
            $supply_date=$bunker_supply_data[0]['date_of_supply'];
            $invoice_amount=$bunker_supply_data[0]['invoice_amount']; 
            $currency=$bunker_supply_data[0]['currency']; 

            $bunker_id = $bunker_supply_data[0]["bunker_id"];
            $document1 = $bunker_supply_data[0]["document1"]; 
            $document2 = $bunker_supply_data[0]["document2"]; 
        
            for($i = 1; $i <= 2 ; $i++)
            {
                $document[$i] = $bunker_supply_data[0]['document'.$i];

                $exploded_doc = explode("/", $document[$i]);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name[$i] = empty($name) ? "" : $name; 
                $document[$i] = str_replace(" ","%20","$document[$i]");  
            }
         
            $txt .= "Supplier :- ".$bunker_supply_name."<br>"; 
            $txt .= "Port Of Supply :- ".$supply_port."<br>"; 
            $txt .= "Supply Date :- ".$supply_date."<br>"; 
            $txt .= "Invoice Amount :- ".$invoice_amount."<br>"; 
            $txt .= "Currency :- ".$currency."<br>";  
        if ($bunker_supply_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document[1]>$document_name[1]</a><br>";

        }
        if ($bunker_supply_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document[2]>$document_name[2]</a><br>";
        }
        
            $txt .= "<hr>";
            $txt .= "<hr>";
        }

        $txt .= "Best Regards<br>"; 
       

        $to = "$email_of_recepient";
        $subject = "Bunker Supply Documents";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers); 
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

}
?>