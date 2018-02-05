<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselCertificate extends CI_Controller
{

    /*public function index()
    {

    	$this->load->model('Certificate_model');
    	$certificate_data = $this->Certificate_model->get_all_certificate_details();
    	//var_dump($certificate_data);
    	$data['certificate_data'] = $certificate_data;
        $this->load->view('LyndonMarine/vessel_certificate',$data);
    }*/

    public function index($vessel_id)
    {
    	$this->load->model('Certificate_model');
    	$certificate_data = $this->Certificate_model->get_certificate_details_by_vessel_id($vessel_id);
    	//var_dump($certificate_data);
    	$data['certificate_data'] = $certificate_data;
        
        $data['vessel_id'] = $vessel_id;
    	$this->load->view('LyndonMarine/vessel_certificate',$data);
    }

    public function edit_certificate($certificate_id)
    {
        $this->load->model('Certificate_model');
        $certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);
        //var_dump($certificate_data);die();
        $data['certificate_data'] = $certificate_data[0];
        $data['certificate_id'] = $certificate_id;
        $this->load->view('LyndonMarine/EditCertificate',$data);
    }
    public function view_certificate($certificate_id)
    {
        $this->load->model('Certificate_model');
        $certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);
        //var_dump($certificate_data);die();
        $data['certificate_data'] = $certificate_data[0];
        $data['certificate_id'] = $certificate_id;
        $this->load->view('LyndonMarine/ViewCertificate',$data);
    }
    public function searchdata($searchname,$vessel_id)
    {
        $this->load->model('Certificate_model');
        $certificate_data = $this->Certificate_model->searchtable($searchname,$vessel_id);
        $data['certificate_data'] = $certificate_data;
        $vessel_id = $certificate_data[0]['vessel_id'];
        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/vessel_certificate',$data);
    }
}

?>