<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddPlansScreen extends CI_Controller
{

	public function index($vessel_id)
	{

		$message= '';
		$data['message']= $message;
		$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/AddPlans',$data);
	}


}

?>