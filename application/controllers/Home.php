<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	
	public function index()
	{
		/*
		$this->load->view('LyndonMarine/header');
		$this->load->view('LyndonMarine/index');
		$this->load->view('LyndonMarine/footer');
	*/
		
		$message= '';
		$data['message']= $message;
		$this->load->view('LyndonMarine/home',$data);

	}
	
}
