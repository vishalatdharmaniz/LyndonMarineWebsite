<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewBunkerSupply extends CI_Controller 
{

	public function index($bunker_id)
	{
		$this->load->Model('BunkerSupply_model');
		$bunker_data=$this->BunkerSupply_model->get_bunker_supply_data($bunker_id);
	    $data['bunker_data'] = $bunker_data;
	    $vessel_id=$bunker_data[0]['vessel_id'];
	    $data['vessel_id'] = $vessel_id;
	    $data['bunker_id'] = $bunker_id;
	  
	 $this->load->view('LyndonMarine/ViewBunkerSupply',$data);

	}	
		
}
?>