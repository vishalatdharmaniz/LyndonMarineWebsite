<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_fixture extends CI_Controller 
{
   
	public function index($id)
	{  
		$this->load->model('Fixture_model');
		$fixture_data=$this->Fixture_model->fixture_data_by_fixture_id($id);	 echo $fixture_data; die(); 
		$vessel_id=$fixture_data[0]['vessel_id']; 
		$data['fixture_data'] = $fixture_data;
	    $data['vessel_id'] = $vessel_id;
	  
	 $this->load->view('LyndonMarine/vessel_fixture/ViewFixture',$data);

	}	
		
}
?>