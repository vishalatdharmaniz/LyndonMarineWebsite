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
}

?>