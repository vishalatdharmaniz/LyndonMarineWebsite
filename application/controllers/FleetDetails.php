<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FleetDetails extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();

	}
	
	function index($vessel_id)
	{
		$this->view_vessel_detail($vessel_id);
		
	}

	function view_vessel_detail($vessel_id)
	{
		$this->load->model('Home_model');
		$this->load->model('Vessel_model');

		$vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);

		$user_id = $this->session->userdata('user_id');
		$role_value= $this->Home_model->get_role_by_user_id($user_id); 
		$data['role'] = $role_value[0]['role']; 

		$data['vessel_data'] = $vessel_data;
			//print_r($vessel_data);
		$this->load->view('LyndonMarine/single_vessel',$data);
	}

	
}

?>