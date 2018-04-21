<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCrewDetails extends CI_Controller
{
public function index($vessel_id)
	{
		$this->load->model('CrewDetails_model');
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
       
                   for($i=1;$i<=20;$i++)
                          {
                
                            if ($_FILES["document".$i]["name"] != NULL)
                               {
                                   $target_file = $directory_name.'/'.  basename($_FILES['document'.$i]['name']); 
                                   move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
                                   $document[$i] = $base_url_website.'/'.$vessel_name.'/'.$_FILES["document".$i]["name"];  

                               }
                           else
                               {
                                   $document[$i] ="";
                               }

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
                             'document1' =>$document[1] , 
                             'document2' =>$document[2] , 
                             'document3' =>$document[3] , 
                             'document4' =>$document[4] , 
                             'document5' =>$document[5] , 
                             'document6' =>$document[6] , 
                             'document7' =>$document[7] , 
                             'document8' =>$document[8] , 
                             'document9' =>$document[9] , 
                             'document10' =>$document[10] , 
                             'document11' =>$document[11] , 
                             'document12' =>$document[12] , 
                             'document13' =>$document[13] , 
                             'document14' =>$document[14] , 
                             'document15' =>$document[15] , 
                             'document16' =>$document[16] , 
                             'document17' =>$document[17] , 
                             'document18' =>$document[18] , 
                             'document19' =>$document[19] , 
               	             'document20' =>$document[20]  
                            );
         $var= $this->CrewDetails_model->add_crew_details($data); 

			$base_url = BASE_URL;
			header("Location: $base_url/index.php/CrewDetails/index/$vessel_id");
  }
	
}
?>