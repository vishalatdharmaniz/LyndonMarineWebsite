<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BunkerSupply_model extends CI_Model
{  
	function get_bunker_supply_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM bunker_supply WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}
}
?>
