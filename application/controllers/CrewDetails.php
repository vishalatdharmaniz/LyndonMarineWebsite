<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrewDetails extends CI_Controller
{
	public function index($vessel_id,$offset=0)
	{
        $this->load->library('pagination');
	 $this->load->model('CrewDetails_model');
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

      $offset = ($this->uri->segment(5)) ? $this->uri->segment(5) : $offset;
        
       $crew_data = $this->CrewDetails_model->get_crew_details_by_vessel_id($vessel_id);
       $crew_data = $this->CrewDetails_model->get_all_crew_data_for_pagination($vessel_id,$offset);

       $total_crew = $this->CrewDetails_model->get_total_crew($vessel_id);
        $this->load->model('Vessel_model');
        $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
        $data['vessel_data'] = $vessel_data;

        $config['base_url'] = base_url().'index.php/CrewDetails/index/'.$vessel_id;
        $config['total_rows'] = $total_crew; 
        $config['per_page'] = 10;
        $config['uri_segment'] = 5;
                    
        $this->pagination->initialize($config);
            
        $data['links'] = $this->pagination->create_links();

        $data['offset'] = $offset;

	 $data['crew_data']=$crew_data ;
	 $data['vessel_id']=$vessel_id ;
	 $this->load->view('LyndonMarine/CrewDetails',$data);

	}

	public function AddCrewDetailsScreen($vessel_id)
	{
		$message= '';
		$data['message']= $message;
		$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/AddCrewDetails',$data); 
	}
    public function EditCrew($crew_id)
    {
        $this->load->model('CrewDetails_model');
        $crew_details=$this->CrewDetails_model->get_crew_details_by_crew_id($crew_id);
        $data['crew_details']=$crew_details;
        $vessel_id=$crew_details[0]['vessel_id'];
        $data['vessel_id']= $vessel_id;
        $this->load->view('LyndonMarine/EditCrewDetails',$data);
    }

	public function view_crew_details($crew_id)
	{
		$this->load->model('CrewDetails_model');
		$crew_details=$this->CrewDetails_model->get_crew_details_by_crew_id($crew_id);
		$data['crew_details']=$crew_details;
		$vessel_id=$crew_details[0]['vessel_id'] ; 
		$data['vessel_id'] = $vessel_id;
        $this->load->view('LyndonMarine/ViewCrewDetails',$data);
	}

	public function mail_crew_details($vessel_id)
	{
		$this->load->model('CrewDetails_model');
		$crew_data=$this->CrewDetails_model->get_crew_details_by_vessel_id($vessel_id);

	}
	public function searchdata($searchname,$vessel_id,$offset=0)
    {
         $this->load->library('pagination');
        $this->load->model('CrewDetails_model');

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
        $crew_data= $this->CrewDetails_model->searchtable($searchname,$vessel_id,$offset); 
        $data['crew_data'] = $crew_data; 
       
        $vessel_data = $this->CrewDetails_model->get_vessel_details_by_vessel_id($vessel_id);
        $data['vessel_data']= $vessel_data;

        $total_search_crew_supply = $this->CrewDetails_model->searchtable_total($searchname,$vessel_id);
     
            $config['base_url'] = base_url().'index.php/CrewDetails/searchdata/'.$searchname.'/'.$vessel_id;
            $config['total_rows'] = $total_search_crew_supply;
            $config['per_page'] = 10;
            $config['uri_segment'] = 5;
                    
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();

            $data['offset'] = $offset;

        // $vessel_id = $certificate_data['vessel_id'];
        $data['vessel_id'] = $vessel_id;  
        $this->load->view('LyndonMarine/CrewDetails',$data);
	 
	
  }
}
?>