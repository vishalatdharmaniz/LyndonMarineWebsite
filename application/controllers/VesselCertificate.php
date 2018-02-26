<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselCertificate extends CI_Controller
{

    public function index($vessel_id,$offset=0)
    {
        $this->load->library('pagination');
    	$this->load->model('Certificate_model');
        $this->load->model('Vessel_model');

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
             $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data']= $vessel_data;
        $offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : $offset;
        $data['certificate_data'] = $this->Certificate_model->get_all_certificate_data_for_pagination($vessel_id,$offset);

$total_certificate = $this->Certificate_model->get_total_certificate($vessel_id);
            
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
        // var_dump($certificate_data);die();
        $data['certificate_data'] = $certificate_data[0];
        $data['certificate_id'] = $certificate_id;
        $vessel_id = $certificate_data[0]['vessel_id'];
        $data['vessel_id'] = $vessel_id; //print_r($vessel_id);die();
        $this->load->view('LyndonMarine/ViewCertificate',$data);
    }
    public function searchdata($searchname,$vessel_id,$offset=0)
    {
         $this->load->library('pagination');
        $this->load->model('Certificate_model');
        $this->load->model('Vessel_model');

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
        $data['certificate_data'] = $certificate_data;
        
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data']= $vessel_data;

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

	public function search_certificate_type($searchtype,$vessel_id)
    {
        $this->load->library('pagination');
        $this->load->model('Certificate_model');
         $this->load->model('Vessel_model');

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
        $certificate_data = $this->Certificate_model->search_by_certificate_type($searchtype,$vessel_id,$offset);

        $data['certificate_data'] = $certificate_data;

        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data']= $vessel_data;

        $total_search_certificate = $this->Certificate_model->search_total_certificate_type($searchtype,$vessel_id);

            $config['base_url'] = base_url().'index.php/VesselCertificate/search_certificate_type/'.$searchtype.'/'.$vessel_id;
            $config['total_rows'] = $total_search_certificate;
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
                    
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;
        // $vessel_id = $certificate_data[0]['vessel_id'];
        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/vessel_certificate',$data);
    }

    public function search_dropdown_status($vessel_id){
        $range = $_REQUEST['range'];
        $this->load->library('pagination');
        $this->load->model('Certificate_model');
         $this->load->model('Vessel_model');
        
        $config = array();

        $config["base_url"] = base_url() . "index.php/VesselCertificate/search_dropdown_status/$vessel_id?range=$range";
        $config['per_page'] = '10';
            $config['num_links'] = '5';
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
            $config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['reuse_query_string'] = TRUE;
            
            $page = 1;
            if($this->input->get('per_page')){
                $page = ($this->input->get('per_page')) ;
            }
            
            $uri_segment = ($page-1) * $config["per_page"]; 
            $config['uri_segment'] = $uri_segment;
            
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
            $data['vessel_data']= $vessel_data;

            $result = $this->Certificate_model->getSheetLog('','', '', '=', '', $config['per_page'], $uri_segment,null,null,null,$range,'','',$vessel_id);

            
            $abc=count($this->Certificate_model->getSheetLog('','', '', '=', '', '', '',null,null,null,$range,'','',$vessel_id));
            
            $config["total_rows"] = $abc;
            $this->pagination->initialize($config);
             $data['links'] = $this->pagination->create_links();
            $data['certificate_data'] = $result;
                    $data['vessel_id'] = $vessel_id;  
            $this->load->view('LyndonMarine/vessel_certificate',$data);
    }   
}

?>