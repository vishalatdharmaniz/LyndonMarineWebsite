<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soa_model extends CI_Model
{  
	function add_soa_details($data)
	{
		$this->db->insert('soa_details',$data);

		return true;
	}

	function get_soa_details_by_vessel_id($vessel_id)
	{
		$soa_data = $this->db->query("SELECT * FROM soa_details WHERE vessel_id='$vessel_id'");
		return $soa_data->result_array();
	}
    function get_soa_details_by_soa_id($soa_id)
	{
		$soa_data = $this->db->query("SELECT * FROM soa_details WHERE soa_id='$soa_id'");
		return $soa_data->result_array();
	}

	function get_vessel_details_by_vessel_id($vessel_id)
	{
		$vessel_data = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $vessel_data->result_array();
	}
	function update_soa_details($soa_id,$soa_num,$date,$currency,$document)
	{
		$update_soa=$this->db->query("UPDATE soa_details SET soa_num='$soa_num',soa_date='$date',currency='$currency',document='$document' WHERE soa_id='$soa_id' ");
		return true;
	}
	/*function delete_soa_details($soa_id)
	{
		$delete_soa=$this->db->query("DELETE FROM soa_details WHERE soa_id='$soa_id' ");
	}*/
	public function get_all_soa_data_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM soa_details WHERE vessel_id='$vessel_id' LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

	public function get_total_soa($vessel_id)
    {
        $count_soa = $this->db->query("SELECT * FROM soa_details WHERE vessel_id = '$vessel_id'");
        return COUNT($count_soa->result_array());
    }

}
?>