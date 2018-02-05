<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{

	public function index()
	{
        $message = '';
        $data['message'] = $message;
        $this->load->view('LyndonMarine/home',$data);
        /*
		$login_parameters = array(
                        'email' => NULL,
                        'password' => NULL
                        );

                    $this->session->set_userdata($login_parameters);
            
                    $base_url = BASE_URL;
                    header("Location: $base_url/index.php/Home/index"); */

	}
}
