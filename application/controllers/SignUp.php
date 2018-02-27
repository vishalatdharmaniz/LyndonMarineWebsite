<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignUp extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		/*
		$this->load->view('LyndonMarine/header');
		$this->load->view('LyndonMarine/index');
		$this->load->view('LyndonMarine/footer');
    */
    $this->register();
		
			
	}
	
	
	function register()
	{

			$name = $this->input->post('name');
			$organization = $this->input->post('organization');
			$address = $this->input->post('address');
			$city = $this->input->post('city');
			$country = $this->input->post('country');
			$telephone = $this->input->post('telephone');
			$account_type = $this->input->post('account_type');
			$note = $this->input->post('note');
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			$this->load->model('Home_model');
		
			$data = array(
				'name' => $name,
				'organization' => $organization,
				'address' => $address,
				'city' => $city,
				'country' => $country,
				'telephone' => $telephone,
				'account_type' => $account_type,
				'note' => $note,
				'email' => $email,
				'password' => $password
				
			);
			//print_r($data);
			//$this->Home_model->insert_user($data);
			
			$email_check= $this->Home_model->check_email($data['email']);
			if($email_check){
				if (filter_var($data['email'], FILTER_VALIDATE_EMAIL))
				{
				$this->Home_model->insert_user($data);

				$message = "Your request for signup has been sent to admin, We will contact you soon";
				$data["message"] = $message;
				$this->load->view('LyndonMarine/home',$data);
			}
			else{
				$message= 'Please enter valid email address';
				$data['message']= $message;
				$this->load->view('LyndonMarine/home',$data);
			}
			}
			else
			{

				$message= 'Your email is already registered with us';
				$data['message']= $message;
				$this->load->view('LyndonMarine/home',$data);
			}
	
    }
    
    function check_email_exist()
    {
    	$email= $this->input->post('email');
    	$this->load->model('Home_model');

    	$email_already_exists = $this->Home_model->check_email_exist($email);
    	echo $email_already_exists;
    	
    }
    

}
