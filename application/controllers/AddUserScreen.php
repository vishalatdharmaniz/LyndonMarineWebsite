<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddUserScreen extends CI_Controller
{

	public function index($com_id)
	{
		$message= '';
		$data['message'] = $message;
		$data['com_id'] = $com_id;

		$this->load->view('LyndonMarine/AddUser',$data);
	}


}

?>