<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditCompanyProfile extends CI_Controller
{
	function index()
	{
		$this->update_company_profile();
		
		
	}
	function update_company_profile()
	{
		$this->load->model('Profile_model');
    	$company_id = $this->session->userdata('company_id');
    	$company_data = $this->Profile_model->get_profile_by_company_id($company_id);
			
		$data['company_data'] = $company_data;

		$name = $_REQUEST['name'];
		$organization = $_REQUEST['organization'];
		$telephone = $_REQUEST['telephone'];
		$address = $_REQUEST['address'];
		$city = $_REQUEST['city'];
		$country = $_REQUEST['country'];
		$account_type = $_REQUEST['account_type'];
		$note = $_REQUEST['note'];
		
		/*$target_dir = TARGET_DIR;
    
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
                }*/
		
		$this->load->model('Edit_profile_model');

		$update = $this->Edit_profile_model->edit_company_profile($company_id,$name,$organization,$telephone,$address,$city,$country,$note,$account_type);
	
		
		$base_url = BASE_URL;
                header("Location: $base_url/index.php/Profile/index"); 
		
		
	}
}

?>