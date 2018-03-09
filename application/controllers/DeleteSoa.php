<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteSoa extends CI_Controller
{	

public function index($soa_id,$vessel_id)
{
	$this->load->Model('Soa_model');
	$DeleteSoa=$this->Soa_model->delete_soa_details($soa_id);

	 $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselSoa/index/$vessel_id");
}

}