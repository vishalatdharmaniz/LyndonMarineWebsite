<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ForgotPassword extends CI_Controller
{
	public function index()
	{
		$email = $_REQUEST['email']; //print_r($email);die();
		if($email== "")
		{
			$data['message'] = "Email not entered";
		}
		else
		{
			$this->load->model('Home_model');

			$user_email = $this->Home_model->get_user_by_email($email); //print_r($user_email);die();
			if($user_email)
			{
				$to = $user_email['email']; 
				$subject = 'Password For LyndonMarine';
				$txt = "Your Password is".$user_email['password'] ;
				$headers = "From:" .BASE_URL. "\r\n";
				
				mail($to,$subject,$txt,$headers);
				$data['message'] = 'Password send to your Email';
			}
			else
			{
				$data['message'] = 'email not exist';
			}
		}
		$this->load->view('LyndonMarine/Forgot',$data);
	}
}
