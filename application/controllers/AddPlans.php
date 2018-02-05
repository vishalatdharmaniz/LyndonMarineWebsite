<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddPlans extends CI_Controller
 {

	
	public function index($vessel_id)
	{

			$plan_no = $this->input->post('plan_no');
			$plan_name = $this->input->post('plan_name');
			$description = $this->input->post('description');
			$upload_plan1 = $this->input->post('upload_plan1');
			$upload_plan2 = $this->input->post('upload_plan2');
	
			$target_dir = TARGET_DIR;
    
            $image_base_url = VESSEL_IMAGES_BASE_URL;
           
            
            for($i=1;$i<=2;$i++)
            {
                $target_file[$i] = $target_dir .'uploads/'. basename($_FILES["upload_plan".$i]["name"]);
                $imageFileType[$i]= pathinfo($target_file[$i],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["upload_plan".$i]["tmp_name"], $target_file[$i]);
                if ($_FILES["upload_plan".$i]["name"] != NULL)
                {
                    $upload_plan[$i] =$image_base_url. $_FILES["upload_plan".$i]["name"];
                }
                else
                {
                    $upload_plan[$i] = NULL;
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
