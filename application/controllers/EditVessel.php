<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditVessel extends CI_Controller
{
	
	function index($vessel_id)
	{
		$this->load->model('Vessel_model');

    	$vessel_details = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$data['vessel_details'] = $vessel_details; 
	 
	
		$vessel_name = $_REQUEST['vessel_name'];
		$imo_number = $_REQUEST['imo_number'];
		$flag = $_REQUEST['flag'];
		$class_no = $_REQUEST['class_no'];
		$grain = $_REQUEST['grain'];
		$bale = $_REQUEST['bale'];
		$dwt = $_REQUEST['dwt'];
		$price_idea = $_REQUEST['price_idea'];
		$owner_name = $_REQUEST['owner_name'];
		$owner_address = $_REQUEST['owner_address'];
		$owner_email = $_REQUEST['owner_email'];
		$owner_contact_number = $_REQUEST['owner_contact_number'];
		$manager_name = $_REQUEST['manager_name'];
		$manager_address = $_REQUEST['manager_address'];
		$manager_email = $_REQUEST['manager_email'];
		$manager_contact_number = $_REQUEST['manager_contact_number'];
		$agency = $_REQUEST['agency'];
		$agency_address = $_REQUEST['agency_address'];
		$agency_email = $_REQUEST['agency_email'];
		$agency_contact_number = $_REQUEST['agency_contact_number'];
		$loa = $_REQUEST['loa'];
		//$short_description = $_REQUEST['short_description'];
		$currency = $_REQUEST['currency'];
		$year_built = $_REQUEST['year_built'];
		$vessel_breadth = $_REQUEST['vessel_breadth'];
		$vessel_location = $_REQUEST['vessel_location'];
		$place_built = $_REQUEST['place_built'];
		$vessel_depth = $_REQUEST['vessel_depth'];
		$vessel_type = $_REQUEST['vessel_type'];
		$vessel_date = $_REQUEST['vessel_date'];
		$time = time();
		//$role = $_REQUEST['role'];
		$status = $_REQUEST['status'];
		$full_description =$_REQUEST['full_description'];
		
		/*$grain = number_format($grain); 
        $bale = number_format($bale);
        $dwt = number_format($dwt);  */
        
		$grain = str_replace(',','',$grain);
        $bale = str_replace(',','',$bale);
        $dwt = str_replace(',','',$dwt);

		$vessel_date = str_replace('/', '-', $vessel_date);
        $vessel_date = date("Y-m-d", strtotime($vessel_date));

		$target_dir = TARGET_DIR;
    
            $image_base_url = VESSEL_IMAGES_BASE_URL;
           
            for($i=1;$i<=5;$i++)
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
                	
                    $image[$i] = $vessel_details[0]["image".$i];
                }
            }

                    /* Upload Documents */
/*
        $base_url_website = DOCUMENT_BASE_URL;

            for($i=1;$i<=5;$i++)
            {
                $target_file[$i] = $target_dir .'UploadedDocuments/'. basename($_FILES["document".$i]["name"]);
                $imageFileType[$i]= pathinfo($target_file[$i],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["document".$i]["tmp_name"], $target_file[$i]);
                if ($_FILES["document".$i]["name"] != NULL)
                {
                    $document[$i] =$base_url_website. $_FILES["document".$i]["name"];
                }
                else
                {
                    $document[$i] = $vessel_details[0]["document".$i];
                }
            }*/
		
		$this->load->model('Update_model');

				 $this->Update_model->edit_vessel($vessel_id,$vessel_name,$imo_number,$flag,$class_no,
					$grain,$bale,$dwt,$price_idea,$owner_name,$owner_address,$owner_email,$owner_contact_number,
		 			$manager_name,$manager_address,$manager_email,$manager_contact_number,
					$agency,$agency_address,$agency_email,$agency_contact_number,$loa,
					$currency,$year_built,$vessel_breadth,$vessel_location,$place_built,$vessel_depth,$vessel_type,
					$vessel_date,$time,$status,$full_description,$image[1],$image[2],$image[3],$image[4],$image[5]);


		$base_url = BASE_URL;
                header("Location: $base_url/index.php/FleetDetails/index/$vessel_id"); 

	}
}

?>