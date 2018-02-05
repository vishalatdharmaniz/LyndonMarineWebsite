<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddVessel_model extends CI_Model
{	
	
	function add_vessel($data)
	{
		
		$this->db->insert('vessels',$data);

		return true;
	}
	
	public function check_vessel_imo_number($vessel_IMO_no)
	{
		$imo_number = $this->db->query("SELECT * FROM vessels WHERE imo_number='$vessel_IMO_no'");
		if (COUNT($imo_number->result_array()) != 0)
        {
            return "imo number exists";
        }
	}
	
	public function check_imo_number_existence($imo_number)
    {
        $q['run'] = $this->db->query("SELECT * FROM vessels WHERE imo_number = '$imo_number'");
        $q['result'] = $q['run']->result_array();
        if(COUNT($q['result'][0]) > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

	
}

?>