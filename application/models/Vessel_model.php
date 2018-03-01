<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vessel_model extends CI_Model
{	
	
	function get_vessel_details_by_id($vessel_id)
	{
		//var_dump($vessel_id);
		
		$vessel_details = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $vessel_details->result_array();
	}
	
	function get_all_vessel_details()
	{
		$all_vessel_details = $this->db->query("SELECT * FROM vessels WHERE 1 ORDER BY UNIX_TIMESTAMP(vessel_date) DESC, `time` DESC");
		return $all_vessel_details->result_array();
	}
	
	function get_vessel_data_by_userid($user_id)
	{
		$query = $this->db->query("SELECT * FROM vessels WHERE user_id='$user_id' ORDER BY UNIX_TIMESTAMP(vessel_date) DESC, `time` DESC");
		return $query->result_array();
	}

	public function delete_vessel_by_vessel_id($vessel_id,$user_id)
    {
        $this->db->query("DELETE FROM vessels WHERE vessel_id = '$vessel_id' AND user_id='$user_id'");
    }

    function search_vessel($searchname,$user_id)
    {
        $searchdata = $this->db->query("SELECT * FROM vessels WHERE ((vessel_name LIKE '%$searchname%') OR (imo_number LIKE '%$searchname%')) AND (user_id='$user_id')");
			return $searchdata->result_array();
	}

}

?>