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

 $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
		
    	$recommendation_data = $this->Recommendation_model->get_recommendation_details_by_vessel_id($vessel_id);
$data['recommendation_data'] = $this->Recommendation_model->get_all_recommendation_data_for_pagination($vessel_id,$offset);

$total_recommendation = $this->Recommendation_model->get_total_recommendation($vessel_id);
            

                $config['base_url'] = base_url().'index.php/VesselRecommendation/index/'.$vessel_id;
                    $config['total_rows'] = $total_recommendation; 
                    $config['per_page'] = 8;
                    $config['uri_segment'] = 4;
                    
                    $this->pagination->initialize($config);
                    
                    $data['links'] = $this->pagination->create_links();

                    $data['offset'] = $offset;

    	$data['recommendation_data'] = $recommendation_data;
    	$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/VesselRecommendation',$data);
	}	
}
