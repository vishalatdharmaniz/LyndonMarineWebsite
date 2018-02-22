<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselPlans extends CI_Controller
{

    public function index($vessel_id,$offset=0)
    {   
        $this->load->library('pagination');
    	$this->load->model('Plans_model');
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

                
    	$vessel_plans = $this->Plans_model->get_plans_details_by_vessel_id($vessel_id);

        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data']= $vessel_data;

        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
    	$data['vessel_plans'] = $this->Plans_model->get_plans_details_by_pagination($vessel_id,$offset);

        $total_plans = COUNT($this->Plans_model->get_plans_details_by_pagination($vessel_id,$offset));

                $config['base_url'] = base_url().'index.php/VesselPlans/index/'.$vessel_id;
                    $config['total_rows'] = $total_plans; 
                    $config['per_page'] = 10;
                    $config['uri_segment'] = 4;
                    
                    $this->pagination->initialize($config);
                    
                    $data['links'] = $this->pagination->create_links();

                    $data['offset'] = $offset;
    	$data['vessel_id'] = $vessel_id;

        $this->load->view('LyndonMarine/VesselPlans',$data);
    }
public function edit_plan($plans_id)
    {
        $this->load->model('Plans_model');
        $vessel_plans = $this->Plans_model->get_vessel_plan_data($plans_id);

        $data['vessel_plans'] = $vessel_plans[0];
        $data['plans_id'] = $plans_id;
        $this->load->view('LyndonMarine/EditPlan',$data);
    }
    public function view_plan($plans_id)
    {
        $this->load->model('Plans_model');

        $vessel_plans = $this->Plans_model->get_vessel_plan_data($plans_id);

        $data['vessel_plans'] = $vessel_plans[0];
        // $data['plans_id'] = $plans_id;
        $vessel_id = $vessel_plans[0]['vessel_id'];
        $data['vessel_id'] = $vessel_id; 
        $this->load->view('LyndonMarine/ViewPlans',$data);
    }

    public function delete_plan($plan_id,$vessel_id)
    {
        $this->load->model('Plans_model');
 
        $delete_plan_data = $this->Plans_model->delete_plan_data_by_plan_id($plan_id);

         $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselPlans/index/$vessel_id"); 

    }

    public function multiple_plans($checkbox_ids, $email_of_recepient)
    {
        $return_url_after_search_and_mail = $this->agent->referrer();
        $checkbox_ids_array = explode("@", $checkbox_ids);
        $checkbox_ids = array();
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }

        $this->load->model('Plans_model');
        $this->load->model('Vessel_model');

        $txt = "Good Day <br><br> Please find here list of plans requested:<br><br><br>";
 $plans_id= $checkbox_ids[0];
        $vessel_plans = $this->Plans_model->get_vessel_plan_data($plans_id);
           $vessel_id = $vessel_plans[0]["vessel_id"];
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 

            $txt .= "M/V &nbsp;".$vessel_data[0]['vessel_name']."<br>";
            $txt .= "IMO Number &nbsp;".$vessel_data[0]['imo_number']."<br><br>";
        foreach ($checkbox_ids as $plans_id)
        {

            $vessel_plans = $this->Plans_model->get_vessel_plan_data($plans_id);
// print_r($vessel_plans);die();
             $vessel_id = $vessel_plans[0]["vessel_id"];
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
           // print_r($vessel_data);die();
            $data['vessel_plans'] = $vessel_plans[0];

        $plans_id = $vessel_plans[0]["plan_id"];
        $plan_no = $vessel_plans[0]["plan_no"];
        $plan_name = $vessel_plans[0]["plan_name"];

    

        $document1 = $vessel_plans[0]["upload_plan1"];
        $document2 = $vessel_plans[0]["upload_plan2"];
        
        
        $vessel_name= $vessel_data[0]['vessel_name'];
        $imo_number= $vessel_data[0]['imo_number'];

            for($i = 1; $i <= 2 ; $i++)
            {
                $document[$i] = $vessel_plans[0]['upload_plan'.$i];
                $exploded_doc = explode("/", $document[$i]);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name[$i] = empty($name) ? "" : $name;  
                $document[$i] = str_replace(" ","%20","$document[$i]");
            }

            
            $txt .= $plan_name."<br>";
        if ($vessel_plans[0]["upload_plan1"] != NULL)
        {
            $txt .= "<a href=$document[1]>$document_name[1]</a><br>";
        }
        if ($vessel_plans[0]["upload_plan2"] != NULL)
        {
            $txt .= "<a href=$document[2]>$document_name[2]</a><br>";
        }
        
            $txt .= "<hr>";

        }
        $txt .= "Best Regards<br>";

        $to = "$email_of_recepient";
        $subject = "$vessel_name, $imo_number, Documents";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }

    public function search_plan_data($searchplan,$vessel_id,$offset=0)
    {
         $this->load->library('pagination');
        $this->load->model('Plans_model');
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
            
           $offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $vessel_plans = $this->Plans_model->search_by_plan($searchplan,$vessel_id,$offset);
        $data['vessel_plans'] = $vessel_plans;
        
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data']= $vessel_data;

        $total_search_certificate = COUNT($this->Plans_model->search_by_plan($searchplan,$vessel_id,$offset));

            $config['base_url'] = base_url().'index.php/VesselPlans/search_plan_data/'.$searchplan.'/'.$vessel_id;
            $config['total_rows'] = $total_search_certificate;
            $config['per_page'] = 5;
            $config['uri_segment'] = 5;
                    
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;

        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/VesselPlans',$data);
    }
}

?>