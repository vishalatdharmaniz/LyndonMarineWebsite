<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselRecommendation extends CI_Controller 
{
	public function index($vessel_id)
	{
		$this->load->model('Recommendation_model');
    	$recommendation_data = $this->Recommendation_model->get_recommendation_details_by_vessel_id($vessel_id);
    	//var_dump($certificate_data);
    	$data['recommendation_data'] = $recommendation_data;
    	$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/VesselRecommendation',$data);
	}	
}
