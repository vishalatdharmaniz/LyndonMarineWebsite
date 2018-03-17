<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ViewFixture extends CI_Controller 
{

	public function index($vessel_id)
	{
		$this->load->Model('Fixture_model');
		$fixture_data=$this->Fixture_model->fixture_data_by_vessel_id($vessel_id);
	    $data['fixture_data'] = $fixture_data;
	    $data['vessel_id'] = $vessel_id;
	  
	 $this->load->view('LyndonMarine/vessel_fixture/ViewFixture',$data);

	}	
		
}
?>