<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddVesselScreen extends CI_Controller
{

	public function index()
	{
		$message= '';
		$data['message']= $message;
		$this->load->view('LyndonMarine/add_vessel_screen');
	}


}

?>