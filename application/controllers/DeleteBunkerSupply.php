<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteBunkerSupply extends CI_Controller
{	

public function index($bunker_id,$vessel_id)
{
	$this->load->Model('BunkerSupply_model');
	$DeleteBunkerSupply=$this->BunkerSupply_model->delete_buker_supply_by_bunker_id($bunker_id);

	 $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselBunkerSupply/index/$vessel_id");
}

}