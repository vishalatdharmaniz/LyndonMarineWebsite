<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller
 {
	function __construct() {
        parent::__construct();
        $this->load->model("admin/Company_model");
		  if(!array_key_exists("user",$this->session->userdata)){
				redirect('admin/user/login');
		  }
    }
	
	public function index()
	{
		if($this->input->method() == "post"){
			$request_type = $this->input->post('request_type');
			$match_values = array('status' => $request_type,'role' => 1);
		}else{
			$request_type = 1;
			$match_values = array('status' => 1,'role' => 1);
		}
		
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/company/index";
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
			
			
			$result = $this->Company_model->get_data('', $match_values, '', '=', '', $config['per_page'], $uri_segment);
			$result_total = $this->Company_model->get_data('', $match_values, '', '=', true, "", $uri_segment);
		//------------pagination code---------------
		//echo "<pre>";print_r($result);die;
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			$data['request_type'] = $request_type;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/index',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function add()
	{
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_details.email]',array(
																																							'is_unique'     => 'This %s already exists.'
																																							));
		
		if($this->input->method() == "post"){
			
			if ($this->form_validation->run() == FALSE){
				$data = array();
				$this->load->view('admin/includes/header');
				$this->load->view('admin/company/add',$data);
				$this->load->view('admin/includes/footer');	
			}else{
					$username = $this->input->post("fname");
				$organization = $this->input->post("organization");
				$address = $this->input->post("address");
				$city = $this->input->post("city");
				$country = $this->input->post("country");
				$contact_no = $this->input->post("contact_no");
				$acc_type = $this->input->post("acc_type");
				$note = $this->input->post("note");
				$email = $this->input->post("email");
				$password = $this->input->post("password");
				
				$data_to_save = array(
											 'name' => $username,
											 'username' => $username,
											 'organization' => $organization,
											 'address' => $address,
											 'city' => $city,
											 'country' => $country,
											 'telephone' => $contact_no,
											 'account_type' => $acc_type,
											 'note' => $note,
											 'email' => $email,
											 'password' => $password,
												'created' => date('Y-m-d h:i:s'),
												'role' => 1
											 );
				
				$this->Company_model->add($data_to_save);
				redirect("admin/company");	
			}
			
			
		}else{
			$data = array();
			$this->load->view('admin/includes/header');
			$this->load->view('admin/company/add',$data);
			$this->load->view('admin/includes/footer');	
		}
		
	}
	
	public function company_info()
	{
		$data = array();
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/view',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function edit($id)
	{
		if($this->input->method() == "post"){
			
			$username = $this->input->post("fname");
			$organization = $this->input->post("organization");
			$address = $this->input->post("address");
			$city = $this->input->post("city");
			$country = $this->input->post("country");
			$contact_no = $this->input->post("contact_no");
			$acc_type = $this->input->post("acc_type");
			$note = $this->input->post("note");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			
			$email_result = $this->check_email($email,$id);
			if(!$email_result){
				$data_to_save = array(
										 'name' => $username,
										 'username' => $username,
										 'organization' => $organization,
										 'address' => $address,
										 'city' => $city,
										 'country' => $country,
										 'telephone' => $contact_no,
										 'account_type' => $acc_type,
										 'note' => $note,
										 'email' => $email,
										 'password' => $password,
											'created' => date('Y-m-d h:i:s')
										 );
					
					$this->Company_model->update_company($data_to_save,$id);
					redirect("admin/company");	
			}else{
				$company_info = $this->Company_model->get_company($id);
				$data = array();
				$data['company_info'] = $company_info[0];
				$data['message'] = "Email Allready Exists";
				$this->load->view('admin/includes/header');
				$this->load->view('admin/company/edit',$data);
				$this->load->view('admin/includes/footer');
			}
			
			
		}else{
				$company_info = $this->Company_model->get_company($id);
				$data = array();
				$data['company_info'] = $company_info[0];
				$this->load->view('admin/includes/header');
				$this->load->view('admin/company/edit',$data);
				$this->load->view('admin/includes/footer');
		}
	}
		
	public function company_user($id){
		
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/company/company_user/$id";
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
			$match_values['company_id'] = $id;
			
			$result = $this->Company_model->get_data('', $match_values, '', '=', '', $config['per_page'], $uri_segment);
			//echo $this->db->last_query();die;
			$result_total = $this->Company_model->get_data('', $match_values, '', '=', true, "", $uri_segment);
		//------------pagination code---------------
		//echo "<pre>";print_r($result);die;
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			$data['id'] = $id;
		
		
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/Comapny_user',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function add_company_user($company_id){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_details.email]',array(
																																							'is_unique'     => 'This %s already exists.'
																																							));
		
		if($this->input->method() == "post"){			
			if ($this->form_validation->run() == FALSE){
            $data = array('company_id' => $company_id);
				$this->load->view('admin/includes/header');
				$this->load->view('admin/company/add_company_user',$data);
				$this->load->view('admin/includes/footer');
         }else{
				//echo "<pre>";print_r($_REQUEST);die;
					$fname = $this->input->post("fname");
					$last_name = $this->input->post("last_name");
					$job = $this->input->post("job");
					$username = $this->input->post("username");
					$email = $this->input->post("email");
					$password = $this->input->post("password");
					$role = $this->input->post("role");
					$data = array(
									  "first_name" => $fname,
									  "last_name" => $last_name,
									  "username" => $username,
									  "email" => $email,
									  "password" => $password,
									  "role" => $role,
									  "company_id" => $company_id,
									  "job_desc" => $job,
									  );
					$this->Company_model->save($data);
					redirect("admin/company/company_user/$company_id");
         }
		}else{
				$data = array('company_id' => $company_id);
				$this->load->view('admin/includes/header');
				$this->load->view('admin/company/add_company_user',$data);
				$this->load->view('admin/includes/footer');	
		}
		
	}
	
	public function edit_company_user($user_id){
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'required');
		
		$this->form_validation->set_rules('username', 'User Name', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_details.email]',array(
			//																																				'is_unique'     => 'This %s already exists.'
				///																																			));
		
		if($this->input->method() == "post"){
			
			if ($this->form_validation->run() == FALSE){
            //$data = array('company_id' => $company_id);
				$result = $this->Company_model->get_company($user_id);
				if(!empty($result)){
					$data = array('result' => $result[0]);	
				}else{
					$data = array('result' => array());
				}
				$this->load->view('admin/includes/header');
				$this->load->view('admin/company/edit_company_user',$data);
				$this->load->view('admin/includes/footer');
         }else{
			$result = $this->Company_model->get_company($user_id);
			$company_id = $result[0]['company_id'];
					$fname = $this->input->post("fname");
					$last_name = $this->input->post("last_name");
					$job = $this->input->post("job");
					$username = $this->input->post("username");
					$email = $this->input->post("email");
					$password = $this->input->post("password");
					$role = $this->input->post("role");
					
					$result_of_email = $this->check_email($email,$user_id);
					if(!$result_of_email){
							$data = array(
											  "first_name" => $fname,
											  "last_name" => $last_name,
											  "username" => $username,
											  "email" => $email,
											  "password" => $password,
											  "role" => $role,
											  //"company_id" => $company_id,
											  "job_desc" => $job,
											  );
							$this->Company_model->update_company_user($data,$user_id);
							redirect("admin/company/company_user/$company_id");
					}else{
						
						$result = $this->Company_model->get_company($user_id);
						if(!empty($result)){
							$data = array('result' => $result[0],'message' => "Email Allready exists");	
						}else{
							$data = array('result' => array());
						}
						$this->load->view('admin/includes/header');
						$this->load->view('admin/company/edit_company_user',$data);
						$this->load->view('admin/includes/footer');
					}
			}
		}else{
			$result = $this->Company_model->get_company($user_id);
			if(!empty($result)){
				$data = array('result' => $result[0]);	
			}else{
				$data = array('result' => array());
			}
			
			$this->load->view('admin/includes/header');
			$this->load->view('admin/company/edit_company_user',$data);
			$this->load->view('admin/includes/footer');	
		}
		
		
	}
	
	public function company_vessel($company_id){
		
		$vessel_id_data = $this->Company_model->get_vessel_ids($company_id);
		$vessel_ids = array();
		if(!empty($vessel_id_data)){
			foreach($vessel_id_data as $key => $value){
				$vessel_ids[] = $value['vessel_id'];
			}
		}
		
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/company/company_vessel/$company_id";
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
			
			$result = $this->Company_model->get_vessel_data('', '', '', '=', '', $config['per_page'], $uri_segment,'','',$vessel_ids);
			//echo $this->db->last_query();die;
			$result_total = $this->Company_model->get_vessel_data('', '', '', '=', true, "", $uri_segment,'','',$vessel_ids);
		//------------pagination code---------------
		
		
		
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/company_vessel',$data);
		$this->load->view('admin/includes/footer');
	}
	
	
	public function delete($company_id){
		$this->Company_model->delete_record($company_id);
		redirect("admin/company");
	}
	
	
	public function new_request(){
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/company/new_request";
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
			$match_values = array('status' => 0,'role' => 1);
			
			$result = $this->Company_model->get_data('', $match_values, '', '=', '', $config['per_page'], $uri_segment);
			//echo $this->db->last_query();die;
			$result_total = $this->Company_model->get_data('', $match_values, '', '=', true, "", $uri_segment);
		//------------pagination code---------------
		//echo "<pre>";print_r($result);die;
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			//echo "<pre>";print_r($result);die;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/new_request',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function accept_request($id){
		$status = 1;
		$this->Company_model->process_request($id,$status);
		redirect("admin/company");
	}
	
	public function reject_request($id){
		$status = 2;
		$this->Company_model->process_request($id,$status);
		redirect("admin/company");
	}
	
	public function admin_data(){
		$search_kw = $_REQUEST['search'];
		$result = $this->Company_model->get_all_data($search_kw);
		$custome_arry = array();
		if(!empty($result)){
			foreach($result as $key => $value){
				$custome_arry[] = array('id' => $value['id'],'org_name' =>$value['organization'], 'code' => $value['organization']."--".$value['email']);
			}
		}
		echo json_encode($custome_arry);die;
	}
	
	
	public function search()
	{
		$search = $_REQUEST['search'];
		
		//$match_values = array('status' => 1,'role' => 1);
		$match_values = array('organization' => $search,'name' => $search);
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/company/search?search=$search";
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
			
			// status 1 mens accpted and role 1 mns company
			$and_value = array('status' => 1,'role' => 1);
			$result = $this->Company_model->get_data('', $match_values, '', 'like', '', $config['per_page'], $uri_segment,'','',$and_value);
			
			$result_total = $this->Company_model->get_data('', $match_values, '', 'like', true, "", $uri_segment,"","",$and_value);
			//echo $this->db->last_query();die;
		//------------pagination code---------------
		//echo "<pre>";print_r($result);die;
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			$request_type = 1;// accepted
			$data['request_type'] = $request_type;
			$data['search_kw'] = $search;
			//print_r($data);die;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/index',$data);
		$this->load->view('admin/includes/footer');
	}
	
	public function search_user($company_id)
	{
		
		$search = $_REQUEST['search'];
		
		//$match_values = array('status' => 1,'role' => 1);
		$match_values = array('first_name' => $search,'username' => $search);
		$and_match_value = array('company_id' => $company_id);
		$this->load->library('pagination');
		//-------------pagination code-------------
			$config = array();
			$config["base_url"] = base_url() . "index.php/admin/company/search_user/$company_id?search=$search";
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
			
			// status 1 mens accpted and role 1 mns company
			$in_value = array(2, 3,4);
			$result = $this->Company_model->search_company_user('', $match_values, '', 'like', '', $config['per_page'], $uri_segment,'','',$and_match_value,$in_value);
				//echo $this->db->last_query();die;
			$result_total = $this->Company_model->search_company_user('', $match_values, '', 'like', true, "", $uri_segment,"","",$and_match_value,$in_value);
			//echo $this->db->last_query();die;
		//------------pagination code---------------
		//echo "<pre>";print_r($result);die;
		$data = array();
		$config["total_rows"] = $result_total[0]['total'];
			$this->pagination->initialize($config);
			$data['result'] = $result;
			$request_type = 1;// accepted
			$data['request_type'] = $request_type;
			$data['id'] = $company_id;
			$data['search_kw'] = $search;
		$this->load->view('admin/includes/header');
		$this->load->view('admin/company/Comapny_user',$data);
		$this->load->view('admin/includes/footer');
	}
	public function check_email($email,$id){
		$result = $this->Company_model->check_email($email,$id);
		//echo $this->db->last_query();die;
		if(!empty($result)){
			return true;
		}else{
			return false;
		}
	}
	
}
