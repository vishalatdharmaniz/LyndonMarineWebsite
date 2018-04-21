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
		// var_dump($plans_id);
		$get_vessel_plan_data = $this->db->query("SELECT * FROM plans WHERE plan_id='$plans_id'");
		return $get_vessel_plan_data->result_array();
	}

	function get_all_vessel_plan_details()
	{
		$get_all_vessel_plan_details = $this->db->query("SELECT * FROM plans");
		return $get_all_vessel_plan_details->result_array();
	}

	function get_plans_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM plans WHERE vessel_id='$vessel_id' ORDER BY plan_name ASC");
		return $details_by_vessel_id->result_array();
	}
	public function delete_plan_data_by_plan_id($plan_id)
    {
        $this->db->query("DELETE FROM plans WHERE  plan_id='$plan_id'");
    }

    function get_plans_details_by_pagination($vessel_id,$offset)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM plans WHERE vessel_id='$vessel_id' ORDER BY plan_name ASC LIMIT 10 OFFSET $offset");
		return $details_by_vessel_id->result_array();
	}

	public function get_total_plans($vessel_id)
    {
        $count_plans = $this->db->query("SELECT * FROM plans WHERE vessel_id = '$vessel_id'");
        return COUNT($count_plans->result_array());
    }
	function search_by_plan($searchplan,$vessel_id,$offset)
    {

        $search_by_plan = $this->db->query("SELECT * FROM plans WHERE ((plan_no LIKE '%$searchplan%') OR (plan_name LIKE '%$searchplan%')) AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $search_by_plan->result_array();
	}
}

?>