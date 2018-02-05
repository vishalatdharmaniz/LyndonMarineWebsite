<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plans_model extends CI_Model
{	
	
	function add_vessel_plan($data)
	{
		$this->db->insert('plans',$data);

		return true;
	}
	
	function get_vessel_plan_data($plans_id)
	{
		var_dump($plans_id);
		$get_vessel_plan_data = $this->db->query("SELECT * FROM plans WHERE plans_id='$plans_id'");
		return $get_vessel_plan_data->result_array();
	}

	function get_all_vessel_plan_details()
	{
		$get_all_vessel_plan_details = $this->db->query("SELECT * FROM plans");
		return $get_all_vessel_plan_details->result_array();
	}

	function get_plans_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM plans WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}
}

?>