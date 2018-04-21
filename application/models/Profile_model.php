<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model
{
	
	function get_user_profile($email)
	{
		$result = $this->db->query("SELECT * FROM user_details WHERE email='$email'");
		//$user_details = $result->result_array();
		$data = $result->result_array();

		
			return $data;
	}
	
	 function get_profile_by_user_id($user_id)
	 {
			$result = $this->db->query("SELECT * FROM user_details WHERE id='$user_id'");
			$data = $result->result_array();

			return $data;
	 }
	 function get_profile_by_company_id($company_id)
	 {
			$result = $this->db->query("SELECT * FROM company WHERE id='$company_id'");
			$data = $result->result_array();

			return $data;
	 }

}

?>