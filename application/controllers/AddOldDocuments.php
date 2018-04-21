<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddOldDocuments extends CI_Controller
{

	public function index($vessel_id)
	{

		$message= '';
		$data['message']= $message;
		$data['vessel_id'] = $vessel_id;
		$this->load->view('LyndonMarine/AddOldDocumentsForm',$data);
	}
	public function Add($vessel_id)
	{
		$this->load->model('OldDocuments_model');
		$this->load->model('Vessel_model');
		$vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$vessel_name = $vessel_data[0]['vessel_name'];

			
			$document_name = $_REQUEST['document_name'];
			$description = $_REQUEST['description'];
	
            $directory_name = '../LyndonMarineImages/OldDocuments/'.$vessel_name.'/'.$document_name;

			if(!is_dir($directory_name))
			    {
			        mkdir($directory_name,0777,true);
			    }	
			
			
					 /* Upload Documents */
			$target_dir = TARGET_DIR;

			$base_url_website = OLD_DOCUMENT_BASE_URL;


            for($i=1;$i<=2;$i++)
            {

		          if ($_FILES["document".$i]["name"] != NULL)
		            {	
		                $target_file = $directory_name.'/'. basename($_FILES["document".$i]["name"]);
		                move_uploaded_file($_FILES['document'.$i]['tmp_name'], $target_file);
		                $document[$i] = $base_url_website.$vessel_name.'/'.$document_name.'/'.$_FILES["document".$i]["name"];      
		            }
		          else
		            {
		                $document[$i] = '';
		            }
	                
            }
           

				$data = array(
					'document_name' => $document_name,
					'description' => $description,
					'document1' => $document[1],
					'document2' => $document[2],
					'vessel_id' => $vessel_id
					);
/*var_dump($data); die();*/
				$this->OldDocuments_model->add_old_documents($data);

		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/Vesseldocuments/index");
            header("Location: $base_url/index.php/VesselOldDocuments/index/$vessel_id");
	}


}

?>