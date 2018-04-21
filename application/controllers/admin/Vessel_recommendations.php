<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel_recommendations extends CI_Controller
 {
	public function index()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel_recommendations/index',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function add()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel_recommendations/add',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function view()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel_recommendations/view',$data);
		$this->load->view('admin/includes/footer');
	}
}
