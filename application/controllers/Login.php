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
        $this->load->model('admin/Company_model');
        $this->load->model('Profile_model');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[company.email]');

        $company_enabled = $this->check_enabled_value_for_company(); //print_r($user_enabled);die();
	        	if($company_enabled == 0){
	        		$this->load->view('LyndonMarine/AccountDisabled');
	        	}
	        	else
	        	{
	        		$company_login = array(
        		'email' => $this->input->post('email'),
        		'password' => $this->input->post('password')
        	);

        $data= $this->Company_model->login_company($company_login['email'],$company_login['password']);

	        if($data)
	        {

	        	
	        	$company_details = $this->Company_model->get_company_profile($company_login['email']);//print_r($user_details);
				$company_id = $company_details[0]['id'];

				$login_data = array(
		                   'email'  => $company_login['email'],
		                   'logged_in' => TRUE,
		                   'company_id' => $company_id
		         );
		       // print_r($login_data);
				$this->session->set_userdata($login_data);

				$this->load->model('Vessel_model');
				$vessels_by_company_id = $this->Vessel_model->get_vessel_data_by_company_id($company_id);
				
				if(COUNT($vessels_by_company_id)>0)
				{
					 //$this->load->view('LyndonMarine/all_vessel');

		            $base_url = BASE_URL;
		            header("Location: $base_url/index.php/AllVessels/company_vessel/$company_id"); 
				}
				else
				{
					  $base_url = BASE_URL;
		            header("Location: $base_url/index.php/AllVessels/company_vessel/$company_id"); /*
					$this->load->view('LyndonMarine/fleet');*/
				}
			
	        	
	        }
	        else{
	        	
	        	$message = 'Invalid email and password ';
	        	$data['message'] = $message;
	        	$this->load->view('LyndonMarine/home',$data);
	        }
	    }

    }

    public function check_enabled_value_for_company()
	{

		$login_user_id = $this->session->userdata('user_id'); //print_r($login_user_id);die();
		if ($login_user_id != FALSE)
		{
			$this->load->model('Company_model');
			$enabled = $this->Company_model->get_enable_by_company_by_user_id($login_user_id); //print_r($enabled);die();
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
