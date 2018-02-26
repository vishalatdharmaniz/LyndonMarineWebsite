<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailVesselDetails extends CI_Controller {

  public function vessel_mail($vessel_id,$email_of_recepient)
    {
        $this->load->model('Vessel_model');
        
        $single_vessel = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
         // print_r($single_vessel);die();       
        $data['single_vessel'] = $single_vessel[0];
        
        $record_id = $single_vessel[0]["id"];
        $vessel_name = $single_vessel[0]["vessel_name"];
        $vessel_full_description = $single_vessel[0]["full_description"];
        $vessel_pic = $single_vessel[0]["image1"];

        $to = "$email_of_recepient";
        $subject = "$vessel_name";
        $txt  = "<h3 style='color:red;'>Record ID: ".$record_id."</h3><br>";
        $txt .= "<img style='width:400px;height:270px;' src='$vessel_pic'></img>";
        $txt .= "$vessel_full_description";
        

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $base_url/index.php/FleetDetails/index/$vessel_id");
    }
}

