<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Controller 
{
	public function index($vessel_record_id = 0, $message = NULL)
	{
		$data['message'] = $message;
		$data['vessel_record_id'] = $vessel_record_id;
		$login = $this->session->userdata('user_id') || $this->session->userdata('email');
		if ($login == TRUE && $vessel_record_id == 0)
		{
			$base_url = BASE_URL;
            header("Location: $base_url/index.php/AllVessels/index");
		}
		elseif($login == TRUE && $vessel_record_id != 0)
		{
			$base_url = BASE_URL;
            header("Location: $base_url/index.php/SingleVessel/index/$vessel_record_id");
		}
		else
		{
			$base_url = BASE_URL;
                    header("Location: $base_url/index.php/Home/index");
		}
	}
}
