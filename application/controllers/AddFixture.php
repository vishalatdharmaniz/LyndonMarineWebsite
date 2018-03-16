	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddFixture extends CI_Controller
 {
	public function index($vessel_id)
	{
		
		$this->load->model('Fixture_model');
		//echo "<pre>";print_r($_FILES); die;
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->form_validation->set_rules('fixture_no', 'fixture_no', 'required');
		$this->form_validation->set_rules('fixture_date', 'fixture_date', 'required');
		$this->form_validation->set_rules('loading_port', 'loading_port', 'required');
		$this->form_validation->set_rules('discharging_port', 'discharging_port', 'required');
		$this->form_validation->set_rules('fright', 'fright', 'required');
		$this->form_validation->set_rules('currency', 'currency', 'required');
		$this->form_validation->set_rules('remarks', 'remarks', 'required');
		if ($this->form_validation->run() == FALSE){
			//echo "<pre>";print_r($_FILES);die;
			$data = array();
			$data['vessel_id'] = $vessel_id;
			$this->load->view('LyndonMarine/vessel_fixture/add',$data);
		}else{
			$fixture_no = $this->input->post('fixture_no');
			$fixture_date = $this->input->post('fixture_date');
			if(!empty($fixture_date)){
				$fixture_date = date("Y-m-d",strtotime(str_replace('/', '-', $fixture_date)));
			}else{
				$fixture_date = "";
			}
			$loading_port = $this->input->post('loading_port');
			$discharging_port = $this->input->post('discharging_port');
			$fright = $this->input->post('fright');
			$currency = $this->input->post('currency');
			$boker = $this->input->post('boker');
			$commission = $this->input->post('commission');
			$remarks = $this->input->post('remarks');

				$this->load->model('Vessel_model');
					$vessel_data=$this->Vessel_model->get_vessel_details_by_id($vessel_id);

					$vessel_name=$vessel_data[0]['vessel_name'];
					
			//----------------- file upload code--------------------------

				   $directory_name = '../LyndonMarineImages/FixtureDocuments/'.$vessel_name.'/' ; 
	
		        if(!is_dir($directory_name))
		            {
		                mkdir($directory_name);
		                
		            }

               $target_dir = TARGET_DIR;
 
                 /* Upload Fixture Documents*/

              $base_url_website = FIXTURE_BASE_URL ;
      
                
                    if($_FILES["upload_contract"]["name"] != NULL)
                         {
                             $target_file = $directory_name.'/'.  basename($_FILES['upload_contract']['name']);
                             move_uploaded_file($_FILES['upload_contract']['tmp_name'], $target_file);
                             $upload_contract= $base_url_website.'/'.$vessel_name.'/'.$_FILES["upload_contract"]["name"];  

                         }
                     else
                         {
                             $upload_contract="";
                         }
					
					if($_FILES["upload_invoice"]["name"] != NULL)
                         {
                             $target_file = $directory_name.'/'.  basename($_FILES['upload_invoice']['name']);
                             move_uploaded_file($_FILES['upload_invoice']['tmp_name'], $target_file);
                             $upload_invoice= $base_url_website.'/'.$vessel_name.'/'.$_FILES["upload_invoice"]["name"];  

                         }
                     else
                         {
                             $upload_invoice="";
                         }
                    
				$data = array(
							'vessel_id' => $vessel_id,
							'fixture_no' => $fixture_no,
							'fixture_date' => $fixture_date,
							'loading_port' => $loading_port,
							'discharging_port' => $discharging_port,
							'fright' => $fright,
							'currency' => $currency,
							'bokers' => $boker,
							'commission' => $commission,
							'remarks' => $remarks,
							'contract' => $upload_contract,
							'invoice' => $upload_invoice,
							'created' => date("Y-m-d  h:i:s"),
							'modified' => date("Y-m-d h:i:s"),
    		);
				//echo "<pre>";print_r($data);die;
				$this->Fixture_model->add($data);
				$message = 'Your data Successfully saved!';
				$data['message']= $message;
				$base_url = BASE_URL;
				$user_id = $this->session->userdata('user_id');
				//header("Location: $base_url/index.php/AllVessels/index");
				$data['vessel_id'] = $vessel_id;
				redirect("VesselFixture/index/$vessel_id");
			//}
		}
		
	}
}
?>