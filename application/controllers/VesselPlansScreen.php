<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselPlansScreen extends CI_Controller
{

	public function index()
	{

		$message= '';
		$data['message']= $message;
		$this->load->view('LyndonMarine/VesselPlans');
	}


}

?>