<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditSurvey extends CI_Controller
{

public function index($id,$vessel_id)
  {
     $this->load->model('Survey_model');
     $survey_data=$this->Survey_model->get_survey_details_by_vessel_id($vessel_id);
     $data['survey_data'] = $survey_data;
     $data['vessel_id']=$vessel_id;
     $data['id']=$id;
     $this->load->view('LyndonMarine/EditVesselSurvey',$data);
   }
  public function Edit($id)
  {
		$this->load->model('Survey_model');
		
		if(array_key_exists('id',$_REQUEST)){
			$id = $_REQUEST['id'];
			$Survey = $_REQUEST['Survey'];
			$last_survey_date = $_REQUEST['Lastsurvey'];
			if(!empty($last_survey_date)){
				$last_survey_date = date("Y-m-d",strtotime(str_replace('/', '-', $last_survey_date)));
			}else{
				$last_survey_date = "";
			}
			$postponed_date = $_REQUEST['postponed_date'];
			if(!empty($postponed_date)){
				$postponed_date = date("Y-m-d",strtotime(str_replace('/', '-', $postponed_date)));
			}else{
				$postponed_date = 'NULL';
			}
			$Due = $_REQUEST['Due'];
			if(!empty($Due)){
				$due_date = date("Y-m-d",strtotime(str_replace('/', '-', $Due)));
			}else{
				$due_date = 'NULL';
			}
			$range_from = $_REQUEST['range_from'];
			if(!empty($range_from)){
				$range_from = date("Y-m-d",strtotime(str_replace('/', '-', $range_from)));
			}else{
				$range_from ='NULL';
			}
			$range_to = $_REQUEST['range_to'];
			if(!empty($range_to)){
				$range_to = date("Y-m-d",strtotime(str_replace('/', '-', $range_to)));
			}else{
				$range_to ='NULL';
			}
			$examption = $_REQUEST['examption'];
			$reminder_range = $_REQUEST['reminder_range'];
			$Comments = $_REQUEST['Comments'];
			
			$this->Survey_model->update_survey($id,$Survey,$last_survey_date,$postponed_date,$due_date,$range_from,$range_to,$examption,$Comments,$reminder_range);
			 $survey_data=$this->Survey_model->get_survey_details_by_id($id);
             $data['survey_data'] = $survey_data;
             $vessel_id=$survey_data[0]['vessel_id'];
			redirect("VesselSurvey/index/$vessel_id");
		}else{
			if(!empty($id)){
				
				$id_info = $this->Survey_model->get_survey_info($id,$vessel_id);
				if(!empty($id_info)){
					$data['data'] = $id_info[0];
					$data['id'] = $id_info[0];
					$data['vessel_id'] = $vessel_id;
					$this->load->view('LyndonMarine/EditVesselSurvey',$data);
				}else{
					redirect("index.php/VesselSurvey/index/$vessel_id");
				}
			}	
		}
		
	}

}
?>