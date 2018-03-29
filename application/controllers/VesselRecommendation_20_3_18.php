<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselRecommendation extends CI_Controller 
{
	public function index($vessel_id,$offset=0)
	{
		 $this->load->library('pagination');
		 $this->load->model('Recommendation_model');

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

 $offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : $offset;
		
    	$recommendation_data = $this->Recommendation_model->get_recommendation_details_by_vessel_id($vessel_id);
$data['recommendation_data'] = $this->Recommendation_model->get_all_recommendation_data_for_pagination($vessel_id,$offset);

$total_recommendation = $this->Recommendation_model->get_total_recommendation($vessel_id);
            

                $config['base_url'] = base_url().'index.php/VesselRecommendation/index/'.$vessel_id;
                    $config['total_rows'] = $total_recommendation; 
                    $config['per_page'] = 10;
                    $config['uri_segment'] = 5;
                    
                    $this->pagination->initialize($config);
                    
                    $data['links'] = $this->pagination->create_links();

                    $data['offset'] = $offset;

    	$data['recommendation_data'] = $recommendation_data;
    	$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/VesselRecommendation',$data);
	}	


    public function search_recommendation_type($searchtype,$vessel_id)
    {
        $this->load->library('pagination');
        $this->load->model('Recommendation_model');
        $this->load->model('Vessel_model');

          $searchtype=str_replace("%20", "_", $searchtype);

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
         $recommendation_data = $this->Recommendation_model->search_by_recommendation_type($searchtype,$vessel_id,$offset);
        $data['recommendation_data'] = $recommendation_data; 

        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data']= $vessel_data;
         $total_search_recommendation = $this->Recommendation_model->search_total_recommendation_type($searchtype,$vessel_id);

            $config['base_url'] = base_url().'index.php/VesselRecommendation/search_recommendation_type/'.$searchtype.'/'.$vessel_id;
            $config['total_rows'] = $total_search_recommendation;
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
                    
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;
        // $vessel_id = $recommendation_data[0]['vessel_id'];
            $data['recommendation_data'] = $recommendation_data;
        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/VesselRecommendation',$data);
    }

     public function search_dropdown_status($vessel_id)
     {
        $range = $_REQUEST['range'];
        $this->load->library('pagination');
        $this->load->model('Recommendation_model');
         $this->load->model('Vessel_model');
        
        $config = array();

        $config["base_url"] = base_url() . "index.php/VesselRecommendation/search_dropdown_status/$vessel_id?range=$range";
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

            $result = $this->Recommendation_model->getSheetLog('','', '', '=', '', $config['per_page'], $uri_segment,null,null,null,$range,'','',$vessel_id);

            
            $total_rows=count($this->Recommendation_model->getSheetLog('','', '', '=', '', '', '',null,null,null,$range,'','',$vessel_id));
            
            $config["total_rows"] = $total_rows;
            $this->pagination->initialize($config);
             $data['links'] = $this->pagination->create_links();
            $data['recommendation_data'] = $result;
                    $data['vessel_id'] = $vessel_id;  
            $this->load->view('LyndonMarine/VesselRecommendation',$data);
    }  


}
