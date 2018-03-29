<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MailFixtureDetails extends CI_Controller
{

public function index($checkbox_ids,$email_of_recepient)
    {
          $this->load->model('Fixture_model');
          $this->load->model('Vessel_model');
        
        $return_url_after_search_and_mail = $this->agent->referrer(); 
        
        $checkbox_ids_array = explode("&", $checkbox_ids);  
        $checkbox_ids = array(); 
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
      
      
        $txt = "Good Day <br><br> Please find here list of Fixture details requested:<br><br><br>";
        $id= $checkbox_ids[0];   
        $fixture_data = $this->Fixture_model->get_fixture_by_id($id); 
        $vessel_id = $fixture_data[0]["vessel_id"];             
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 
        $vessel_name=$vessel_data[0]['vessel_name'];   
        foreach ($checkbox_ids as $id)
        {

            $fixture_data = $this->Fixture_model->get_fixture_by_id($id);   

            $data['fixture_data'] = $fixture_data[0];
            $fixture_no=$fixture_data[0]['fixture_no'];
            $fixture_date=$fixture_data[0]['fixture_date'];
            $fixture_date=date("d-m-Y",strtotime($fixture_date));
         
            $contract = $fixture_data[0]["contract"]; 
            $invoice = $fixture_data[0]["invoice"]; 

       if($contract!='')
            {
                
                $exploded_doc = explode("/", $contract);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $contract_name = empty($name) ? "" : $name; 
                $contract = str_replace(" ","%20","$contract");  
            }

       if($invoice!='')
            {

                $exploded_doc = explode("/", $invoice);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $invoice_name = empty($name) ? "" : $name; 
                $invoice = str_replace(" ","%20","$invoice");  
            }

            $txt .= "Fixture Number :- ".$fixture_no."<br>"; 
            $txt .= "Fixture Date :- ".$fixture_date."<br>";   
         /*   $txt .= "Documents :- <br>";
*/
        if ($fixture_data[0]["contract"] != NULL)
        {
            $txt .= "Contract : "."<a href=$contract > $contract_name</a><br>";

        }
        if ($fixture_data[0]["invoice"] != NULL)
        {
            $txt .= "Invoice : "."<a href=$invoice > $invoice_name</a><br>";

        }
            $txt .= "<hr>";
            $txt .= "<hr>";
        }

        $txt .= "Best Regards<br>"; /**/


        $to = "$email_of_recepient";
        $subject = "Fixture Details for ".$vessel_name;
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
       $var= mail($to,$subject,$txt,$headers); 
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

}
?>