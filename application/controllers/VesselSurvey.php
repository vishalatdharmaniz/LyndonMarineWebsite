<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselSurvey extends CI_Controller {

	public function index($vessel_id)
	{
		
		$this->load->library('pagination');
		$this->load->model('Survey_model');
		
		$vesse_name_res = $this->Survey_model->get_vessel_name($vessel_id);
		if(!empty($vesse_name_res)){
			$vesse_name = $vesse_name_res[0]['vessel_name'];
		}else{
			$vesse_name = "";
		}
		$red = $this->Survey_model->red($vessel_id);
		$green = $this->Survey_model->green($vessel_id);
		$yellow = $this->Survey_model->yellow($vessel_id);
		//die("--");
		$brown = $this->Survey_model->brown($vessel_id);
		//echo "<pre>";print_r($brown);die;
		//echo "<pre>";print_r($brown);die;
		$ststus = array();
		foreach($red as $key => $value){
			$ststus[$value['id']] = 'red';
		}
		foreach($green as $key => $value){
			$ststus[$value['id']] = 'green';
		}
		
		foreach($yellow as $key => $value){
			$ststus[$value['id']] = 'yellow';
		}
		
		foreach($brown as $key => $value){
			$ststus[$value['id']] = 'brown';
		}
		//$all_vessel_details = $this->Survey_model->get_all_survey_details();
		
		$config = array();

		$config["base_url"] = base_url() . "index.php/VesselSurvey/index/$vessel_id";
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
			$match_values = array('vessel_id' => $vessel_id);
			//$fields = array('id','user_master_id','updated_by','field_name','field_old_value','field_new_value','modified');
			$result = $this->Survey_model->get_data('', $match_values, '', '=', '', $config['per_page'], $uri_segment);
			//echo $this->db->last_query();die;
			$abc=$this->Survey_model->total($vessel_id);
			$config["total_rows"] = $abc;
			$this->pagination->initialize($config);
			$data['all_survey_details'] = $result;
			$data['ststus'] =$ststus;
			$data['vessel_id'] =$vessel_id;
			$data['vessel_name'] =$vesse_name;
		$this->load->view('LyndonMarine/VesselSurvey',$data);
	}
	
	public function edit($id,$vessel_id){
		$this->load->model('Survey_model');
		if(array_key_exists('id',$_REQUEST)){
			$id = $_REQUEST['id'];
			$Survey = $this->input->post('Survey');
			$Lastsurvey = $this->input->post('Lastsurvey');
			if(!empty($Lastsurvey)){
				$last_survey_date = date("Y-m-d",strtotime(str_replace('/', '-', $Lastsurvey)));
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
			$data_to_save = array(
                'survey_no' => $Survey,
    			'last_survey_date' => $last_survey_date,
    			'postponed_date' => $postponed_date,
                'due_date' => $due_date,
                'range_from' => $range_from,
                'range_to' => $range_to,
                'reminder_due' => $examption,
                'comments' => $Comments,
				'reminder_range' => $reminder_range,
                //'price_idea' => $price_idea,
    			//'created' => date("Y-m-d  h:i:s"),
                //'modified' => date("Y-m-d h:i:s"),
    		);
			//$data_to_save = array(  
			//					  'survey_no' =>$_REQUEST['Survey'],
			//					  'last_survey_date' =>date("Y-m-d",strtotime(str_replace('/', '-', $_REQUEST['Lastsurvey']))),
			//					  'postponed_date' =>date("Y-m-d",strtotime(str_replace('/', '-', $_REQUEST['postponed_date']))),
			//					  'due_date' =>date("Y-m-d",strtotime(str_replace('/', '-', $_REQUEST['Due']))),
			//					  'range_from' =>date("Y-m-d",strtotime(str_replace('/', '-', $_REQUEST['range_from']))),
			//					  'range_to' =>date("Y-m-d",strtotime(str_replace('/', '-', $_REQUEST['range_to']))),
			//					  'reminder_due' =>$_REQUEST['examption'],
			//					  'reminder_range' =>$_REQUEST['reminder_range'],
			//					  'comments' =>$_REQUEST['Comments'],
			//					  );
			$this->Survey_model->update_survey($data_to_save,$id,$vessel_id);
			redirect("index.php/VesselSurvey/index/$vessel_id");
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
	
	public function delete($id,$vessel_id){
		if(!empty($id)){
			$this->load->model('Survey_model');
			$this->Survey_model->delete($id,$vessel_id);
			redirect("index.php/VesselSurvey/index/$vessel_id");
		}
	}
	
	public function search($vessel_id){
		$search = $_REQUEST['search'];
		$this->load->library('pagination');
		$this->load->model('Survey_model');
		
		$red = $this->Survey_model->red($vessel_id);
		$green = $this->Survey_model->green($vessel_id);
		$yellow = $this->Survey_model->yellow($vessel_id);
		$brown = $this->Survey_model->brown($vessel_id);
		$ststus = array();
		foreach($red as $key => $value){
			$ststus[$value['id']] = 'red';
		}
		foreach($green as $key => $value){
			$ststus[$value['id']] = 'green';
		}
		
		foreach($yellow as $key => $value){
			$ststus[$value['id']] = 'yellow';
		}
		foreach($brown as $key => $value){
			$ststus[$value['id']] = 'brown';
		}
		//$all_vessel_details = $this->Survey_model->get_all_survey_details();
		
		$config = array();

		$config["base_url"] = base_url() . "index.php/VesselSurvey/search/$vessel_id";
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
			$match = array('survey_no' => $search);
			$and_match_value = array('vessel_id' => $vessel_id);
			//$fields = array('id','user_master_id','updated_by','field_name','field_old_value','field_new_value','modified');
			$result = $this->Survey_model->get_data('', $match, 'AND', 'like', '', $config['per_page'], $uri_segment,"","",$and_match_value);
			//echo $this->db->last_query();die;
			$abc=$this->Survey_model->total_record($search,$vessel_id);
			$config["total_rows"] = $abc;
			$this->pagination->initialize($config);
			$data['all_survey_details'] = $result;
			$data['ststus'] = $ststus;
			$data['vessel_id'] = $vessel_id;
		$this->load->view("LyndonMarine/VesselSurvey",$data);
	}
	
	public function search_dropdown($vessel_id){
		$range = $_REQUEST['range'];
		$this->load->library('pagination');
		$this->load->model('Survey_model');
		
		$red = $this->Survey_model->red($vessel_id);
		$green = $this->Survey_model->green($vessel_id);
		$yellow = $this->Survey_model->yellow($vessel_id);
		$brown = $this->Survey_model->brown($vessel_id);
		$ststus = array();
		foreach($red as $key => $value){
			$ststus[$value['id']] = 'red';
		}
		foreach($green as $key => $value){
			$ststus[$value['id']] = 'green';
		}
		
		foreach($yellow as $key => $value){
			$ststus[$value['id']] = 'yellow';
		}
		
		foreach($brown as $key => $value){
			$ststus[$value['id']] = 'brown';
		}
		//$all_vessel_details = $this->Survey_model->get_all_survey_details();
		
		$config = array();

		$config["base_url"] = base_url() . "index.php/VesselSurvey/search_dropdown/$vessel_id?range=$range";
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

			$and_match_value = array('vessel_id' => $vessel_id);
			//$match = array('survey_no' => $search);
			//$fields = array('id','user_master_id','updated_by','field_name','field_old_value','field_new_value','modified');
			
			$result = $this->Survey_model->getSheetLog('',$and_match_value, '', '=', '', $config['per_page'], $uri_segment,null,null,null,$range,'','');
			//echo $this->db->query;die;
			//$result = $this->Survey_model->get_data('', $match, '', 'like', '', $config['per_page'], $uri_segment);
			//$abc=$this->Survey_model->total_record($search);
			$abc=count($this->Survey_model->getSheetLog('',$and_match_value, '', '=', '', '', '',null,null,null,$range,'',''));

			//die;
			//echo $this->db->last_query();
			//die;
			$config["total_rows"] = $abc;
			$this->pagination->initialize($config);
			$data['all_survey_details'] = $result;

			$data['ststus'] = $ststus;
			$data['vessel_id'] = $vessel_id;

		$this->load->view('LyndonMarine/VesselSurvey',$data);
	}
	
	
}
