 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailAllCertificate extends CI_Controller 
{

public function index($vessel_id,$email_of_recepient)
{
        $this->load->model('Certificate_model');
        $this->load->model('Vessel_model');
  
         $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 
      
         $vessel_name= $vessel_data[0]['vessel_name'];
        $txt = "Good Day <br><br> Please find here list of requested certificates :<br><br><br>";
           
       $all_certificates_data = $this->Certificate_model->get_certificates_by_vessel_id($vessel_id);
     	
        foreach($all_certificates_data as $key => $value)
        {
            
        
            $certificate_no =$value["certificate_no"];  
            $certificate_name = $value["certificate_name"];
            $certificate_type =$value["certificate_type"];

            $txt .= "Certificate Number :- ".$certificate_no."<br>";
            $txt .= "Certificate Name :- ".$certificate_name."<br>";
            $txt .= "Certificate Type :- ".$certificate_type."<br>";
        
             for($i = 1; $i <= 5 ; $i++)
              {
                $document[$i] = $value['document'.$i];
                $exploded_doc = explode("/", $document[$i]);
                $name = isset($exploded_doc[8]) ? $exploded_doc[8] : NULL;
                $document_name[$i] = empty($name) ? "" : $name;  
                $document[$i] = str_replace(" ","%20","$document[$i]");
               }
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
        $subject = "Certificates details for : ".$vessel_name;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
         
       mail($to,$subject,$txt,$headers);
        // var_dump($mail);
        redirect("VesselCertificate/index/$vessel_id");
        //index.php/VesselSurvey/index/102
    }   



}