<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends CI_Model
{	
	
	function add_certificate($data)
	{
		$this->db->insert('certificate',$data);

		return true;
	}
	
	function get_certificate_data($certificate_id)
	{
		var_dump($certificate_id);
		$certificate_data = $this->db->query("SELECT * FROM certificate WHERE certificate_id='$certificate_id'");
		return $certificate_data->result_array();
	}

	function get_all_certificate_details()
	{
		$get_all_certificate_details = $this->db->query("SELECT * FROM certificate WHERE 1 ORDER BY UNIX_TIMESTAMP(date_issue) DESC, `time` DESC");
		return $get_all_certificate_details->result_array();
	}

	function get_certificate_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM certificate WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}

	function get_certificate_details_by_certificate_id($certificate_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM certificate WHERE certificate_id='$certificate_id'");
		return $details_by_vessel_id->result_array();
	}

	public function delete_certificate_by_vessel_id($vessel_id)
    {
        $this->db->query("DELETE FROM certificate WHERE  vessel_id='$vessel_id'");
    }

    public function delete_certificate_by_certificate_id($certificate_id)
    {
        $this->db->query("DELETE FROM certificate WHERE  certificate_id='$certificate_id'");
    }
    
    function searchtable($searchname,$vessel_id)
    {

        $searchdata = $this->db->query("SELECT * FROM certificate WHERE ((certificate_no LIKE '%$searchname%') OR (certificate_name LIKE '%$searchname%')) AND (vessel_id='$vessel_id')");
			return $searchdata->result_array();
	}
}

?>