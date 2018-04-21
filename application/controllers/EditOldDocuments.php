<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditOldDocuments extends CI_Controller
{

	public function index($document_id,$vessel_id)
	{
		$this->load->model('OldDocuments_model');
		$this->load->model('Vessel_model');
		$old_documents_data = $this->OldDocuments_model->get_document_data($document_id);
		
		$data['old_documents_data'] = $old_documents_data;
		$data['vessel_id'] = $vessel_id;
		$data['document_id'] = $document_id;
		$this->load->view('LyndonMarine/EditOldDocuments',$data);
	}
	public function Edit($document_id,$vessel_id)
	{
		$this->load->model('OldDocuments_model');
		$this->load->model('Vessel_model');

		$vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$vessel_name = $vessel_data[0]['vessel_name'];


		$old_documents_data = $this->OldDocuments_model->get_document_data($document_id);

			
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
                if ($_REQUEST['document'.$i.'-removed'] == '1')
                {
                    $document[$i] = '';
                }
                else
                   {
			          if ($_FILES["document".$i]["name"] != NULL)
			            {
			            	
			                $target_file = $directory_name.'/'. basename($_FILES["document".$i]["name"]);
			                move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
			                $document[$i] = $base_url_website.$vessel_name.'/'.$document_name.'/'.$_FILES["document".$i]["name"];    
			            }
			          else
			            {
			                $document[$i] = $old_documents_data[0]['document'.$i];
			            }
	                
                   }
  
            }  
				
				$this->OldDocuments_model->update_documents($document_id,$document_name,$description,$document[1],$document[2]);

				/*$documents_by_vessel_id= $this->OldDocuments_model->get_documents_details_by_vessel_id($vessel_id);*/
				

		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/Vesseldocuments/index");
            header("Location: $base_url/index.php/VesselOldDocuments/index/$vessel_id");
	}


}

?>