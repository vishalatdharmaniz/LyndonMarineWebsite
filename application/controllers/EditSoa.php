<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditSoa extends CI_Controller
{

public function index($vessel_id)
  {
    $this->load->Model('Soa_model');
    $soa_data=$this->Soa_model->get_soa_details_by_vessel_id($vessel_id);
     $data['soa_data'] = $soa_data;
   $this->load->view('LyndonMarine/EditSoa',$data);
    }

public function edit_soa($soa_id)
	{
		$this->load->model('Soa_model');
		$soa_data=$this->Soa_model->get_soa_details_by_soa_id($soa_id); 
    $vessel_id=$soa_data[0]['vessel_id']; 

   $vessel_data=$this->Soa_model->get_vessel_details_by_vessel_id($vessel_id);
		$vessel_name=$vessel_data[0]['vessel_name'];

		$soa_num=$_REQUEST['soa_num'];
		$date=$_REQUEST['date'];
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

               
         $var= $this->Soa_model->update_soa_details($soa_id,$soa_num,$date,$currency,$document); 

			$base_url = BASE_URL;
			header("Location: $base_url/index.php/VesselSoa/index/$vessel_id");
  }
	
}
?>