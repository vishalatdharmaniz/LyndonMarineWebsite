<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrewDetails extends CI_Controller
{
	public function index($vessel_id)
	{
	 $this->load->model('CrewDetails_model');
	 $crew_data=$this->CrewDetails_model->get_crew_details_by_vessel_id($vessel_id);
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

	/*public function view_crew_details($crew_id)
	{
		$this->load->model('CrewDetails_model');
		$crew_details=$this->CrewDetails_model->get_crew_details_by_crew_id($crew_id);
		$data['crew_details']=$crew_details;
		$vessel_id=$crew_details[0]['vessel_id'] ; 
		$data['vessel_id'] = $vessel_id;
        $this->load->view('LyndonMarine/ViewCertificate',$data);
	}
	*/
}
?>