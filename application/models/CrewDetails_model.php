<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CrewDetails_model extends CI_Model
{  
	function add_crew_Details($data)
	{
		$this->db->insert('crew_details',$data);

		return true;
	}

	function get_crew_details_by_vessel_id($vessel_id)
	{
		$crew_data = $this->db->query("SELECT * FROM crew_details WHERE vessel_id='$vessel_id'");
		return $crew_data->result_array();
	}

    function get_crew_details_by_crew_id($crew_id)
	{
		$crew_details_data = $this->db->query("SELECT * FROM crew_details WHERE crew_id='$crew_id'");
		return $crew_details_data->result_array();
	}

	function get_vessel_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}

}
?>
