<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddCertificate extends CI_Controller
 {

	
	public function index($vessel_id)
	{
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

			$date_expiry = str_replace('/', '-', $date_expiry);
            $date_expiry = date("Y-m-d", strtotime($date_expiry));

			if($extention_until=='')
			{
				$extention_until = '';
			}
			else
			{
	            $extention_until = str_replace('/', '-', $extention_until);
	            $extention_until = date("Y-m-d", strtotime($extention_until));
            }		

					 /* Upload Documents */
			$target_dir = TARGET_DIR;
			$base_url_website = DOCUMENT_BASE_URL;

            for($i=1;$i<=5;$i++)
            {
	            	if ($_FILES["document".$i]["name"] != NULL)
	            {
	                $target_file = $target_dir .'UploadedDocuments/'. basename($_FILES["document".$i]["name"]);
	                move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
	                $document[$i] = $base_url_website. $_FILES["document".$i]["name"];   
	            }
	            else
	            {
	                $document[$i] = '';
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
