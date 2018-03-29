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
         // For getting vessel name to print on the view form.
			$this->load->model('Vessel_model');
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
            $data['vessel_data'] = $vessel_data;

            $data['search'] = '';
			$data['all_survey_details'] = $result;
			$data['ststus'] =$ststus;
			$data['vessel_id'] =$vessel_id;

			

		$this->load->view('LyndonMarine/VesselSurvey',$data);
	}
	
	
	public function delete($id,$vessel_id){
		if(!empty($id)){
			$this->load->model('Survey_model');
			$this->Survey_model->delete($id,$vessel_id);
			redirect("VesselSurvey/index/$vessel_id");
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
			// For getting vessel name to print on the view form.
			$this->load->model('Vessel_model');
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
            $data['vessel_data'] = $vessel_data;

			$data['all_survey_details'] = $result;
			$data['ststus'] = $ststus;
			$data['search'] = $search;
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
			// For getting vessel name to print on the view form.
			$this->load->model('Vessel_model');
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
            $data['vessel_data'] = $vessel_data;

            $data['search'] = '';
			$data['ststus'] = $ststus;
			$data['vessel_id'] = $vessel_id;

		$this->load->view('LyndonMarine/VesselSurvey',$data);
	}
	
	
}
