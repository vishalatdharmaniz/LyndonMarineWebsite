<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class vessel_fixture extends CI_Controller
 {
	public function index($vessel_id)
	{
		
		$this->load->library('pagination');
		$this->load->model('fixture_model');
		$config = array();

		$config["base_url"] = base_url() . "index.php/vessel_fixture/index/$vessel_id";
		$config['per_page'] = '10';
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
			$match_values = array('vessel_id' => $vessel_id);
			
			$result = $this->fixture_model->get_data('', $match_values, '', '=', '', $config['per_page'], $uri_segment);
			$abc=$this->fixture_model->total($vessel_id);
			$config["total_rows"] = $abc;
			
			$this->pagination->initialize($config);
			$data['all_fixture'] = $result;
			
			$vesse_name_res = $this->fixture_model->get_vessel_name($vessel_id);
			if(!empty($vesse_name_res)){
				$vesse_name = $vesse_name_res[0]['vessel_name'];
			}else{
				$vesse_name = "";
			}
			
			$data['vessel_id'] =$vessel_id;
			$data['vessel_name'] =$vesse_name;
		$this->load->view('LyndonMarine/vessel_fixture/index',$data);
	}
	
	
	
}
