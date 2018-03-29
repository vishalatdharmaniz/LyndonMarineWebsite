<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewSurvey extends CI_Controller 
{

	public function index($id)
	{
		$this->load->model('Survey_model');
		$survey_data=$this->Survey_model->get_survey_details_by_id($id);
	    $data['survey_data'] = $survey_data; 
	    $vessel_id=$survey_data[0]['vessel_id'];
	    $data['vessel_id'] = $vessel_id;
	    $data['id'] = $id;
	  
	 $this->load->view('LyndonMarine/ViewSurvey',$data);

	}	
		
}
?>