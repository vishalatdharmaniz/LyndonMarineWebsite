<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddPlans extends CI_Controller
 {

	
	public function index($vessel_id)
	{

			$plan_no = $this->input->post('plan_no');
			$plan_name = $this->input->post('plan_name');
			$description = $this->input->post('description');
	
	$directory_name = '../LyndonMarineImages/LyndonMarineVessels/'.$plan_name;

			if(!is_dir($directory_name))
			    {
			        mkdir($directory_name);
			    }	

					 /* Upload Documents */
			$target_dir = TARGET_DIR;
			$base_url_website = DOCUMENT_BASE_URL.$plan_name.'/';
            for($i=1;$i<=2;$i++)
            {

		            	if ($_FILES["upload_plan".$i]["name"] != NULL)
		            {
		            	
		                $target_file = $directory_name.'/'. basename($_FILES["upload_plan".$i]["name"]); 
		                move_uploaded_file($_FILES['upload_plan'. $i]['tmp_name'], $target_file);
		                $upload_plan[$i] = $base_url_website. $_FILES["upload_plan".$i]["name"];  
		            }
		            else
		            {
		                $upload_plan[$i] = '';
		            }
	                
            }

                $this->load->model('Plans_model');

				$data = array(
					'plan_no' => $plan_no,
					'plan_name' => $plan_name,
					'description' => $description,
					'upload_plan1' => $upload_plan[1],
					'upload_plan2' => $upload_plan[2],
					'vessel_id' => $vessel_id
					);

				$this->Plans_model->add_vessel_plan($data);

				$plans_by_vessel_id= $this->Plans_model->get_plans_details_by_vessel_id($vessel_id);
				//var_dump($plans_by_vessel_id);die();

		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/VesselPlans/index");
            header("Location: $base_url/index.php/VesselPlans/index/$vessel_id");
	}
}
