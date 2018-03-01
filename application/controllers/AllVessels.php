<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AllVessels extends CI_Controller
{
	public function __construct() {
 
       parent:: __construct();
 
       $this->load->helper("url");
 
       $this->load->model("Pagination_model");
 
       $this->load->library("pagination");
 
   }

	public function index()
	{
		$this->load->model('Home_model');
		$this->load->model('Vessel_model');
		$user_id = $this->session->userdata('user_id');
$role_value= $this->Home_model->get_role_by_user_id($user_id); 
		$all_vessels = $this->Vessel_model->get_all_vessel_details();
		

		$data['role'] = $role_value[0]['role']; 
		$data['all_vessels'] = $all_vessels;
		//print_r($all_vessels);
		$this->load->view('LyndonMarine/all_vessel',$data);
	}

	public function user_vessel($user_id)
	{
		$this->load->model('Home_model');
		$this->load->model('Vessel_model');

		$role_value= $this->Home_model->get_role_by_user_id($user_id); 
		$all_vessels = $this->Vessel_model->get_vessel_data_by_userid($user_id);
	
		$data['role'] = $role_value[0]['role']; 
		
		$config = array();

       $config["base_url"] = base_url() . "index.php/AllVessels/user_vessel/$user_id";
       $config["total_rows"] = $this->Pagination_model->record_count($user_id); //print_r($config["total_rows"]);die();

       $config["per_page"] = 2;
 
       $config["uri_segment"] = 2;
 		$choice = $config["total_rows"] / $config["per_page"];
    	$config["num_links"] = round($choice);

$config['full_tag_open'] = '<ul class="pagination">';
	$config['full_tag_close'] = '</ul><!--pagination-->';
	$config['first_link'] = '&laquo; First';
	$config['first_tag_open'] = '<li class="prev page">';
	$config['first_tag_close'] = '</li>' . "\n";
	$config['last_link'] = 'Last &raquo;';
	$config['last_tag_open'] = '<li class="next page">';
	$config['last_tag_close'] = '</li>' . "\n";
	$config['next_link'] = 'Next &rarr;';
	$config['next_tag_open'] = '<li class="next page">';
	$config['next_tag_close'] = '</li>' . "\n";
	$config['prev_link'] = '&larr; Previous';
	$config['prev_tag_open'] = '<li class="prev page">';
	$config['prev_tag_close'] = '</li>' . "\n";
	$config['cur_tag_open'] = '<li class="active"><a href="">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="page">';
	$config['num_tag_close'] = '</li>' . "\n";
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
 
       $data["results"] = $this->Pagination_model->fetch_vessels($config["per_page"], $page);
 //print_r($data["results"]);die();
       $data["links"] = $this->pagination->create_links();

			
		$data['all_vessels'] = $all_vessels;

		$this->load->view('LyndonMarine/all_vessel',$data);
	}

	function edit_vessel($vessel_id)
	{
		$this->load->model('Vessel_model');
	 $user_id = $this->session->userdata('user_id');
		$vessel_details = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$data['vessel_details'] = $vessel_details;

		$this->load->view('LyndonMarine/EditVessel',$data);
	}
	function view_vessel($vessel_id)
	{
		$this->load->model('Vessel_model');
	 $user_id = $this->session->userdata('user_id');
		$vessel_details = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$data['vessel_details'] = $vessel_details;

		$this->load->view('LyndonMarine/ViewVessel',$data);
	}

	function view_fullvessel($vessel_id)
	{
		$this->load->model('Vessel_model');
	 $user_id = $this->session->userdata('user_id');
		$vessel_details = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$data['vessel_details'] = $vessel_details;

		$this->load->view('LyndonMarine/ViewFullVessels',$data);
	}
	public function searchdata($searchname)
	{
		$this->load->model('Home_model');
		$this->load->model('Vessel_model');
		$user_id = $this->session->userdata('user_id');
		$role_value= $this->Home_model->get_role_by_user_id($user_id); 
		$all_vessels = $this->Vessel_model->search_vessel($searchname,$user_id);
		

		$data['role'] = $role_value[0]['role']; 
		$data['user_id'] = $user_id; print_r($data['user_id']);
		$data['all_vessels'] = $all_vessels;
		// print_r($all_vessels);die();
		$this->load->view('LyndonMarine/all_vessel',$data);
	}
}
