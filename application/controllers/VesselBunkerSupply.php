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

}
?>