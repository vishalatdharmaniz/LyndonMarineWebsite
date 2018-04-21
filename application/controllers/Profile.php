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
		$this->profile();
	}

	function profile()
    {

    	$this->load->model('Profile_model');
    	$user_id = $this->session->userdata('user_id');
    	$user_data = $this->Profile_model->get_profile_by_user_id($user_id);
			
		$data['user_data'] = $user_data;

		//print_r($user_data);

    	$this->load->view('LyndonMarine/profile',$data);
    }

    function edit_profile()
    {
    	$this->load->model('Profile_model');
    
    	$user_id = $this->session->userdata('user_id');
    	$user_data = $this->Profile_model->get_profile_by_user_id($user_id);
			
		$data['user_data'] = $user_data;
			
    	$this->load->view('LyndonMarine/edit_profile',$data);

		
    }
}

?>