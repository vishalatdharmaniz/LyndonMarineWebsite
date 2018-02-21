<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey extends CI_Controller
 {

	
	public function add()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->form_validation->set_rules('survey_no', 'Survey', 'required');
		$this->form_validation->set_rules('last_survey_date', 'Last Survey Date', 'required');
		
		if ($this->form_validation->run() == FALSE)
		{
				$this->load->view('LyndonMarine/add_survey');
		}
		else
		{
				$this->load->view('LyndonMarine/add_survey');
		}
		
		
		//if(isset($_REQUEST) && array_key_exists('survey_no',$_REQUEST)){
		//	
		//	$this->load->model('Survey_model');
		//}
		//	
		//	$this->load->view('LyndonMarine/add_survey');
	}
}
