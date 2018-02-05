<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselPlans extends CI_Controller
{
	/*
    public function index()
    {
    	$this->load->model('Plans_model');
    	$vessel_plans = $this->Plans_model->get_all_vessel_plan_details();
    	//var_dump($certificate_data);
    	$data['vessel_plans'] = $vessel_plans;
        $this->load->view('LyndonMarine/VesselPlans',$data);
    } */

    public function index($vessel_id)
    {
    	$this->load->model('Plans_model');
    	$vessel_plans = $this->Plans_model->get_plans_details_by_vessel_id($vessel_id);
    	//var_dump($vessel_plans);
    	$data['vessel_plans'] = $vessel_plans;
    	$data['vessel_id'] = $vessel_id;

        $this->load->view('LyndonMarine/VesselPlans',$data);
    }


}

?>