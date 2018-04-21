<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->company_profile();
	}

	function company_profile()
    {

    	$this->load->model('Profile_model');
    	$company_id = $this->session->userdata('company_id');
    	$company_data = $this->Profile_model->get_profile_by_company_id($company_id);
			
		$data['company_data'] = $company_data;

		//print_r($user_data);

    	$this->load->view('LyndonMarine/company_profile',$data);
    }

    function edit_profile()
    {
    	$this->load->model('Profile_model');
    
    	$company_id = $this->session->userdata('company_id');
    	$company_data = $this->Profile_model->get_profile_by_company_id($company_id);
			
		$data['company_data'] = $company_data;
			
    	$this->load->view('LyndonMarine/edit_company_profile',$data);

		
    }
}

?>