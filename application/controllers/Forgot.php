<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller
{
	public function index()
	{
		$data['message'] = '';
		$this->load->view('LyndonMarine/Forgot',$data);
	}
}
