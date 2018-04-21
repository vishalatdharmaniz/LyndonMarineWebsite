<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditPaymentReminder extends CI_Controller
{

	public function index($reminder_id,$vessel_id)
	{
		$this->load->model('PaymentReminder_model');
		$this->load->model('Vessel_model');
		$payment_reminder_details = $this->PaymentReminder_model->get_reminder_details($reminder_id);
		
		$data['payment_reminder_details'] = $payment_reminder_details;
		$data['vessel_id'] = $vessel_id;
		$data['reminder_id'] = $reminder_id;
		$this->load->view('LyndonMarine/EditPaymentReminder',$data);
	}
	public function Edit($reminder_id,$vessel_id)
	{
		$this->load->model('PaymentReminder_model');
		$this->load->model('Vessel_model');

		$vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
		$vessel_name = $vessel_data[0]['vessel_name'];


		$payment_reminder_details = $this->PaymentReminder_model->get_reminder_details($reminder_id);

			
			$invoice_number = $_REQUEST['invoice_number'];
			$company = $_REQUEST['company'];
			$reminder_date = $_REQUEST['reminder_date'];
			if($reminder_date !='')
			{
				$reminder_date = str_replace('/', '-', $reminder_date);
				$reminder_date = date("Y-m-d",strtotime($reminder_date)); 
			}
			else{ $reminder_date = '';}
			$due_date = $_REQUEST['due_date'];  
			if($due_date !='')
			{
				$due_date = str_replace('/', '-', $due_date);
				$due_date = date("Y-m-d",strtotime($due_date)); 
			}
			else{ $due_date = '';}
			
			$amount = $_REQUEST['amount'];
			$currency = $_REQUEST['currency'];
			$paid_status = $_REQUEST['paid_status'];
			$remarks = $_REQUEST['remarks'];

          /* $directory_name = '../LyndonMarineImages/OldDocuments/'.$vessel_name.'/'.$document_name;

			if(!is_dir($directory_name))
			    {
			        mkdir($directory_name,0777,true);
			    }	
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
			                $document[$i] = $payment_reminder_details[0]['document'.$i];
			            }
	                
                   }
  
            }  
				*/
				$this->PaymentReminder_model->update_reminder_details($reminder_id,$invoice_number,$company,$reminder_date,$due_date,$amount,$currency,$paid_status,$remarks);

				/*$documents_by_vessel_id= $this->PaymentReminder_model->get_documents_details_by_vessel_id($vessel_id);*/
				

		 		$base_url = BASE_URL;
            //header("Location: $base_url/index.php/Vesseldocuments/index");
            header("Location: $base_url/index.php/VesselPaymentReminder/index/$vessel_id");
	}


}

?>