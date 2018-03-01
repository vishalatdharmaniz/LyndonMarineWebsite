<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditCertificate extends CI_Controller
{
	
	function index($certificate_id)
	{
		$this->load->model('Certificate_model');
		$certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);
        //var_dump($certificate_data);die();
        $data['certificate_data'] = $certificate_data; 

        $vessel_id = $certificate_data[0]['vessel_id'];

		$certificate_no = $_REQUEST['certificate_no'];
		$certificate_name = $_REQUEST['certificate_name'];
		$certificate_type = $_REQUEST['certificate_type'];
		$date_issue = $_REQUEST['date_issue'];
		$date_expiry = $_REQUEST['date_expiry'];
		$extention_until = $_REQUEST['extention_until'];
		$reminder1 = $_REQUEST['reminder1'];
		$reminder2 = $_REQUEST['reminder2'];
		$examption = $_REQUEST['examption'];
		$comments = $_REQUEST['comments'];
		$time= time();
		$date_issue = str_replace('/', '-', $date_issue);
        $date_issue = date("Y-m-d", strtotime($date_issue));			

        if($date_expiry=='')
		{
			$date_expiry = '';
		}
		else
		{
			$date_expiry = str_replace('/', '-', $date_expiry);
	        $date_expiry = date("Y-m-d", strtotime($date_expiry));			
	    }
       if($extention_until=='')
		{
			$extention_until = '';
		}
		else
		{
            $extention_until = str_replace('/', '-', $extention_until);
            $extention_until = date("Y-m-d", strtotime($extention_until));
        }


        $certificatefolder = '/Certificates/';
            $directory_name = '../LyndonMarineImages/LyndonMarineVessels/'.$vessel_name.$certificatefolder;
			if(!is_dir($directory_name))
			    {
			        mkdir($directory_name);
			    }	
			
			$certificate_directory = $directory_name.$certificate_name; 
			if(!is_dir($certificate_directory))
			    {
			        mkdir($certificate_directory);
			    }
					 /* Upload Documents */
			$target_dir = TARGET_DIR;
			$base_url_website = DOCUMENT_BASE_URL.$vessel_name.$certificatefolder.$certificate_name.'/';
            for($i=1;$i<=5;$i++)
            {
            	if ($_REQUEST['document'.$i.'-removed'] == '1')
	            {
	                $document[$i] = '';
	            }
	            else
		            {
		            	if ($_FILES["document".$i]["name"] != NULL)
		             {
		                 $target_file = $certificate_directory.'/'.  basename($_FILES['document'.$i]['name']);
		                 move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
		                 $document[$i] = $base_url_website. $_FILES["document".$i]["name"];     
		             }
		             else
		             {
		                 $document[$i] = $certificate_data[0]["document".$i];
		             }
		        }

            }
		
		$this->load->model('Update_model');

				 $this->Update_model->edit_certificate($certificate_id,$certificate_no,$certificate_name,$certificate_type,
				 		$date_issue,$date_expiry,$extention_until,$reminder1,$reminder2,$examption,
						$comments,$time,$document[1],$document[2],$document[3],$document[4],$document[5]);


		$base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselCertificate/index/$vessel_id"); 

	}
}

?>