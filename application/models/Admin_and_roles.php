<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_and_roles extends CI_Model
{
	
	 function get_profile_by_user_id($user_id)
	 {
			$result = $this->db->query("SELECT * FROM user_details WHERE id='$user_id'");
			$data = $result->result_array();
			return $data;
	 }

	 function get_company_users_by_user_id($user_id)
	 {
	 	$company_users = $this->db->query("SELECT * FROM user_details WHERE id='$user_id' ");
	 	return $company_users->result_array();
	 }

}
?>