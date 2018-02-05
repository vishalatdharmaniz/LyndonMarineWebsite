<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{	

	function insert_user($data)
	{
		
		$this->db->insert('user_details',$data);
		return true;
	}
	
	function login_user($email,$password)
	{
		
		$result= $this->db->query("SELECT * FROM user_details where email='$email' AND password = '$password'");
			$login_details=$result->result_array();
			if(isset($login_details[0]))
			{
				return true;
			}
			else
			{
				return false;
			}
		
	}

	function get_email_by_id($email)
	{
		$result = $this->db->query("SELECT id FROM user_details WHERE email='$email'");
		$email_by_id = $result->result_array();

		return $email_by_id;
	}


	function check_email($email)
	{
		$this->db->select('*');
		$this->db->from('user_details');
		$this->db->where('email',$email);
		$query= $this->db->get();
		if($query->num_rows()>0)
		{
			return false;
		}
		else{
			return true;
		}
	}
	
	  public function get_user_by_email($email)
    {
        $all_items = $this->db->query("SELECT * FROM user_details WHERE email = '$email'");
        if(COUNT ($all_items->result_array() > 0 ))
        {
            return $all_items->result_array()[0];
        } 
        else
        {
            return FALSE;
        }
 	}

}

?>