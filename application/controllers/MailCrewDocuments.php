<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailCrewDocuments extends CI_Controller
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
        $this->load->model('CrewDetails_model');
      
        $txt = "Good Day <br><br> Please find here list of requested crew details :<br><br><br>";
        $crew_id= $checkbox_ids[0];  
        $crew_data = $this->CrewDetails_model->get_crew_details_by_crew_id($crew_id); 
        $vessel_id = $crew_data[0]["vessel_id"];             
        $vessel_data = $this->CrewDetails_model->get_vessel_details_by_vessel_id($vessel_id); 
              $vessel_name=$vessel_data[0]['vessel_name']; 
        foreach ($checkbox_ids as $id)
        {

            $crew_data = $this->CrewDetails_model->get_crew_details_by_crew_id($id);   

            $data['crew_data'] = $crew_data; 
            $crew_name=$crew_data[0]['name']; 
            $tourist_passport_num=$crew_data[0]['tourist_p_num'];
         
            /*$document = $crew_data[0]["document"]; */
       
           for($i = 1; $i <=20 ; $i++)
             {
                $document[$i] = $crew_data[0]['document'.$i];

                $exploded_doc = explode("/", $document[$i]);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name[$i] = empty($name) ? "" : $name;  
                $document[$i] = str_replace(" ","%20","$document[$i]");
              }
            
            $txt .= "Crew Name :- ".$crew_name."<br>"; 
            $txt .= "Tourist Passport Number :- ".$tourist_passport_num."<br>"; 
            $txt .= "Documents :- <br>";

               if ($crew_data[0]["document1"] != NULL)
                {
                    $txt .= "<a href=$document[1]>$document_name[1]</a><br>";
                }
                if ($crew_data[0]["document2"] != NULL)
                {
                    $txt .= "<a href=$document[2]>$document_name[2]</a><br>";
                }
                if ($crew_data[0]["document3"] != NULL)
                {
                    $txt .= "<a href=$document[3]>$document_name[3]</a><br>";
                }
                if ($crew_data[0]["document4"] != NULL)
                {
                    $txt .= "<a href=$document[4]>$document_name[4]</a><br>";
                }
                if ($crew_data[0]["document5"] != NULL)
                {
                    $txt .= "<a href=$document[5]>$document_name[5]</a><br>";
                }
                 if ($crew_data[0]["document6"] != NULL)
                {
                    $txt .= "<a href=$document[6]>$document_name[6]</a><br>";
                }
                if ($crew_data[0]["document7"] != NULL)
                {
                    $txt .= "<a href=$document[7]>$document_name[7]</a><br>";
                }
                if ($crew_data[0]["document8"] != NULL)
                {
                    $txt .= "<a href=$document[8]>$document_name[8]</a><br>";
                }
                if ($crew_data[0]["document9"] != NULL)
                {
                    $txt .= "<a href=$document[9]>$document_name[9]</a><br>";
                }
                if ($crew_data[0]["document10"] != NULL)
                {
                    $txt .= "<a href=$document[10]>$document_name[10]</a><br>";
                }
                 if ($crew_data[0]["document11"] != NULL)
                {
                    $txt .= "<a href=$document[11]>$document_name[11]</a><br>";
                }
                if ($crew_data[0]["document12"] != NULL)
                {
                    $txt .= "<a href=$document[12]>$document_name[12]</a><br>";
                }
                if ($crew_data[0]["document13"] != NULL)
                {
                    $txt .= "<a href=$document[13]>$document_name[13]</a><br>";
                }
                if ($crew_data[0]["document14"] != NULL)
                {
                    $txt .= "<a href=$document[14]>$document_name[14]</a><br>";
                }
                if ($crew_data[0]["document15"] != NULL)
                {
                    $txt .= "<a href=$document[15]>$document_name[15]</a><br>";
                }
                 if ($crew_data[0]["document16"] != NULL)
                {
                    $txt .= "<a href=$document[16]>$document_name[16]</a><br>";
                }
                if ($crew_data[0]["document17"] != NULL)
                {
                    $txt .= "<a href=$document[17]>$document_name[17]</a><br>";
                }
                if ($crew_data[0]["document18"] != NULL)
                {
                    $txt .= "<a href=$document[18]>$document_name[18]</a><br>";
                }
                if ($crew_data[0]["document19"] != NULL)
                {
                    $txt .= "<a href=$document[19]>$document_name[19]</a><br>";
                }
                if ($crew_data[0]["document20"] != NULL)
                {
                    $txt .= "<a href=$document[20]>$document_name[20]</a><br>";
                }

                $txt .= "<hr>";
                $txt .= "<hr>";
            }

           
             $txt .= "Best Regards<br>";

       
        $to = "$email_of_recepient";
        $subject = "Crew Details for ".$vessel_name;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
       mail($to,$subject,$txt,$headers); 
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

}
?>