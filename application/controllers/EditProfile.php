<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditProfile extends CI_Controller
{
	function index()
	{
		$this->update_user_profile();
		
		
	}
	function update_user_profile()
	{
		$this->load->model('Profile_model');
    	$user_id = $this->session->userdata('user_id');
    	$user_data = $this->Profile_model->get_profile_by_user_id($user_id);
			
		$data['user_data'] = $user_data;

		$first_name = $_REQUEST['first_name'];
		$last_name = $_REQUEST['last_name'];
		$username = $_REQUEST['username'];
		$organization = $_REQUEST['organization'];
		$telephone = $_REQUEST['telephone'];
		$address = $_REQUEST['address'];
		$city = $_REQUEST['city'];
		$country = $_REQUEST['country'];
		$note = $_REQUEST['note'];
		
		$target_dir = TARGET_DIR;
    
            $image_base_url = PROFILE_IMAGES_BASE_URL;
           
            
                $target_file = $target_dir .'ProfileImages/'. basename($_FILES["image"]["name"]);
                $imageFileType= pathinfo($target_file,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                if ($_FILES["image"]["name"] != NULL)
                {
                    $image = $image_base_url.$_FILES["image"]["name"];
                }
                else
                {
                    $image = NULL;
                }
		
		$this->load->model('Edit_profile_model');

		 $this->Edit_profile_model->edit_user_profile($user_id,$first_name,$last_name,$username,$organization,$telephone,$address,$city,$country,$note,$image);
		
	
		$this->load->view('LyndonMarine/profile',$data);
		
	}
}

?>