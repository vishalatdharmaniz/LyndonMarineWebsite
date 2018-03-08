<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselSoa extends CI_Controller
{
	public function index($vessel_id)
	{
	 $this->load->model('Soa_model');
	 $soa_data=$this->Soa_model->get_soa_details_by_vessel_id($vessel_id);
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