<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddRecommendation extends CI_Controller
 {

	
	public function index($vessel_id)
	{
			$recommendation_type = $this->input->post('recommendation_type');
			$recommendation_date = $this->input->post('recommendation_date');
			$due_date = $this->input->post('due_date');
			$description = $this->input->post('description');
			$rectified_status = $this->input->post('rectified_status');
			$rectified_date = $this->input->post('rectified_date');
			$rectified_by = $this->input->post('rectified_by');
			$reminder = $this->input->post('reminder');
			
			$due_date = date("d/m/Y", strtotime($due_date));
			
			$target_dir = TARGET_DIR;
    
            $image_base_url = VESSEL_IMAGES_BASE_URL;
           	for($i=1;$i<=3;$i++)
            {
                $target_file[$i] = $target_dir .'uploads/'. basename($_FILES["image".$i]["name"]);
                $imageFileType[$i]= pathinfo($target_file[$i],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["image".$i]["tmp_name"], $target_file[$i]);
                if ($_FILES["image".$i]["name"] != NULL)
                {
                    $image[$i] =$image_base_url. $_FILES["image".$i]["name"];
                }
                else
                {
                    $image[$i] = NULL;
                }
            }
                $this->load->model('Recommendation_model');

				$data = array(
					'recommendation_type' => $recommendation_type,
					'recommendation_date' => $recommendation_date,
					'due_date' => $due_date,
					'description' => $description,
					'rectified_status' => $rectified_status,
					'rectified_date' => $rectified_date,
					'rectified_by' => $rectified_by,
					'reminder' => $reminder,
					'image1' => $image[1],
					'image2' => $image[2],
					'image3' => $image[3],
					'vessel_id' => $vessel_id
					);

				$this->Recommendation_model->add_recommendation($data);
				$recommendation_by_vessel_id= $this->Recommendation_model->get_recommendation_details_by_vessel_id($vessel_id);
				print_r($recommendation_by_vessel_id);

		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/VesselRecommendation/index");
            header("Location: $base_url/index.php/VesselRecommendation/index/$vessel_id");
	}
}
