<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCertificate extends CI_Controller
 {

	
	public function index($vessel_id)
	{	
		$this->load->model('Vessel_model');
		$vessel_detail_folder = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
$vessel_name = $vessel_detail_folder[0]['vessel_name'];

			$certificate_no = $this->input->post('certificate_no');
			$certificate_name = $this->input->post('certificate_name');
			$certificate_type = $this->input->post('certificate_type');
			$date_issue = $this->input->post('date_issue');
			$date_expiry = $this->input->post('date_expiry');
			$extention_until = $this->input->post('extention_until');
			$reminder1 = $this->input->post('reminder1');
			$reminder2 = $this->input->post('reminder2');
			$examption = $this->input->post('examption');
			$comments = $this->input->post('comments');
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
            $directory_name = '../LyndonMarineImages/VesselImages/'.$vessel_name.$certificatefolder;
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
		            	
		                $target_file = $certificate_directory.'/'. basename($_FILES["document".$i]["name"]);
		                //print_r($target_file);die();
		                move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
		                $document[$i] = $base_url_website. $_FILES["document".$i]["name"];   
		            }
		            else
		            {
		                $document[$i] = '';
		            }
		        }
	                
            }

                $this->load->model('Certificate_model');

				$data = array(
					'certificate_no' => $certificate_no,
					'certificate_name' => $certificate_name,
					'certificate_type' => $certificate_type,
					'date_issue' => $date_issue,
					'date_expiry' => $date_expiry,
					'extention_until' => $extention_until,
					'reminder1' => $reminder1,
					'reminder2' => $reminder2,
					'examption' => $examption,
					'comments' => $comments,
					'time' => $time,
					'document1' => $document[1],
					'document2' => $document[2],
					'document3' => $document[3],
					'document4' => $document[4],
					'document5' => $document[5],
					'vessel_id' => $vessel_id
					);

				$this->Certificate_model->add_certificate($data);

				$certificate_by_vessel_id= $this->Certificate_model->get_certificate_details_by_vessel_id($vessel_id);
				//print_r($certificate_by_vessel_id);
		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/VesselCertificate/index");
            header("Location: $base_url/index.php/VesselCertificate/index/$vessel_id");
	}
}
