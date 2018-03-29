<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselSoa extends CI_Controller
{
        
	public function index($vessel_id,$offset=0)
	{
		$this->load->library('pagination');
	 $this->load->model('Soa_model');
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

          $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
        
           $soa_data = $this->Soa_model->get_soa_details_by_vessel_id($vessel_id);
           $data['soa_data'] = $this->Soa_model->get_all_soa_data_for_pagination($vessel_id,$offset);

            $total_soa = $this->Soa_model->get_total_soa($vessel_id);
            
                $this->load->model('Vessel_model');
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
            $data['vessel_data'] = $vessel_data;
            
                $config['base_url'] = base_url().'index.php/VesselSoa/index/'.$vessel_id;
                    $config['total_rows'] = $total_soa; 
                    $config['per_page'] = 8;
                    $config['uri_segment'] = 4;
                    
                    $this->pagination->initialize($config);
                    
                    $data['links'] = $this->pagination->create_links();

                    $data['offset'] = $offset;

	 $data['soa_data']=$soa_data ;
	 $data['vessel_id']=$vessel_id ;
	 $this->load->view('LyndonMarine/VesselSoa',$data);

	}
	public function AddSoaScreen($vessel_id)
	{
		$message= '';
		$data['message']= $message;
		$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/AddSoa',$data); 
	}
	
	public function ViewSoa($soa_id)
	{
       $this->load->model('Soa_model');
	 $soa_data=$this->Soa_model->get_soa_details_by_soa_id($soa_id);
	 $data['soa_data']=$soa_data;
	 $vessel_id=$soa_data[0]['vessel_id'];
	 $data['vessel_id']=$vessel_id;
	 $this->load->view('LyndonMarine/ViewSoa',$data);

	}
}
?>