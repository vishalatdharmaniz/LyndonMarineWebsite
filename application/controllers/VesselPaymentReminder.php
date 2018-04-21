<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselPaymentReminder extends CI_Controller
{

  public function index($vessel_id,$offset=0)
	{
		$this->load->library('pagination');
	    $this->load->model('PaymentReminder_model');
	     $this->load->model('Vessel_model');

	        $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';

           $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
        
           $total_payments_details = $this->PaymentReminder_model->get_all_payments_reminder_for_pagination($vessel_id,$offset);

            $total_payment_reminder = $this->PaymentReminder_model->get_total_reminder_details($vessel_id);
            
              
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
           
            $data['vessel_data'] = $vessel_data;
        
            
            $config['base_url'] = base_url().'index.php/VesselPaymentReminder/index/'.$vessel_id;
            $config['total_rows'] = $total_payment_reminder; 
            $config['per_page'] =10;
            $config['uri_segment'] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;

	      $data['total_payments_details']=$total_payments_details ;
	      $data['vessel_id']=$vessel_id ;
        $this->load->view('LyndonMarine/VesselPaymentReminder',$data);
    }
   public function delete($reminder_id,$vessel_id)
	{
        $this->load->model('PaymentReminder_model');
 
        $delete_document = $this->PaymentReminder_model->delete_reminder_by_reminder_id($reminder_id);

         $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselPaymentReminder/index/$vessel_id"); 

    }
    
    public function view($reminder_id)
	{
		$this->load->model('PaymentReminder_model');
		$reminder_details=$this->PaymentReminder_model->get_reminder_details($reminder_id);
	    $data['reminder_details'] = $reminder_details;
	    $vessel_id=$reminder_details[0]['vessel_id'];
	    $data['vessel_id'] = $vessel_id;
	    $data['reminder_id'] = $reminder_id;
	  
	 $this->load->view('LyndonMarine/ViewPaymentReminder',$data);

}

 public function search_dropdown_status($vessel_id)
     {
        $range = $_REQUEST['range'];
        $this->load->library('pagination');
        $this->load->model('PaymentReminder_model');
         $this->load->model('Vessel_model');
        
        $config = array();

        $config["base_url"] = base_url() . "index.php/VesselPaymentReminder/search_dropdown_status/$vessel_id?range=$range";
        $config['per_page'] = '10';
            $config['num_links'] = '5';
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            
            $page = 1;
            if($this->input->get('per_page')){
                $page = ($this->input->get('per_page')) ;
            }
            
            $uri_segment = ($page-1) * $config["per_page"]; 
            $config['uri_segment'] = $uri_segment;
            
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
            $data['vessel_data']= $vessel_data;

            $result = $this->PaymentReminder_model->getSheetLog('','', '', '=', '', $config['per_page'], $uri_segment,null,null,null,$range,'','',$vessel_id);

            
            $total_rows=count($this->PaymentReminder_model->getSheetLog('','', '', '=', '', '', '',null,null,null,$range,'','',$vessel_id));
            
            $config["total_rows"] = $total_rows;
            $this->pagination->initialize($config);
             $data['links'] = $this->pagination->create_links();
            $data['total_payments_details'] = $result;
                    $data['vessel_id'] = $vessel_id;  
            $this->load->view('LyndonMarine/VesselPaymentReminder',$data);
    }  

/*
 public function multiple_mail($checkbox_ids, $email_of_recepient)
    {

        $this->load->model('PaymentReminder_model');
        $this->load->model('Vessel_model');

        $return_url_after_search_and_mail = $this->agent->referrer();
        $checkbox_ids_array = explode("@", $checkbox_ids);  
        $checkbox_ids = array(); 
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
        

        $txt = "Good Day <br><br> Please find here list of requested documents :<br><br><br>";
        $reminder_id= $checkbox_ids[0];
        $document_data = $this->PaymentReminder_model->get_reminder_details($reminder_id);
        $vessel_id = $document_data[0]["vessel_id"];
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 

      
        foreach ($checkbox_ids as $reminder_id)
        {

        $document_data = $this->PaymentReminder_model->get_reminder_details($reminder_id);
     
         $vessel_id = $document_data[0]["vessel_id"];
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);

        $documentName = $document_data[0]["document_name"];
        $description = $document_data[0]["description"];
    
      
        for($i = 1; $i <= 2 ; $i++)
        {
            $document[$i] = $document_data[0]['document'.$i];
            $exploded_doc = explode("/", $document[$i]);
            $name = isset($exploded_doc[7]) ? $exploded_doc[7] : NULL;
            $doc_name[$i] = empty($name) ? "" : $name; 
            $document[$i] = str_replace(" ","%20","$document[$i]"); 


        }
        
          $vessel_name= $vessel_data[0]['vessel_name'];
      
            $txt .= "Document Name :- ".$documentName."<br>";
            $txt .= "Description :- ".$description."<br>";
      
        if ($document_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document[1]>$doc_name[1]</a><br>";

        }
        if ($document_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document[2]>$doc_name[2]</a><br>";
        }
   
            $txt .= "<hr>";
            $txt .= "<hr>";
        }

        $txt .= "Best Regards<br>";


        $to = "$email_of_recepient";
        $subject = "Old Documents for : ".$vessel_name;

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }*/

}
?>