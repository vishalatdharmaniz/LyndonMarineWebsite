<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailSurveyDetails extends CI_Controller {

    public function index($id,$email_of_recepient)
    {
        
        $this->load->model('Survey_model');
        
        $survey_data = $this->Survey_model->get_survey_details_by_id($id);

        $data['survey_data'] = $survey_data[0]; 

        $survey_no = $survey_data[0]["survey_no"];
        $last_date = $survey_data[0]["last_survey_date"];
        $last_date=date("d-m-Y",strtotime($last_date));

        $post_date = $survey_data[0]["postponed_date"];
        $post_date=date("d-m-Y",strtotime($post_date));

        $due_date = $survey_data[0]["due_date"];
        $due_date=date("d-m-Y",strtotime($due_date));

        $range_from = $survey_data[0]["range_from"];
        $range_from=date("d-m-Y",strtotime($range_from));

        $range_to = $survey_data[0]["range_to"];
        $range_to=date("d-m-Y",strtotime($range_to));

        $comments = $survey_data[0]["comments"];
        $reminder_due = $survey_data[0]["reminder_due"]; 
        $reminder_range = $survey_data[0]["reminder_range"];        

        $document1 = $survey_data[0]["document1"];
        $document2 = $survey_data[0]["document2"];
        $document3 = $survey_data[0]["document3"];
        $document4 = $survey_data[0]["document4"];
        $document5 = $survey_data[0]["document5"];

        for($i = 1; $i <= 5 ; $i++)
        {
            $document = $survey_data[0]['document'.$i];
            $exploded_doc = explode("CertificateDocuments/", $document);
            $name = isset($exploded_doc[1]) ? $exploded_doc[1] : NULL;
            $document[$i] = empty($name) ? "no-doc" : $name;
        }

        $to = "$email_of_recepient";
        $subject = "$certificate_name";
         $txt = "Survey Number :- ".$survey_no."<br>"; 
            $txt .= "Last Date Of Survey :- ".$last_date."<br>";
            $txt .= "Postponed Date :- ".$post_date."<br>";
            $txt .= "Due Date :- ".$due_date."<br>";
            $txt .= "Range From :- ".$range_from."<br>";
            $txt .= "Range To :- ".$range_to."<br>";
            $txt .= "Comments :- ".$comments."<br>";
            $txt .= "Reminder Due :- ".$reminder_due."<br>";
            $txt .= "Reminder Range :- ".$reminder_range."<br>";

        $txt .= "<h1>Documents : </h1>";
        if ($survey_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document1>$document[1]</a>";
        }
        if ($survey_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document2>$document[2]</a>";
        }
        if ($survey_data[0]["document3"] != NULL)
        {
            $txt .= "<a href=$document3>$document[3]</a>";
        }
        if ($survey_data[0]["document4"] != NULL)
        {
            $txt .= "<a href=$document4>$document[4]</a>";
        }
        if ($survey_data[0]["document5"] != NULL)
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
     
         $this->load->model('Survey_model');
         $this->load->model('Vessel_model');
        
            $id= $checkbox_ids[0]; 
            $survey_data=$this->Survey_model->get_survey_details_by_id($id);
            $data['survey_data']=$survey_data;

            foreach ($checkbox_ids as $id)
            {
                 $survey_data=$this->Survey_model->get_survey_details_by_id($id);
                 $data['survey_data']=$survey_data;

                 $vessel_id = $survey_data[0]["vessel_id"];
                 $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
                 $vessel_name=$vessel_data[0]['vessel_name'];
                 $imo=$vessel_data[0]['imo_number'];

                $survey_no = $survey_data[0]["survey_no"];

                $last_date = $survey_data[0]["last_survey_date"];
                $last_date=date("d-m-Y",strtotime($last_date));

                $post_date = $survey_data[0]["postponed_date"];
                $post_date=date("d-m-Y",strtotime($post_date));

                $due_date = $survey_data[0]["due_date"];
                $due_date=date("d-m-Y",strtotime($due_date));

                 $range_from = $survey_data[0]["range_from"];
                 $range_to = $survey_data[0]["range_to"];
                 
                if($range_from!="")
                {
               
                $range_from=date("d-m-Y",strtotime($range_from));
                }
                else{
                    $range_from="N-A";
                }
                if($range_to!="")
                {
                
                $range_to=date("d-m-Y",strtotime($range_to));
                }
                else
                {
                    $range_to="N-A";
                }
                if($reminder_due!="0")
                {
                $reminder_due = $survey_data[0]["reminder_due"];
                } 
                else
                {
                    $reminder_due="N-A";
                }
                if($reminder_range!="0")
                {
                $reminder_range = $survey_data[0]["reminder_range"];        
                 }
                 else
                {
                    $reminder_range="N-A";
                }

                $txt = "Survey Number :- ".$survey_no."<br>";   
                $txt .= "Last Date Of Survey :- ".$last_date."<br>";
                $txt .= "Postponed Date :- ".$post_date."<br>";
                $txt .= "Due Date :- ".$due_date."<br>";
                $txt .= "Range From :- ".$range_from."<br>";
                $txt .= "Range To :- ".$range_to."<br>";
                $txt .= "Comments :- ".$comments."<br>";
                $txt .= "Reminder Due :- ".$reminder_due."<br>";
                $txt .= "Reminder Range :- ".$reminder_range."<br>"; /*var_dump($comments); die();*/
                $txt .= "<hr>";
                $txt .= "<hr>";

            

             $txt .= "Best Regards<br>";
            
            $to = "$email_of_recepient";
            $subject = "Survey Details For : $vessel_name";

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $headers .= "From: office@lyndonmarine.com";
            }
            
            mail($to,$subject,$txt,$headers);

            $base_url = BASE_URL;
            header("Location: $return_url_after_search_and_mail");
    }

   
}
