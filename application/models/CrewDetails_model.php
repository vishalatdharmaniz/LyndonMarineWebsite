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
	function searchtable($searchname,$vessel_id,$offset)
    {

        $searchdata = $this->db->query("SELECT * FROM crew_details WHERE ((name LIKE '%$searchname%') OR (tourist_p_num LIKE '%$searchname%')  OR (seaman_p_num LIKE '%$searchname%') OR (join_date LIKE '%$searchname%')) AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}

	function searchtable_total($searchname,$vessel_id)
    {

        $searchtable_total = $this->db->query("SELECT * FROM crew_details WHERE ((name LIKE '%$searchname%') OR (tourist_p_num LIKE '%$searchname%')  OR (seaman_p_num LIKE '%$searchname%') OR (join_date LIKE '%$searchname%')) AND (vessel_id='$vessel_id')");
			return COUNT($searchtable_total->result_array());
	}
	

}
?>
