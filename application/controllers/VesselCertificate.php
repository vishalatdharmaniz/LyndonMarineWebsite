<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselCertificate extends CI_Controller
{

    public function index($vessel_id,$offset=0)
    {
        $this->load->library('pagination');
    	$this->load->model('Certificate_model');
    $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            
            
            
        $certificate_data = $this->Certificate_model->get_certificate_details_by_vessel_id($vessel_id);
 
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
        $data['certificate_data'] = $this->Certificate_model->get_all_certificate_data_for_pagination($vessel_id,$offset);

$total_certificate = $this->Certificate_model->get_total_certificate($vessel_id);
    
                    $this->load->library('pagination');
            
                    $config['base_url'] = base_url().'index.php/VesselCertificate/index/'.$vessel_id;
                    $config['total_rows'] = $total_certificate;
                    $config['per_page'] = 10;
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
    public function searchdata($searchname,$vessel_id,$offset=0)
    {
         $this->load->library('pagination');
        $this->load->model('Certificate_model');

        $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['prev_link'] = 'prev';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = 'Next';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            
           $offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
        $certificate_data = $this->Certificate_model->searchtable($searchname,$vessel_id,$offset);
        // print_r($certificate_data);die();
        $data['certificate_data'] = $certificate_data;

        $total_search_certificate = $this->Certificate_model->searchtable_total($searchname,$vessel_id);

            $config['base_url'] = base_url().'index.php/VesselCertificate/searchdata/'.$searchname.'/'.$vessel_id;
            $config['total_rows'] = $total_search_certificate;
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
                    
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;

        // $vessel_id = $certificate_data['vessel_id'];
        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/vessel_certificate',$data);
    }


}

?>