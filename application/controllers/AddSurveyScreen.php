<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddSurveyScreen extends CI_Controller
{

	public function index($vessel_id)
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->form_validation->set_rules('Survey', 'Survey', 'required');
		$this->form_validation->set_rules('Lastsurvey', 'Last Survey', 'required');
		$this->form_validation->set_rules('Due', 'DUE DATE', 'required');
		//$this->form_validation->set_rules('range_from', 'Range From', 'required');
		//$this->form_validation->set_rules('range_to', 'Range To', 'required');
		$this->form_validation->set_rules('examption', 'Reminder Due', 'required');
		$this->form_validation->set_rules('reminder_range', 'Reminder Range', 'required');
		//$this->form_validation->set_rules('Comments', 'Comments', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$data['vessel_id'] = $vessel_id;
				$this->load->view('LyndonMarine/AddSurvey',$data);
		}else{
			$this->load->model('Survey_model');
			$Survey = $this->input->post('Survey');
			$last_survey_date = $this->input->post('Lastsurvey');
			$vessel_id = $this->input->post('vessel_id');
			if(!empty($last_survey_date)){
				$last_survey_date = date("Y-m-d",strtotime(str_replace('/', '-', $last_survey_date)));
			}else{
				$last_survey_date = "";
			}
			$postponed_date = $this->input->post('postponed_date');
			if(!empty($postponed_date)){
				$postponed_date = date("Y-m-d",strtotime(str_replace('/', '-', $postponed_date)));
			}else{
				$postponed_date = 'NULL';
			}
			$Due = $this->input->post('Due');
			if(!empty($Due)){
				$due_date = date("Y-m-d",strtotime(str_replace('/', '-', $Due)));
			}else{
				$due_date = 'NULL';
			}
			$range_from = $this->input->post('range_from');
			if(!empty($range_from)){
				$range_from = date("Y-m-d",strtotime(str_replace('/', '-', $range_from)));
			}else{
				$range_from ='NULL';
			}
			$range_to = $this->input->post('range_to');
			if(!empty($range_to)){
				$range_to = date("Y-m-d",strtotime(str_replace('/', '-', $range_to)));
			}else{
				$range_to ='NULL';
			}
			$examption = $this->input->post('examption');
			$reminder_range = $this->input->post('reminder_range');
			$Comments = $this->input->post('Comments');
			
			
			$data = array(
                'survey_no' => $Survey,
    			'last_survey_date' => $last_survey_date,
    			'postponed_date' => $postponed_date,
                'due_date' => $due_date,
                'range_from' => $range_from,
                'range_to' => $range_to,
                'reminder_due' => $examption,
                'comments' => $Comments,
				'reminder_range' => $reminder_range,
				'vessel_id' => $vessel_id,
                //'price_idea' => $price_idea,
    			'created' => date("Y-m-d  h:i:s"),
                'modified' => date("Y-m-d h:i:s"),
    		);
			//echo "<pre>";print_r($data);die;
			$this->Survey_model->add($data);
			$message = 'Your data Successfully saved!';
			$data['message']= $message;
    	       $base_url = BASE_URL;
			   $user_id = $this->session->userdata('user_id');
                //header("Location: $base_url/index.php/AllVessels/index");
				$data['vessel_id'] = $vessel_id;
                header("Location: $base_url/index.php/VesselSurvey/index/$vessel_id"); 
		}
	}


}

?>