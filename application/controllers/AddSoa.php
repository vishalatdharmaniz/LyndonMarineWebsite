<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddSoa extends CI_Controller
{
public function index($vessel_id)
	{
		$this->load->model('Soa_model');
		$vessel_data=$this->Soa_model->get_vessel_details_by_vessel_id($vessel_id);
		$vessel_name=$vessel_data[0]['vessel_name'];

		$soa_num=$_REQUEST['soa_num'];
    $from_date=$_REQUEST['from_date'];
		$to_date=$_REQUEST['to_date'];
		$currency=$_REQUEST['currency'];
		
	$directory_name = '../LyndonMarineImages/SoaDocuments/'.$vessel_name; 

        if(!is_dir($directory_name))
            {
                mkdir($directory_name);
                
            }

        $target_dir = TARGET_DIR;
 
                 /* Upload Crew details */

        $base_url_website = SOA_DETAILS_BASE_URL ; 
       
     
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

               $this->load->model('Soa_model');

               $data = array(
               				      'vessel_id'=>$vessel_id,
                             'soa_num' =>$soa_num , 
                             'from_date' =>$from_date , 
               	             'to_date' =>$to_date , 
               	             'currency' =>$currency ,
               	             'document' =>$document , 
                            );
         $var= $this->Soa_model->add_soa_details($data); 

			$base_url = BASE_URL;
			header("Location: $base_url/index.php/VesselSoa/index/$vessel_id");
  }
	
}
?>