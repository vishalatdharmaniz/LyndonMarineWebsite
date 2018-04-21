<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminAndRoles extends CI_Controller
{

	public function index()
	{
       $this->load->model('Admin_and_roles');
       $this->load->model('admin/Company_model');
    	$com_id = $this->session->userdata('company_id');
    	$user_data = $this->Company_model->get_user_details_by_company_id($com_id);

	    $id = $user_data[0]['id']; 
	
		$data['user_data'] = $user_data;
		$data['id'] = $id;
		$data['com_id'] = $com_id;

		$this->load->view('LyndonMarine/Admin_and_Roles',$data);
	}
   /* function get_company_users_by_user_id($user_id)
    {

    }*/

    function add_user($id)
    {
    	
    	$this->load->model('Home_model');
        $this->load->model('admin/Company_model');

        $company_id = $id;

        $first_name = $this->input->post('first_name');
		$last_name = $this->input->post('last_name');
        $job = $this->input->post('job');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = $this->input->post('role');
        
       // $profile_pic = $this->input->post('profile_pic');

         $directory_name = '../LyndonMarineImages/ProfileImages';

			if(!is_dir($directory_name))
			    {
			        mkdir($directory_name,0777,true);
			    }	
			
			$target_dir = TARGET_DIR;

			$base_url_website = PROFILE_IMAGES_BASE_URL;

          if ($_FILES["profile_pic"]["name"] != NULL)
            {	
                $target_file = $directory_name.'/'. basename($_FILES["profile_pic"]["name"]);
                move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_file);
                $profile_pic = $base_url_website.$_FILES["profile_pic"]["name"];      
            }
          else
            {
                $profile_pic = '';
            }

		  $data = array(
				'image' => $profile_pic,
				'company_id' => $company_id,
				'first_name' => $first_name,
				'last_name' => $last_name,
				'job_desc' => $job,
				'username' => $username,
				'email' => $email,
				'password' => $password,
				'role' => $role
				
			);
		
		$add_company_user =$this->Company_model->add_users($data);
		

		$base_url = BASE_URL;
                header("Location: $base_url/index.php/AdminAndRoles/index"); 

    }
}

