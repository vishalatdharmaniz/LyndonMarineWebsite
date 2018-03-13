<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditCrew extends CI_Controller
{
public function index($crew_id)
	{
		$this->load->model('CrewDetails_model');
		$crew_data=$this->CrewDetails_model->get_crew_details_by_crew_id($crew_id);
		$vessel_id=$crew_data[0]['vessel_id']; 
       
        $vessel_data=$this->CrewDetails_model->get_vessel_details_by_vessel_id($vessel_id);
        $vessel_name=$vessel_data[0]['vessel_name'];

		$name=$_REQUEST['name'];
		$tourist_p_num=$_REQUEST['tourist_p_num'];
		$seaman_p_num=$_REQUEST['seaman_p_num'];
		$rank=$_REQUEST['rank'];
		$salary=$_REQUEST['salary'];
		$join_date=$_REQUEST['join_date'];
		$nationality=$_REQUEST['nationality'];
		$remark=$_REQUEST['remark'];

	$directory_name = '../LyndonMarineImages/CrewDetailsDocuments/'.$vessel_name; 

        if(!is_dir($directory_name))
            {
                mkdir($directory_name);
            }

        $target_dir = TARGET_DIR;
 
                 /* Upload Crew details */

        $base_url_website = CREW_DETAILS_BASE_URL ; 
               
                    if ($_FILES["document"]["name"] != NULL)
                     {
                         $target_file = $directory_name.'/'.basename($_FILES['document']['name']);
                         move_uploaded_file($_FILES['document']['tmp_name'], $target_file);
                         $document = $base_url_website.'/'.$vessel_name.'/'.$_FILES["document"]["name"]; 
                     }
                    else
                     {
                         $document=""; 
                     }
             
         $var= $this->CrewDetails_model->update_crew_details($crew_id,$name,$tourist_p_num,$seaman_p_num,$remark,$rank,$salary,$join_date,$nationality,$document); 

			$base_url = BASE_URL;
			header("Location: $base_url/index.php/CrewDetails/index/$vessel_id");
  }
	
}
?>