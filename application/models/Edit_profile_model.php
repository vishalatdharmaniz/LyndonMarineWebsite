<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile_model extends CI_Model
{	

	public function edit_user_profile($user_id,$first_name,$last_name,$username,$organization,$telephone,$address,$city,$country,$note,$image)
	{
		$this->db->query("UPDATE user_details SET first_name='$first_name',last_name='$last_name',
						username='$username',organization='$organization',
						telephone='$telephone',
						address='$address',city='$city',country='$country',note='$note',
						image='$image'
						WHERE id='$user_id'");
		return true;
	} 
	public function edit_company_profile($company_id,$name,$organization,$telephone,$address,$city,$country,$note,$account_type)
	{
		$this->db->query("UPDATE company SET name='$name',organization='$organization',
						telephone='$telephone',address='$address',city='$city',country='$country',note='$note',
						account_type='$account_type'
						WHERE id='$company_id'");
		return true;
	} 
}

?>