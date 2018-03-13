<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewBunkerSupply extends CI_Controller 
{

	public function index($vessel_id)
	{
		$this->load->Model('BunkerSupply_model');
		$bunker_data=$this->BunkerSupply_model->get_bunker_supply_details_by_vessel_id($vessel_id);
	    $data['bunker_data'] = $bunker_data;
	    $data['vessel_id'] = $vessel_id;
	  
	 $this->load->view('LyndonMarine/ViewBunkerSupply',$data);

	}	
		
}
?>