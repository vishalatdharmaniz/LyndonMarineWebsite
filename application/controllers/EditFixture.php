<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditFixture extends CI_Controller
{

  public function index($id,$vessel_id)
  {
      $this->load->Model('Fixture_model');
      $fixture_data=$this->Fixture_model->get_fixture_by_id($id);
      $data['fixture_data']=$fixture_data;
      $data['id']=$id;
      $data['vessel_id']=$vessel_id;
      $this->load->view('LyndonMarine/vessel_fixture/edit',$data);
    }


public function edit($id,$vessel_id)
{
	       $this->load->model('Fixture_model'); 
			$this->load->model('Vessel_model');
            
			$fixture_no = $_REQUEST['fixture_no'];
			$fixture_date = $_REQUEST['fixture_date'];
			if(!empty($fixture_date)){
				$fixture_date = date("Y-m-d",strtotime(str_replace('/', '-', $fixture_date)));
			}else{
				$fixture_date = "";
			}
			$loading_port = $_REQUEST['loading_port'];
			$discharging_port = $_REQUEST['discharging_port'];
			$fright = $_REQUEST['fright'];
			$currency = $_REQUEST['currency'];
			$boker = $_REQUEST['boker'];     
			$commission = $_REQUEST['commission'];
			$remarks = $_REQUEST['remarks'];
         
			$vessel_data=$this->Vessel_model->get_vessel_details_by_id($vessel_id);
			$vessel_name=$vessel_data[0]['vessel_name'];   
			$fixture_data=$this->Fixture_model->get_fixture_by_id($id);      

		   $directory_name = '../LyndonMarineImages/FixtureDocuments/'.$vessel_name.'/' ; 

		   
      			
		        if(!is_dir($directory_name))
		            {
		                mkdir($directory_name,0777,true);
		                
		            }

               $target_dir = TARGET_DIR;
 
                 /* Upload Fixture Documents*/

              $base_url_website = FIXTURE_BASE_URL ;
      

                if ($_REQUEST['document1-removed'] == '1')
	            {
	                $contract = '';
	            }
	            else 
	            {
                     if($_FILES["contract"]["name"] != Null)
		                 {
		                     $target_file = $directory_name.basename($_FILES['contract']['name']); 
		                     move_uploaded_file($_FILES['contract']['tmp_name'], $target_file);
		                     $contract= $base_url_website.'/'.$vessel_name.'/'.$_FILES["contract"]["name"];  

		                 }
		             else
		                 {
		                     $contract=$fixture_data[0]['contract'];
		                 }
			     }
			   

			      if ($_REQUEST['document2-removed'] == '1')
	                {
	                   $invoice = '';
	                }
	             else 
	                {

					if($_FILES["invoice"]["name"] != Null)
		                 {
		                     $target_file = $directory_name.'/'.$vessel_name.'/'.basename($_FILES['invoice']['name']);
		                     move_uploaded_file($_FILES['invoice']['tmp_name'], $target_file);
		                     $invoice= $base_url_website.'/'.$vessel_name.'/'.$_FILES["invoice"]["name"];  

		                 }
		             else
		                 {
		                     $invoice=$fixture_data[0]['invoice'];
		                 }
		            }

            /*
					$data = array(
								'vessel_id' => $vessel_id,
								'fixture_no' => $fixture_no,
								'fixture_date' => $fixture_date,
								'loading_port' => $fixture_date,
								'discharging_port' => $discharging_port,
								'fright' => $fright,
								'currency' => $currency,
								'bokers' => $boker,
								'commission' => $commission,
								'remarks' => $remarks,
								'contract'=>$upload_contract,
								'invoice'=>$upload_invoice,
								'modified' => date("Y-m-d h:i:s"),
				);
				*/

			$data=$this->Fixture_model->updateFixture($id,$fixture_no,$loading_port,$fixture_date,$discharging_port,$fright,$currency,$boker,$commission,$remarks,$contract,$invoice);


		    $vessel_id=$vessel_data[0]['vessel_id'];
			$data['vessel_id'] = $vessel_id;   
			$base_url = BASE_URL;
			header("Location: $base_url/index.php/Vessel_fixture/index/$vessel_id");
}

}
?>