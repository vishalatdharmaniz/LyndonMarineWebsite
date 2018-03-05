<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddRecommendation extends CI_Controller
 {

	
	public function index($vessel_id)
	{ 	
		    $this->load->model('Recommendation_model');
		    $vessel_data=$this->Recommendation_model->get_vessel_details_by_vessel_id($vessel_id);
		    $vessel_name=$vessel_data[0]['vessel_name'];

			$recommendation_type = $this->input->post('recommendation_type');
			$recommendation_date = $this->input->post('recommendation_date');
			$due_date = $this->input->post('due_date');
			$description = $this->input->post('description');
			$rectified_status = $this->input->post('rectified_status');
			$rectified_date = $this->input->post('rectified_date');
			$rectified_by = $this->input->post('rectified_by');
			$reminder = $this->input->post('reminder');

			
              $directory_name = '../LyndonMarineImages/VesselImages/'.$vessel_name;

        if(!is_dir($directory_name))
            {
                mkdir($directory_name);
                
            }

        $target_dir = TARGET_DIR;
 
                 /* Upload Recommendation Images */

        $base_url_website = VESSEL_RECOMMENDATION_BASE_URL ;
       
        
            for($i=1;$i<=3;$i++)
            {
                
                    if ($_FILES["image".$i]["name"] != NULL)
                         {
                             $target_file = $directory_name.'/'.  basename($_FILES['image'.$i]['name']);
                             move_uploaded_file($_FILES['image'. $i]['tmp_name'], $target_file);
                             $image[$i] = $base_url_website.'/'.$vessel_name.'/'.$_FILES["image".$i]["name"];  

                         }
                     else
                         {
                             $image[$i] ="";
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
				/*print_r($recommendation_by_vessel_id);
*/
		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/VesselRecommendation/index");
            header("Location: $base_url/index.php/VesselRecommendation/index/$vessel_id");
	}
}
