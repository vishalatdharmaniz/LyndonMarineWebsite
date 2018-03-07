<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BunkerSupply_model extends CI_Model
{  
	function add_bunker_supply($data)
	{
		$this->db->insert('bunker_supply',$data);

		return true;
	}

	function get_bunker_supply_data($bunker_id)
	{
		$bunker_supply_data = $this->db->query("SELECT * FROM bunker_supply WHERE bunker_id='$bunker_id'");
		return $bunker_supply_data->result_array();
	}
	

	function get_bunker_supply_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM bunker_supply WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}
	function get_vessel_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}
	function delete_buker_supply_by_bunker_id($bunker_id)
	{
		$delete_bunker_supply=$this->db->query("DELETE FROM bunker_supply WHERE bunker_id='$bunker_id' ");
	}

	function searchtable($searchname,$vessel_id,$offset)
    {

        $searchdata = $this->db->query("SELECT * FROM bunker_supply WHERE ((suppliers LIKE '%$searchname%') OR (port_of_supply LIKE '%$searchname%')) AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}

	function searchtable_total($searchname,$vessel_id)
    {

        $searchtable_total = $this->db->query("SELECT * FROM bunker_supply WHERE ((suppliers LIKE '%$searchname%') OR (port_of_supply LIKE '%$searchname%')) AND (vessel_id='$vessel_id')");
			return COUNT($searchtable_total->result_array());
	}
	
	public function update_bunker_supply($bunker_id,$supply_date,$suppliers,$port_of_supply,$mdo,$hfo,$luboil_1_type,$luboil_1_quantity,$luboil_2_type,$luboil_2_quantity,$others,$remarks,$reminder,$date_due,$invoice_amount,$currency,$document1,$document2,$paid,$paid_date)
	{
              $this->db->query("UPDATE bunker_supply SET date_of_supply='$supply_date' ,suppliers='$suppliers'                                      ,due_date='$date_due',port_of_supply='$port_of_supply',mdo='$mdo',
									                     hfo='$hfo',luboil_1_type='$luboil_1_type',reminder='$reminder',
									                     luboil_1_quantity='$luboil_1_quantity',luboil_2_type='$luboil_2_type',
									                     luboil_2_quantity='$luboil_2_quantity',others='$others',remarks='$remarks',
									                     invoice_amount='$invoice_amount',currency='$currency',document1='$document1',document2='$document2',paid='$paid',paid_date='$paid_date'	
									                     WHERE bunker_id='$bunker_id' ");
             return true;
	}
}
?>
