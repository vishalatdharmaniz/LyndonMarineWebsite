<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewRecommendation extends CI_Controller 
{

	public function index($recommendation_id)
	{
		$this->load->Model('Recommendation_model');
		$recommendation_data=$this->Recommendation_model->get_recommendation_data($recommendation_id);
	    $data['recommendation_data'] = $recommendation_data;
	    $vessel_id=$recommendation_data[0]['vessel_id'];
	    $data['vessel_id'] = $vessel_id;
	    $data['recommendation_id'] = $recommendation_id;
	  /*  
	  var_dump($recommendation_type);*/
	 $this->load->view('LyndonMarine/ViewRecommendation',$data);

	}	
		
}
?>