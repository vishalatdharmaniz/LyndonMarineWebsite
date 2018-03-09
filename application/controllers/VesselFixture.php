<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VesselFixture extends CI_Controller
 {
	public function index($vessel_id)
	{
		$this->load->library('pagination');
		$this->load->model('Fixture_model');
		$config = array();

		$config["base_url"] = base_url() . "index.php/VesselFixture/index/$vessel_id";
		$config['per_page'] = '10';
            $config['num_links'] = '5';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['prev_link'] = 'prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['reuse_query_string'] = TRUE;
			
			$page = 1;
			if($this->input->get('per_page')){
                $page = ($this->input->get('per_page')) ;
            }
			
            $uri_segment = ($page-1) * $config["per_page"];
			$config['uri_segment'] = $uri_segment;
			$match_values = array('vessel_id' => $vessel_id);
			
			$result = $this->Fixture_model->get_data('', $match_values, '', '=', '', $config['per_page'], $uri_segment);
			$abc=$this->Fixture_model->total($vessel_id);
			$config["total_rows"] = $abc;
			
			$this->pagination->initialize($config);
			$data['all_fixture'] = $result;
			
			$vesse_name_res = $this->Fixture_model->get_vessel_name($vessel_id);
			if(!empty($vesse_name_res)){
				$vesse_name = $vesse_name_res[0]['vessel_name'];
			}else{
				$vesse_name = "";
			}
			
			$data['vessel_id'] =$vessel_id;
			$data['vessel_name'] =$vesse_name;
		$this->load->view('LyndonMarine/vessel_fixture/index',$data);
	}
	public function edit($id,$vessel_id)
	{
		if(!empty($id) && !empty($vessel_id)){
			if(array_key_exists("fixture_no",$_REQUEST)){
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
					$res = $this->Fixture_model->get_by_id($id,$vessel_id);
					$data['vessel_id'] = $vessel_id;
					$data['result'] = $res[0];
					$this->load->view('LyndonMarine/vessel_fixture/edit',$data);
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
					if(array_key_exists("upload_invoice",$_FILES)){
						if($_FILES['upload_invoice']['error'] == 4){
							
							$error[] = array('error' => "Please Select Invoice File to Upload");
						}else{
							$config['upload_path']          = './uploads/';
							 $config['allowed_types']        = 'doc|docx|pdf|rtf';
							 $config['max_size']             = 100;
							 $config['max_width']            = 1024;
							 $config['max_height']           = 768;
							 
							 $this->load->library('upload',$config);
							  if (  ! $this->upload->do_upload('upload_invoice'))
							 {
								$invoice_upload_data['full_path'] = "";
										$error = array('error' => $this->upload->display_errors());
										//echo "<pre>";print_r($error);
							 }else{
								$invoice_upload_data = $this->upload->data();
								//$invoice_upload_data['full_path']
							 }
						}
					}
					//echo "<pre>";print_r($_FILES);die;
					if(array_key_exists("upload_contract",$_FILES)){
						if($_FILES['upload_contract']['error'] == 4){
							
							
							$error[] = array('error' => "Please Select contract File to Upload");
						}else{
							
							$config['upload_path']          = './uploads/';
							 $config['allowed_types']        = 'doc|docx|pdf|rtf';
							 $config['max_size']             = 100;
							 $config['max_width']            = 1024;
							 $config['max_height']           = 768;
							 
							 $this->load->library('upload',$config);
							  if (  ! $this->upload->do_upload('upload_contract'))
							 {
								$contract_upload_data['file_name'] = "";
										$error = array('error' => $this->upload->display_errors());
										
							 }else{
								$contract_upload_data = $this->upload->data();
								//$invoice_upload_data['full_path']
							 }
						}
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
								//'contract' => $contract_upload_data['file_name'],
								//'invoice' => $invoice_upload_data['file_name'],
								//'created' => date("Y-m-d  h:i:s"),
								'modified' => date("Y-m-d h:i:s"),
				);
					if(!empty($contract_upload_data) && !empty($contract_upload_data['file_name'])){
							$data['contract']	 = $contract_upload_data['file_name'];						
					}
					if(!empty($invoice_upload_data) && !empty($invoice_upload_data['file_name'])){
						$data['invoice'] = $invoice_upload_data['file_name'];
					}
					
					//echo "<pre>";print_r($data);die;
					$this->Fixture_model->update_fixture($data,$id,$vessel_id);
					$message = 'Your data Successfully saved!';
					$data['message']= $message;
					$base_url = BASE_URL;
					$user_id = $this->session->userdata('user_id');
					//header("Location: $base_url/index.php/AllVessels/index");
					$data['vessel_id'] = $vessel_id;
					redirect("VesselFixture/index/$vessel_id");
				}
			}else{
				$data = array();
				$this->load->model('Fixture_model');
				$res = $this->Fixture_model->get_by_id($id,$vessel_id);
				$data['vessel_id'] = $vessel_id;
				$data['result'] = $res[0];
				//echo "<pre>";print_r($res);die;
				$this->load->view('LyndonMarine/vessel_fixture/edit',$data);	
			}
			
		}else{
			$data = array();
			redirect("VesselFixture/index/$vessel_id");	
		}
		
	}
	public function add($vessel_id)
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
			
			//----------------- file upload code--------------------------
			$error = array();
			if(array_key_exists("upload_invoice",$_FILES)){
				if($_FILES['upload_invoice']['error'] == 4){
					$invoice_upload_data['full_path'] = "";
					$error[] = array('error' => "Please Select Invoice File to Upload");
				}else{
					$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'doc|docx|pdf|rtf';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
					 
					 $this->load->library('upload',$config);
					  if (  ! $this->upload->do_upload('upload_invoice'))
                {
						$invoice_upload_data['full_path'] = "";
                        $error = array('error' => $this->upload->display_errors());
								//echo "<pre>";print_r($error);
                }else{
						$invoice_upload_data = $this->upload->data();
						//$invoice_upload_data['full_path']
					 }
				}
			}
			
			if(array_key_exists("upload_contract",$_FILES)){
				if($_FILES['upload_contract']['error'] == 4){
					$contract_upload_data['file_name'] = "";
					$error[] = array('error' => "Please Select contract File to Upload");
				}else{
					$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'doc|docx|pdf|rtf';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
					 
					 $this->load->library('upload',$config);
					  if (  ! $this->upload->do_upload('upload_contract'))
                {
						$contract_upload_data['file_name'] = "";
                        $error = array('error' => $this->upload->display_errors());
								
                }else{
						$contract_upload_data = $this->upload->data();
						//$invoice_upload_data['full_path']
					 }
				}
			}		 
			//----------------- file upload code--------------------------
			//if(!empty($error)){
			//	$data = array();
			//	$data['vessel_id'] = $vessel_id;
			//	$data['error'] = $error;
			//	$this->load->view("LyndonMarine/vessel_fixture/add",$data);
			//}else{
				//echo "<pre>";print_r($contract_upload_data);die;
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
							'contract' => $contract_upload_data['file_name'],
							'invoice' => $invoice_upload_data['file_name'],
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
	public function view()
	{
		$data = array();
		$this->load->view('LyndonMarine/vessel_fixture/view',$data);
	}
	
	public function delete($id,$vessel_id)
	{

		if(!empty($id) && !empty($vessel_id)){
			$this->load->model('Fixture_model');
			$this->Fixture_model->delete($id,$vessel_id);
			redirect("VesselFixture/index/$vessel_id");
		}else{
			redirect("VesselFixture/index/$vessel_id");
		}
	}
	
	public function search($vessel_id){
		$this->load->model('Fixture_model');
		$this->load->library('pagination');
		
		$match = array();
		if(!empty(trim($_REQUEST['discharge_port']))){
			$discharge_port = trim($_REQUEST['discharge_port']);
			$match['discharging_port'] = $discharge_port;
		}else{
			$discharge_port = "";
		}
		
		if(!empty(trim($_REQUEST['fixture_no']))){
			$fixture_no = trim($_REQUEST['fixture_no']);
			$match['fixture_no'] = $fixture_no;
		}else{
			$fixture_no = "";
		}
		
		if(!empty(trim($_REQUEST['loading_port']))){
			$loading_port = trim($_REQUEST['loading_port']);
			$match['loading_port'] = $loading_port;
		}else{
			$loading_port = "";
		}
		
		
		
		if(!empty($_REQUEST['start_date'])){
			$start_date = $_REQUEST['start_date'];
			$first = date("Y-m-d",strtotime(str_replace('/', '-', $start_date)));
		}else{
			$first = $start_date = "";
		}
		
		if(!empty($_REQUEST['end_date'])){
			$end_date = $_REQUEST['end_date'];
			$Second = date("Y-m-d",strtotime(str_replace('/', '-', $end_date)));
		}else{
			$Second = $end_date = "";
		}
				
		//echo "<pre>";print_r($_REQUEST);die;
		
		if(!empty($first) && !empty($Second)){
			//echo $first;die;
			if($first > $Second){
				$start_date = $Second;
				$last_date = $first;
			 }else{
				$start_date = $first;
				$last_date = $Second;
			 }	
		}else{
			$start_date = $first;
				$last_date = $Second;
		}
		
		
		
		
		
		$config = array();
		$config["base_url"] = base_url() . "index.php/VesselFixture/search/$vessel_id";
		$config['per_page'] = '10';
            $config['num_links'] = '5';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['prev_link'] = 'prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['last_link'] = 'Last';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['use_page_numbers'] = TRUE;
            $config['page_query_string'] = TRUE;
            $config['reuse_query_string'] = TRUE;
			
			$page = 1;
			if($this->input->get('per_page')){
                $page = ($this->input->get('per_page')) ;
            }
			
            $uri_segment = ($page-1) * $config["per_page"];
			$config['uri_segment'] = $uri_segment;
			
				
			
			
			//$match = array($search_cretria => $search);
			$and_match_value = array('vessel_id' => $vessel_id);
			
			//$fields = array('id','user_master_id','updated_by','field_name','field_old_value','field_new_value','modified');
			$result = $this->Fixture_model->get_data('', $match, 'AND', "", '', $config['per_page'], $uri_segment,"","",$and_match_value,$start_date,$last_date);
			
			$abc = count($this->Fixture_model->get_data('', $match, 'AND', "", '', "", "","","",$and_match_value,$start_date,$last_date));	
		
			
			//echo $this->db->last_query();die;
			//$abc=$this->Fixture_model->total_record($search,$vessel_id,$search_cretria);
			$config["total_rows"] = $abc;
			$this->pagination->initialize($config);
			$data['all_fixture'] = $result;
			$data['vessel_id'] = $vessel_id;
			$data['discharging_port'] = $discharge_port;
			$data['loading_port'] =$loading_port;
			$data['fixture_no'] = $fixture_no;
			$data['start_date'] =$start_date;
			$data['end_date'] =$end_date;
			
		$this->load->view("LyndonMarine/vessel_fixture/index",$data);
		
	}
	
	public function mail_doc($checkbox_ids, $email_of_recepient)
    {
        $checkbox_ids_array = explode("@", $checkbox_ids);
        $checkbox_ids = array();
        foreach ($checkbox_ids_array as $checkbox_id)
        {
            $checkbox_id = str_replace("checkbox","", $checkbox_id);
            array_push($checkbox_ids, $checkbox_id);
        }
//echo "<pre>"; print_r($checkbox_ids);die();
        $txt = "Good Day <br><br> Please find here list of document requested:<br><br><br>";
			$certificate_id= $checkbox_ids[0];
        
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id); 

            $txt .= "M/V &nbsp;".$vessel_data[0]['vessel_name']."<br>";
            $txt .= "IMO Number &nbsp;".$vessel_data[0]['imo_number']."<br><br>";
        foreach ($checkbox_ids as $certificate_id)
        {

            $certificate_data = $this->Certificate_model->get_certificate_details_by_certificate_id($certificate_id);
// print_r($certificate_data);die();
             $vessel_id = $certificate_data[0]["vessel_id"];
            $vessel_data = $this->Vessel_model->get_vessel_details_by_id($vessel_id);
           
            $data['certificate_data'] = $certificate_data[0];

        $certificate_id = $certificate_data[0]["certificate_id"];
        $certificate_no = $certificate_data[0]["certificate_no"];
        $certificate_name = $certificate_data[0]["certificate_name"];

        $certificate_type = $certificate_data[0]["certificate_type"];

        $document1 = $certificate_data[0]["document1"];
        $document2 = $certificate_data[0]["document2"];
        $document3 = $certificate_data[0]["document3"];
        $document4 = $certificate_data[0]["document4"];
        $document5 = $certificate_data[0]["document5"];
        
        $vessel_name= $vessel_data[0]['vessel_name'];
        $imo_number= $vessel_data[0]['imo_number'];

            for($i = 1; $i <= 5 ; $i++)
            {
                $document[$i] = $certificate_data[0]['document'.$i];

                $exploded_doc = explode("/", $document[$i]);
                $name = isset($exploded_doc[6]) ? $exploded_doc[6] : NULL;
                $document_name[$i] = empty($name) ? "" : $name;  
                $document[$i] = str_replace(" ","%20","$document[$i]");
            }
            

            /*  $txt .= "<h3>Certificate Name:".$certificate_name."</h3>";
            $txt .= "<h3>Certificate No:".$certificate_no."</h3><br>"; */
           
         
            $txt .= $certificate_name."<br>";
        if ($certificate_data[0]["document1"] != NULL)
        {
            $txt .= "<a href=$document[1]>$document_name[1]</a><br>";

        }
        if ($certificate_data[0]["document2"] != NULL)
        {
            $txt .= "<a href=$document[2]>$document_name[2]</a><br>";
        }
        if ($certificate_data[0]["document3"] != NULL)
        {
            $txt .= "<a href=$document[3]>$document_name[3]</a><br>";
        }
        if ($certificate_data[0]["document4"] != NULL)
        {
            $txt .= "<a href=$document[4]>$document_name[4]</a><br>";
        }
        if ($certificate_data[0]["document5"] != NULL)
        {
            $txt .= "<a href=$document[5]>$document_name[5]</a><br>";
        }
            $txt .= "<hr>";
            $txt .= "<hr>";
        }

        $txt .= "Best Regards<br>";


        $to = "$email_of_recepient";
        $subject = "$vessel_name, $imo_number, Documents";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= "From: office@lyndonmarine.com";
        
        mail($to,$subject,$txt,$headers);
        
        $base_url = BASE_URL;
        header("Location: $return_url_after_search_and_mail");
    }
	
	
}
