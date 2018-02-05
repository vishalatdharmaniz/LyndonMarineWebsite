<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteCertificate extends CI_Controller
{	
	public function index($certificate_id,$vessel_id)
	{
        $this->load->model('Certificate_model');
 
        $delete_vessel = $this->Certificate_model->delete_certificate_by_certificate_id($certificate_id);
 
        //var_dump($delete_vessel);die();
        //$vessel_id = $delete_vessel[0]['vessel_id']; //print_r($vessel_id);die();
         $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselCertificate/index/$vessel_id"); 

    }

    
}
