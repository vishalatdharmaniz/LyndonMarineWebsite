<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteCrew extends CI_Controller
{	
	public function index($crew_id,$vessel_id)
	{
        $this->load->model('CrewDetails_model');
 
        $delete_crew = $this->CrewDetails_model->delete_crew_by_crew_id($crew_id);
         $base_url = BASE_URL;
                header("Location: $base_url/index.php/CrewDetails/index/$vessel_id"); 

    }

    
}
