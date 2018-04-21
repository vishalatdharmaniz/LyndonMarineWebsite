<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internal_news extends CI_Controller
 {
	 function __construct() {
        parent::__construct();
        $this->load->model("admin/User_model");
		  
    }
	 
	 public function check_login(){
		if(!array_key_exists("user",$this->session->userdata)){
			redirect('admin/user/login');
		  }
	 }
	 
	public function index()
	{
		$this->check_login();
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/Internal_news/index";
			$config['per_page'] = '8';
         $config['num_links'] = '5';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['prev_link'] = 'prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['reuse_query_string'] = TRUE;
			
			$page = 1;
			if($this->input->get('per_page')){
                $page = ($this->input->get('per_page')) ;
            }
			
            $uri_segment = ($page-1) * $config["per_page"];
			$config['uri_segment'] = $uri_segment;
			
			$result = $this->User_model->get_data('', '', '', '=', '', $config['per_page'], $uri_segment);
			$result_total = $this->User_model->get_data('', '', '', '=', true, "", $uri_segment);
		//------------pagination code---------------
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/user/Internal_news',$data);
		$this->load->view('admin/includes/footer');
	}
	public function edit($id)
	{
		$this->check_login();
		$result = $this->User_model->get_user($id);
		if(!empty($result)){
			$data = array();
		$data['result'] = $result[0];
		$this->load->view('admin/includes/header');
		$this->load->view('admin/user/edit',$data);
		$this->load->view('admin/includes/footer');	
		}else{
			redirect('admin/user/index');
		}
		
	}
	
	public function logout(){
		//$this->session->set_userdata('user_id', FALSE);
		$this->session->sess_destroy();
		$data = array();
		redirect('admin/user/login');
	}
	
	public function login()
	{
		//echo "<pre>";print_r($this->session->userdata);die;
		if($this->input->method() == "post"){
			$username = $this->input->post("username");
			$password = $this->input->post("password");
				$res = $this->User_model->login($username,$password);
				if(!empty($res)){
					//echo "<pre>";print_r($this->session->userdata);die;
					$this->session->set_userdata('user', $res[0]);
					//echo $this->session->userdata('user[userusername');die;
					redirect('admin/user/index');
				}else{
					$data = array('error' => "Username Or Password Is Wrong");
					$this->load->view('admin/user/login',$data);
				}
		}else{
			$data = array();
			$this->load->view('admin/user/login',$data);	
		}
		
	}
	
}
