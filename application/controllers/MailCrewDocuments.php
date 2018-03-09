<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailCrewDocuments extends CI_Controller
{

public function index($checkbox_ids,$email_of_recepient)
    {
        $return_url_after_search_and_mail = $this->agent->referrer();
        $checkbox_ids_array = explode("&", $checkbox_ids);  
        $checkbox_ids = array(); 
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
        $this->load->model('CrewDetails_model');
      
        $txt = "Good Day <br><br> Please find here list of bunker supply requested:<br><br><br>";
        $crew_id= $checkbox_ids[0];
        $crew_data = $this->CrewDetails_model->get_crew_details_by_crew_id($crew_id);
           $vessel_id = $crew_data[0]["vessel_id"];
            $vessel_data = $this->CrewDetails_model->get_vessel_details_by_vessel_id($vessel_id); 


        foreach ($checkbox_ids as $crew_id)
        {

            $crew_data = $this->CrewDetails_model->get_crew_details_by_crew_id($crew_id);   

            $data['crew_data'] = $crew_data[0];
            $crew_name=$crew_data[0]['name'];

        $crew_id = $crew_data[0]["crew_id"];
        $document = $crew_data[0]["document"]; 
       

                $exploded_doc = explode("/", $document);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name = empty($name) ? "" : $name; 
                $document = str_replace(" ","%20","$document");  
            
         
            $txt .= $bunker_supply_name."<br>"; 
        if ($crew_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document > $document_name</a><br>";

        }
      
        
            $txt .= "<hr>";
            $txt .= "<hr>";
        }

        $txt .= "Best Regards<br>";


        $to = "$email_of_recepient";
        $subject = "Crew Details";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
       $var= mail($to,$subject,$txt,$headers); 
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

}
?>