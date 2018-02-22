<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditPlan extends CI_Controller
{
	
	function index($plans_id)
	{
		$this->load->model('Plans_model');
		$vessel_plans = $this->Plans_model->get_vessel_plan_data($plans_id);
        // var_dump($vessel_plans);die();
        $data['vessel_plans'] = $vessel_plans; 

        $vessel_id = $vessel_plans[0]['vessel_id'];

		$plan_no = $_REQUEST['plan_no'];
		$plan_name = $_REQUEST['plan_name'];
		$description = $_REQUEST['description'];

		
        $directory_name = '../LyndonMarineImages/CertificateDocuments/'.$plan_name;
			if(!is_dir($directory_name))
			    {
			        mkdir($directory_name);
			    }	

					 /* Upload Documents */
			$target_dir = TARGET_DIR;
			$base_url_website = DOCUMENT_BASE_URL.'/'.$plan_name.'/';
            for($i=1;$i<=2;$i++)
            {
            	if ($_REQUEST['document'.$i.'-removed'] == '1')
	            {
	                $upload_plan[$i] = '';
	            }
	            else
		            {

			            	if ($_FILES["upload_plan".$i]["name"] != NULL)
			            {
			            	
			                $target_file = $directory_name.'/'. basename($_FILES["upload_plan".$i]["name"]);
			                //print_r($target_file);die();
			                move_uploaded_file($_FILES['upload_plan'. $i]['tmp_name'], $target_file);
			                $upload_plan[$i] = $base_url_website. $_FILES["upload_plan".$i]["name"];   
			            }
			            else
			            {
			                $upload_plan[$i] = $vessel_plans[0]["upload_plan".$i];
			            }
			        }
	                
            }

		
				$this->load->model('Update_model');

				$this->Update_model->edit_plan($plans_id,$plan_no,$plan_name,$description,
				 		$upload_plan[1],$upload_plan[2]);

		$base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselPlans/index/$vessel_id"); 

	}
}

?>