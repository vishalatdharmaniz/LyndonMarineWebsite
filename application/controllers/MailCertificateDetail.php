<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailCertificateDetail extends CI_Controller {

	public function index($certificate_id,$email_of_recepient)
	{
		//var_dump($certificate_id);die();
        $this->load->model('Certificate_model');
        
        $certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);

        $data['certificate_data'] = $certificate_data[0];

        $certificate_no = $certificate_data[0]["certificate_no"];
        $certificate_name = $certificate_data[0]["certificate_name"];
        $document1 = $certificate_data[0]["document1"];
        $document2 = $certificate_data[0]["document2"];
        $document3 = $certificate_data[0]["document3"];
        $document4 = $certificate_data[0]["document4"];
        $document5 = $certificate_data[0]["document5"];

        for($i = 1; $i <= 5 ; $i++)
        {
            $document = $certificate_data[0]['document'.$i];
            $exploded_doc = explode("CertificateDocuments/", $document);
            $name = isset($exploded_doc[1]) ? $exploded_doc[1] : NULL;
            $document[$i] = empty($name) ? "no-doc" : $name;
        }

        $to = "$email_of_recepient";
        $subject = "$certificate_name";
        $txt = "$certificate_no";

        $txt .= "<h1>Documents:</h1>";
        if ($certificate_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document1>$document[1]</a>";
        }
        if ($certificate_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document2>$document[2]</a>";
        }
        if ($certificate_data[0]["document3"] != NULL)
        {
            $txt .= "<a href=$document3>$document[3]</a>";
        }
        if ($certificate_data[0]["document4"] != NULL)
        {
            $txt .= "<a href=$document4>$document[4]</a>";
        }
        if ($certificate_data[0]["document5"] != NULL)
        {
            $txt .= "<a href=$document5>$document[5]</a>";
        }

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: lyndon_marine@dharmani.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $base_url/index.php/VesselCertificate/index");
    }

    public function multiple_vessels($checkbox_ids, $email_of_recepient)
    {
        $return_url_after_search_and_mail = $this->agent->referrer();
        $checkbox_ids_array = explode("@", $checkbox_ids);
        $checkbox_ids = array();
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
        $this->load->model('Certificate_model');
        $txt = "<h3 style='color:red;'>Your Requested list of Certificate from LyndonMarine</h3><br>";
        foreach ($checkbox_ids as $certificate_id)
        {
        
            $certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);

            $data['certificate_data'] = $certificate_data[0];
            
        $certificate_id = $certificate_data[0]["certificate_id"];
        $certificate_no = $certificate_data[0]["certificate_no"];
        $certificate_name = $certificate_data[0]["certificate_name"];
        $document1 = $certificate_data[0]["document1"];
        $document2 = $certificate_data[0]["document2"];
        $document3 = $certificate_data[0]["document3"];
        $document4 = $certificate_data[0]["document4"];
        $document5 = $certificate_data[0]["document5"];
            
    
            for($i = 1; $i <= 10 ; $i++)
            {
                $document[$i] = $certificate_data[0]['document'.$i];
                $exploded_doc = explode("CertificateDocuments/", $document[$i]);
                $name = isset($exploded_doc[1]) ? $exploded_doc[1] : NULL;
                $document_name[$i] = empty($name) ? "" : $name;
                $document[$i] = str_replace(" ","%20","$document[$i]");
            }
            
         
            $txt .= "<h3 style='color:red;'>Record ID: ".$certificate_id."</h3><br>";


            $txt .= "<h1>Documents:</h1><br>";

        if ($certificate_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document1>$document[1]</a>";
        }
        if ($certificate_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document2>$document[2]</a>";
        }
        if ($certificate_data[0]["document3"] != NULL)
        {
            $txt .= "<a href=$document3>$document[3]</a>";
        }
        if ($certificate_data[0]["document4"] != NULL)
        {
            $txt .= "<a href=$document4>$document[4]</a>";
        }
        if ($certificate_data[0]["document5"] != NULL)
        {
            $txt .= "<a href=$document5>$document[5]</a>";
        }
            $txt .= "<hr>";
            $txt .= "<hr>";
        }
      

        $to = "$email_of_recepient";
        $subject = "Your Requested list of Certificate from LyndonMarine";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: lyndon_marine@dharmani.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

}
