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
               
                    for($i=1;$i<=20;$i++)
                   {
                        if ($_REQUEST['document'.$i.'-removed'] == '1')
                        {
                            $document[$i] = '';
                        }
                        else
                           {
                        
                            if ($_FILES["document".$i]["name"] != NULL)
                                 {
                                     $target_file = $directory_name.'/'.  basename($_FILES['document'.$i]['name']); 
                                     move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
                                     $document[$i] = $base_url_website.'/'.$vessel_name.'/'.$_FILES["document".$i]["name"];  

                                 }
                             else
                                 {
                                     $document[$i] =$crew_data[0]["document".$i];
                                 }
                            }     

                    }
             
         $var= $this->CrewDetails_model->update_crew_details($crew_id,$name,$tourist_p_num,$seaman_p_num,$remark,$rank,$salary,$join_date,$nationality,$document[1],$document[2],$document[3],$document[4],$document[5],$document[6],$document[7],$document[8],$document[9],$document[10],$document[11],$document[12],$document[13],$document[14],$document[15],$document[16],$document[17],$document[18],$document[19],$document[20]); 

			$base_url = BASE_URL;
			header("Location: $base_url/index.php/CrewDetails/index/$vessel_id");
  }
	
}
?>