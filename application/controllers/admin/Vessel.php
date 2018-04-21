<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel extends CI_Controller
 {
	function __construct() {
        parent::__construct();
        $this->load->model("admin/Vessel_model");
		  if(!array_key_exists("user",$this->session->userdata)){
				redirect('admin/user/login');
		  }
    }
	
	public function index()
	{
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/Vessel/index";
			$config['per_page'] = '12';
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
			
			$result = $this->Vessel_model->get_data('', '', '', '=', '', $config['per_page'], $uri_segment);
			$result_total = $this->Vessel_model->get_data('', '', '', '=', true, "", $uri_segment);
		//------------pagination code---------------
		
		$all_company_data = $this->Vessel_model->get_all_company();
		$all_company = array();
		if(!empty($all_company_data)){
			foreach($all_company_data as $key => $value){
				$all_company[$value['id']] = $value['organization'];
			}
		}
		
		$all_company_relation_data = $this->Vessel_model->get_all_company_relation();
		
		//echo "<pre>";print_r($all_company_relation_data);die;
		
		$assined_companies = array();
		if(!empty($all_company_relation_data)){
			foreach($all_company_relation_data as $c_key => $c_value){
				
				if(array_key_exists($c_value['vessel_id'],$assined_companies)){
					$assined_companies[$c_value['vessel_id']][$c_value['company_id']] = $c_value['company_id'];	
				}else{
					$assined_companies[$c_value['vessel_id']][$c_value['company_id']] = $c_value['company_id'];	
				}
			}
		}
		
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			$data['all_company'] = $all_company;
			$data['assined_companies'] = $assined_companies;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel/index',$data);
		$this->load->view('admin/includes/footer');
	}
	public function edit()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel/edit',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function add()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel/add',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function view($id)
	{
		$vessel_info = $this->Vessel_model->get_vessel($id);
		if(!empty($vessel_info)){
			$vessel_data = $vessel_info[0];
		}else{
			$vessel_data = array();
		}
		//echo "<pre>";print_r($vessel_data);die;
		$data = array('vessel_data' => $vessel_data);
		$this->load->view('admin/includes/header');
		$this->load->view('admin/vessel/view',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function add_vessel_to_company(){
		$vessel_id = $this->input->post("vessel_id");
		$company_id = $this->input->post("company");
		$search_kw = $this->input->post("search_kw");
		$company_res = $this->Vessel_model->check_company($search_kw,$company_id);
		if(!empty($company_res)){
			$this->Vessel_model->update_status($vessel_id);
			$result = $this->Vessel_model->check_status($vessel_id,$company_id);
			
			if(empty($result)){
				$this->Vessel_model->add_relation($vessel_id,$company_id);	
			}
			
			redirect("admin/Vessel");
		}else{
				redirect("admin/Vessel");
		}
	}
	
}
