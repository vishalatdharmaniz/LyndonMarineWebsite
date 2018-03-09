<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recommendation_model extends CI_Model
{	
	
	function add_recommendation($data)
	{
		$this->db->insert('recommendation',$data);

		return true;
	}
	
	function get_certificate_data($recommendation_id)
	{
		/*var_dump($recommendation_id);*/
		$recommendation_data = $this->db->query("SELECT * FROM recommendation WHERE recommendation_id='$recommendation_id'");
		return $recommendation_data->result_array();
	}

	function get_all_recommendation_details()
	{
		$get_all_recommendation_details = $this->db->query("SELECT * FROM recommendation");
		return $get_all_recommendation_details->result_array();
	}

	function get_recommendation_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM recommendation WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}

	function get_vessel_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}

	function delete_recommendation_by_recommendation_id($recommendation_id)
	{
		$delete_recommendation=$this->db->query("DELETE FROM recommendation WHERE recommendation_id='$recommendation_id' ");
	}
	public function get_all_recommendation_data_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM recommendation WHERE vessel_id='$vessel_id' LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

	public function get_total_recommendation($vessel_id)
    {
        $count_recommendation = $this->db->query("SELECT * FROM recommendation WHERE vessel_id = '$vessel_id'");
        return COUNT($count_recommendation->result_array());
    }


}

?>