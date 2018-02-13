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

    public function index($vessel_id,$offset=0)
    {
    	$this->load->model('Certificate_model');

        $certificate_data = $this->Certificate_model->get_certificate_details_by_vessel_id($vessel_id);
 
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
        $data['certificate_data'] = $this->Certificate_model->get_all_certificate_data_for_pagination($vessel_id,$offset);

$total_certificate = $this->Certificate_model->get_total_certificate($vessel_id);
    
                    $this->load->library('pagination');
            
                    $config['base_url'] = base_url().'index.php/VesselCertificate/index/'.$vessel_id;
                    $config['total_rows'] = $total_certificate;
                    $config['per_page'] = 6;
                    $config['uri_segment'] = 4;
                    
                    $this->pagination->initialize($config);
                    
                    $data['links'] = $this->pagination->create_links();
                    $data['offset'] = $offset;
                    // $data['certificate_data'] = $total_certificate;
    	// $data['certificate_data'] = $certificate_data;
        
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