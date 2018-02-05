<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckImoExistence extends CI_Controller 
{
	public function index()
	{
        $imo_number = $this->input->post('imo_number');

        $this->load->model('AddVessel_model');
        $imo_already_exists = $this->AddVessel_model->check_imo_number_existence($imo_number);
    
        echo $imo_already_exists;
	}
}
