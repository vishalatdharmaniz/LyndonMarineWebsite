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
        $headers .= "From: office@lyndonmarine.com";
        
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
// var_dump($checkbox_ids);die();
        $this->load->model('Certificate_model');

        $txt .= "<h3>Good Day <br><br> Please find here list of certificates requested:</h3><br>";
        foreach ($checkbox_ids as $certificate_id)
        {

            $certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);
// print_r($certificate_data);die();
            $data['certificate_data'] = $certificate_data[0];

        $certificate_id = $certificate_data[0]["certificate_id"];
        $certificate_no = $certificate_data[0]["certificate_no"];
        $certificate_name = $certificate_data[0]["certificate_name"];
        $certificate_type = $certificate_data[0]["certificate_type"];
        $document1 = $certificate_data[0]["document1"];
        $document2 = $certificate_data[0]["document2"];
        $document3 = $certificate_data[0]["document3"];
        $document4 = $certificate_data[0]["document4"];
        $document5 = $certificate_data[0]["document5"];
            
    
            for($i = 1; $i <= 5 ; $i++)
            {
                $document[$i] = $certificate_data[0]['document'.$i];
                $exploded_doc = explode("/", $document[$i]);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name[$i] = empty($name) ? "" : $name;  
                $document[$i] = str_replace(" ","%20","$document[$i]");
            }
            
            $txt .= "<h2>Certificate Name:".$certificate_name."</h2><br>";
            $txt .= "<h2>Certificate Type:".$certificate_type."</h2><br>";
            
            
            $txt .= "<h1>Documents:</h1><br>";

        if ($certificate_data[0]["document1"] != NULL)
        {
            $txt .= "<h4>Certificate 1:</h4><a href=$document1>$document_name[1]</a>";
        }
        if ($certificate_data[0]["document2"] != NULL)
        {
            $txt .= "<h4>Certificate 2:</h4><a href=$document2>$document_name[2]</a>";
        }
        if ($certificate_data[0]["document3"] != NULL)
        {
            $txt .= "<h4>Certificate 3:</h4><a href=$document3>$document_name[3]</a>";
        }
        if ($certificate_data[0]["document4"] != NULL)
        {
            $txt .= "<h4>Certificate 4:</h4><a href=$document4>$document_name[4]</a>";
        }
        if ($certificate_data[0]["document5"] != NULL)
        {
            $txt .= "<h4>Certificate 5:</h4><a href=$document5>$document_name[5]</a>";
        }
            $txt .= "<hr>";

        }
        $txt .= "<h5>Best Regards</h5><br>";

        $to = "$email_of_recepient";
        $subject = "$certificate_name, $certificate_type, Documents";
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

}
