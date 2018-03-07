<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselBunkerSupply extends CI_Controller 
{

	public function index($vessel_id)
	{
		$this->load->model('BunkerSupply_model');
    	$bunker_supply_data = $this->BunkerSupply_model->get_bunker_supply_details_by_vessel_id($vessel_id);
    	$data['bunker_supply_data'] = $bunker_supply_data;
    	$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/BunkerSupply',$data);
	}

	public function searchdata($searchname,$vessel_id,$offset=0)
    {
         $this->load->library('pagination');
        $this->load->model('BunkerSupply_model');

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
            
           $offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $bunker_supply_data = $this->BunkerSupply_model->searchtable($searchname,$vessel_id,$offset); 
        $data['bunker_supply_data'] = $bunker_supply_data; 
       
        $vessel_data = $this->BunkerSupply_model->get_vessel_details_by_vessel_id($vessel_id);
        $data['vessel_data']= $vessel_data;

        $total_search_bunker_supply = $this->BunkerSupply_model->searchtable_total($searchname,$vessel_id);
     
            $config['base_url'] = base_url().'index.php/VesselBunkerSupply/searchdata/'.$searchname.'/'.$vessel_id;
            $config['total_rows'] = $total_search_bunker_supply;
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
                    
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;

        // $vessel_id = $certificate_data['vessel_id'];
        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/BunkerSupply',$data);
	 
	
  }
/*public function view_bunker_invoice()*/

}
?>