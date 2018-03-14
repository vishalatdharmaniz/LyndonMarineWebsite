<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCrewDetails extends CI_Controller
{
public function index($vessel_id)
	{
		$this->load->model('CrewDetails_model');
		$vessel_data=$this->CrewDetails_model->get_vessel_details_by_vessel_id($vessel_id);
		$vessel_name=$vessel_data[0]['vessel_name'];
    /*  $crew_data = $this->CrewDetails_model->get_all_crew_details();
      $document=$crew_data[0]['document'];
      echo $document."<br>";*/

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
                 $target_file = $directory_name.'/'.  basename($_FILES['document']['name']); 
                 move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
                 $document = $base_url_website.'/'.$vessel_name.'/'.$_FILES["document"]["name"];  

             }
         else
             {
                 $document=""; 
             }   

               $this->load->model('CrewDetails_model');

               $data = array(
               				'vessel_id'=>$vessel_id,
               	             'name' =>$name , 
               	             'tourist_p_num' =>$tourist_p_num , 
               	             'seaman_p_num' =>$seaman_p_num , 
               	             'rank' =>$rank , 
               	             'salary' =>$salary , 
               	             'join_date' =>$join_date , 
               	             'nationality' =>$nationality , 
               	             'remark' =>$remark , 
               	             'document' =>$document , 
                            );
         $var= $this->CrewDetails_model->add_crew_details($data); 

			$base_url = BASE_URL;
			header("Location: $base_url/index.php/CrewDetails/index/$vessel_id");
  }
	
}
?>