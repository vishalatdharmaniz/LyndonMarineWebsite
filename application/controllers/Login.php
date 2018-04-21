<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
    	$this->login_user();
	}
	
    function login_user()
    {
        $this->load->model('Home_model');
        $this->load->model('Profile_model');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[user_details.email]');

        $user_enabled = $this->check_enabled_value_for_user(); //print_r($user_enabled);die();
	        	if($user_enabled == 0){
	        		$this->load->view('LyndonMarine/AccountDisabled');
	        	}
	        	else
	        	{
	        		$user_login = array(
        		'email' => $this->input->post('email'),
        		'password' => $this->input->post('password')
        	);

        $data= $this->Home_model->login_user($user_login['email'],$user_login['password']);
	        if($data)
	        {

	        	
	        	$user_details = $this->Profile_model->get_user_profile($user_login['email']);//print_r($user_details);
				$user_id = $user_details[0]['id'];
				$login_data = array(
		                   'email'  => $user_login['email'],
		                   'logged_in' => TRUE,
		                   'user_id' => $user_id
		         );
		       // print_r($login_data);
				$this->session->set_userdata($login_data);

				$this->load->model('Vessel_model');
				$vessels_by_user_id = $this->Vessel_model->get_vessel_data_by_userid($user_id);
				
				if(COUNT($vessels_by_user_id)>0)
				{
					 //$this->load->view('LyndonMarine/all_vessel');

		            $base_url = BASE_URL;
		            header("Location: $base_url/index.php/AllVessels/user_vessel/$user_id"); 
				}
				else
				{
					$this->load->view('LyndonMarine/fleet');
				}
			
	        	
	        }
	        else{
	        	
	        	$message = 'Invalid email and password ';
	        	$data['message'] = $message;
	        	$this->load->view('LyndonMarine/home',$data);
	        }
	    }

    }

    public function check_enabled_value_for_user()
	{

		$login_user_id = $this->session->userdata('user_id'); //print_r($login_user_id);die();
		if ($login_user_id != FALSE)
		{
			$this->load->model('Home_model');
			$enabled = $this->Home_model->get_enable_by_user_id($login_user_id); //print_r($enabled);die();
			if ($enabled == 0)
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}
		else
		{
			return 1;
		}
	}
	
}
