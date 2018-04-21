<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailRecommendationDetails extends CI_Controller {

    public function index($recommendation_id,$email_of_recepient)
    {
        //var_dump($certificate_id);die();

        $this->load->model('Recommendation_model');
        
        $recommendation_data = $this->Recommendation_model->get_recommendation_data($recommendation_id);

        $data['recommendation_data'] = $recommendation_data[0]; 

        $description = $recommendation_data[0]["description"];
        $rec_type = $recommendation_data[0]["recommendation_type"];
       /* $image1 = $recommendation_data[0]["image1"];
        $image2 = $recommendation_data[0]["image2"];
        $image3 = $recommendation_data[0]["image3"];*/

         for($i = 1; $i <= 5 ; $i++)
            {
                $image[$i] = $recommendation_data[0]['image'.$i];

                $exploded_doc = explode("/", $image[$i]);
                $name = isset($exploded_doc[8]) ? $exploded_doc[8] : NULL;
                $image_name[$i] = empty($name) ? "" : $name;  
                $image[$i] = str_replace(" ","%20","$image[$i]");
            }
            

        $to = "$email_of_recepient";
        $subject = "$rec_type";
        $txt = "$description";

        $txt .= "<h1>Documents:</h1>";
        if ($recommendation_data[0]["image1"] != NULL)
        {
            $txt .= "<a href=$image1>$document[1]</a>";
        }
        if ($recommendation_data[0]["image2"] != NULL)
        {
            $txt .= "<a href=$image2>$document[2]</a>";
        }
        if ($recommendation_data[0]["image3"] != NULL)
        {
            $txt .= "<a href=$image3>$document[3]</a>";
        }

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $base_url/index.php/VesselCertificate/index");
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

        $this->load->model('Recommendation_model');
        $this->load->model('Vessel_model');

        $txt = "Good Day <br><br> Please find here list of requested recommendation details :<br><br><br>";
        $id= $checkbox_ids[0]; 

        $recommendation_data = $this->Recommendation_model->get_recommendation_data($id);
           $vessel_id = $recommendation_data[0]["vessel_id"];
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 
            $vessel_name= $vessel_data[0]['vessel_name'];

            $txt .= "M/V &nbsp;".$vessel_data[0]['vessel_name']."<br>";
            $txt .= "IMO Number &nbsp;".$vessel_data[0]['imo_number']."<br><br>";  
        foreach ($checkbox_ids as $id)
        {

            $recommendation_data = $this->Recommendation_model->get_recommendation_data($id);
          /*  $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);*/
           
            $data['recommendation_data'] = $recommendation_data[0];

             $rec_type = $recommendation_data[0]["recommendation_type"];
             $description = $recommendation_data[0]["description"];
            /* var_dump($rec_type); die();*/
            

            for($i = 1; $i <= 3 ; $i++)
            {
                $image[$i] = $recommendation_data[0]['image'.$i];

                $exploded_doc = explode("/", $image[$i]);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $image_name[$i] = empty($name) ? "" : $name;  
                $image[$i] = str_replace(" ","%20","$image[$i]"); 
            }
           
         
                 $txt .="Recommendation Type :- ".$rec_type."<br>"; 
                 $txt .="Description :- ".$description."<br>"; 
                 
                if ($recommendation_data[0]["image1"] != NULL)
                {
                    $txt .= "<a href=$image[1]>$image_name[1]</a><br>";

                }
                if ($recommendation_data[0]["image2"] != NULL)
                {
                    $txt .= "<a href=$image[2]>$image_name[2]</a><br>";
                }
                if ($recommendation_data[0]["image3"] != NULL)
                {
                    $txt .= "<a href=$image[3]>$image_name[3]</a><br>";
                }
                    $txt .= "<hr>";
                    $txt .= "<hr>";
                }

        $txt .= "Best Regards<br>";


        $to = "$email_of_recepient";
        $subject = "Recommendation Details For : ".$vessel_name;  

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }
}
