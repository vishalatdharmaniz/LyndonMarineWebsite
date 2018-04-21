<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddBunkerSupply extends CI_Controller 
{

	public function index($vessel_id)
	{
		$this->load->model('BunkerSupply_model');
    	$bunker_supply_data = $this->BunkerSupply_model->get_bunker_supply_details_by_vessel_id($vessel_id);
    	$data['bunker_supply_data'] = $bunker_supply_data; 
    	$data['vessel_id'] = $vessel_id;   	
    	$vessel_data=$this->BunkerSupply_model->get_vessel_details_by_vessel_id($vessel_id);
    	$vessel_name=$vessel_data[0]['vessel_name'];  

           $date_of_supply = $this->input->post('date_of_supply');  
			$port_of_supply = $this->input->post('port_of_supply');  
			$suppliers = $this->input->post('suppliers');
			$due_date = $this->input->post('due_date');
			$mdo = $this->input->post('mdo');
			$hfo = $this->input->post('hfo');
			$luboil_1_type = $this->input->post('luboil_1_type');
			$luboil_1_quantity = $this->input->post('luboil_1_quantity');
			$luboil_2_type = $this->input->post('luboil_2_type');
			$luboil_2_quantity= $this->input->post('luboil_2_quantity');
			$others = $this->input->post('others');
			$remarks = $this->input->post('remarks');
			$reminder = $this->input->post('reminder');
			$invoice_amount = $this->input->post('invoice_amount');
			$invoice_num = $this->input->post('invoice_num');
			$currency = $this->input->post('currency');
			$paid = $this->input->post('paid');
			$paid_date = $this->input->post('paid_date');


               $supply_date=str_replace("/", "-", $date_of_supply); 
               $supply_date=date("Y-m-d",strtotime($supply_date)); 
               
               if($due_date!='')
               {
               $date_due=str_replace("/", "-", $due_date);
               $date_due=date("Y-m-d",strtotime($date_due));
               }
			   else
			   {
			   	$date_due='';
			   }
			 $directory_name = '../LyndonMarineImages/BunkerSupplyDocuments/'.$vessel_name; 

           if(!is_dir($directory_name))
               {
                 mkdir($directory_name);
                
                }
            
                 /* Upload Bunker Supply Invoice */

          $base_url_website = BUNKER_SUPPLY_BASE_URL ; 	
          
          for($i=1;$i<=2;$i++)
            {
                
                    if ($_FILES["document".$i]["name"] != NULL)
                         {
                             $target_file = $directory_name.'/'.  basename($_FILES['document'.$i]['name']); 
                             move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
                             $document[$i] = $base_url_website.'/'.$vessel_name.'/'.$_FILES["document".$i]["name"];  

                         }
                     else
                         {
                             $document[$i] ="";
                         }

            }

    	
                $this->load->model('BunkerSupply_model');
                $data = array(
                	'vessel_id' => $vessel_id,
					'date_of_supply' => $supply_date,
					'suppliers' => $suppliers,
					'port_of_supply' => $port_of_supply,
					'mdo' => $mdo,
					'hfo' => $hfo,
					'luboil_1_type' => $luboil_1_type,
					'luboil_1_quantity' => $luboil_1_quantity,
					'luboil_2_type' => $luboil_2_type,
					'luboil_2_quantity' => $luboil_2_quantity,
					'others' => $others,
					'remarks' => $remarks,
					'reminder' => $reminder,
					'due_date' => $date_due,
					'invoice_amount' => $invoice_amount,
					'invoice_num' => $invoice_num,
					'currency' => $currency,
					'document1' => $document[1],
					'document2' => $document[2],
					'paid' => $paid,
					'paid_date'=>$paid_date
					);
 				$insert=$this->BunkerSupply_model->add_bunker_supply($data);
 				
			$base_url = BASE_URL;
            //header("Location: $base_url/index.php/VesselRecommendation/index");
            header("Location: $base_url/index.php/VesselBunkerSupply/index/$vessel_id");
	}	

}
?>