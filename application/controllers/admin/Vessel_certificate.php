<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel_certificate extends CI_Controller
 {
	public function index()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel_certificate/index',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function add()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel_certificate/add',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function view()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel_certificate/view',$data);
		$this->load->view('admin/includes/footer');
	}
}
