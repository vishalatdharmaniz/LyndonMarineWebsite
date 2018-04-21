<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailSoaDetails extends CI_Controller {

    public function index($soa_id,$email_of_recepient)
    {
        //var_dump($soa_id);die();

        $this->load->model('Soa_model');
        
        $soa_data = $this->Soa_model->get_soa_details_by_soa_id($soa_id);

        $data['soa_data'] = $soa_data[0]; 

        $soa_num = $soa_data[0]["soa_num"];
        $currency = $soa_data[0]["currency"];
        $document1 = $soa_data[0]["document1"];
        $document2 = $soa_data[0]["document2"];
      
        for($i = 1; $i <= 2 ; $i++)
        {
            $document = $soa_data[0]['document'.$i];
            $exploded_doc = explode("SoaDocuments/", $document);
            $name = isset($exploded_doc[1]) ? $exploded_doc[1] : NULL;
            $document = empty($name) ? "no-doc" : $name;
        }

        $to = "$email_of_recepient";
        $subject = "Soa Details for : ";
        $txt = "$soa_num";
        $txt .= "$currency";
       
        $txt .= "<h1>Documents:</h1>";
        if ($soa_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document1>$document[1]</a>";
        }
        if ($soa_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document2>$document[2]</a>";
        }

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $base_url/index.php/VesselSoa/index");
    }

    public function multiple($checkbox_ids, $email_of_recepient)
    {
        $return_url_after_search_and_mail = $this->agent->referrer();
        $checkbox_ids_array = explode("@", $checkbox_ids);  
        $checkbox_ids = array(); 
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
        
      
        $this->load->model('Soa_model');
        $this->load->model('Vessel_model');

        $txt = "Good Day <br><br> Please find here list of requested SOA documents :<br><br><br>";
        $soa_id= $checkbox_ids[0];
        $soa_data = $this->Soa_model->get_soa_details_by_soa_id($soa_id);
        $vessel_id = $soa_data[0]["vessel_id"];
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 

          /*  $txt .= "M/V &nbsp;".$vessel_data[0]['vessel_name']."<br>";
            $txt .= "IMO Number &nbsp;".$vessel_data[0]['imo_number']."<br><br>";*/
        foreach ($checkbox_ids as $soa_id)
        {

          $soa_data = $this->Soa_model->get_soa_details_by_soa_id($soa_id);
     
          $vessel_id = $soa_data[0]["vessel_id"];
          $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
          $vessel_name= $vessel_data[0]['vessel_name'];
       
          $data['soa_data'] = $soa_data[0];

            $soa_num = $soa_data[0]["soa_num"];
            $currency = $soa_data[0]["currency"];
            $document = $soa_data[0]["document1"];
            
      
         
                $document = $soa_data[0]['document'];

                $exploded_doc = explode("/", $document);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name = empty($name) ? "" : $name;  
                $document = str_replace(" ","%20","$document");
             
      
            $txt .= "Soa Number :- ".$soa_num."<br>";
            $txt .= "Currency :- ".$currency."<br>";
      
        if ($soa_data[0]["document"] != NULL)
        {
            $txt .= "<a href=$document>$document_name</a><br>";

        }
       
       
            $txt .= "<hr>";
            $txt .= "<hr>";
        }

        $txt .= "Best Regards<br>";


        $to = "$email_of_recepient";
        $subject = "Soa Details for : ".$vessel_name;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }
/*
public function all($vessel_id,$email_of_recepient)
{
        $this->load->model('Soa_model');
        $this->load->model('Vessel_model');
         $txt = "Good Day <br><br> Please find here list of Soa details requested:<br><br><br>";
         $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 

            $txt .= "M/V &nbsp;".$vessel_data[0]['vessel_name']."<br>";
            $txt .= "IMO Number &nbsp;".$vessel_data[0]['imo_number']."<br><br>";
             $vessel_name= $vessel_data[0]['vessel_name'];
             $imo_number= $vessel_data[0]['imo_number'];

       $soa_data = $this->Soa_model->get_soa_details_by_vessel_id($vessel_id);


        foreach($soa_data as $key => $value)
        {
            $soa_id = $value["soa_id"];
            $soa_num =$value["soa_num"];
            $currency = $value["currency"];
           
            $document1 = $value["document1"];
             $document2 = $value["document2"];
           
       
    
                for($i = 1; $i <= 2 ; $i++)
                {
                    $document = $value['document'.$i];

                    $exploded_doc = explode("/", $document);
                    $name = isset($exploded_doc[8]) ? $exploded_doc[8] : NULL;
                    $document_name = empty($name) ? "" : $name;  
                    $document = str_replace(" ","%20","$document");
                }
        
           
             $txt .= "Soa Number :- ".$soa_num."<br>";
            $txt .= "Currency:- ".$currency."<br>";
        
            if ($value["document1"] != NULL)
            {
                $txt .= "<a href=$document[1]>$document_name[1]</a><br>";

            }
            if ($value["document2"] != NULL)
            {
                $txt .= "<a href=$document[2]>$document_name[2]</a><br>";
            }
            if ($value["document3"] != NULL)
            {
                $txt .= "<a href=$document[3]>$document_name[3]</a><br>";
            }
            if ($value["document4"] != NULL)
            {
                $txt .= "<a href=$document[4]>$document_name[4]</a><br>";
            }
            if ($value["document5"] != NULL)
            {
                $txt .= "<a href=$document[5]>$document_name[5]</a><br>";
            }
                $txt .= "<hr>";
                $txt .= "<hr>";
        }
       
        $txt .= "Best Regards<br>";

        $to = "$email_of_recepient";
        $subject = "$vessel_name, $imo_number, Documents";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
         
        $mail=mail($to,$subject,$txt,$headers);
     
        redirect("VesselCertificate/index/$vessel_id");
} */  
   

}
?>
