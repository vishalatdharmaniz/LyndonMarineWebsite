<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteVessel extends CI_Controller
{	
	public function index($vessel_id)
	{
        $this->load->model('Vessel_model');
        $user_id = $this->session->userdata('user_id'); //print_r($user_id);
        $delet_vessel = $this->Vessel_model->delete_vessel_by_vessel_id($vessel_id,$user_id);
        
        //var_dump($delet_vessel);die();
         $base_url = BASE_URL;
                header("Location: $base_url/index.php/AllVessels/user_vessel/$user_id"); 

    }

    
}
