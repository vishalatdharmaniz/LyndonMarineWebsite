<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditBunkerSupply extends CI_Controller 
{

	public function index($bunker_id)
	{
		$this->load->model('BunkerSupply_model');
    	$bunker_supply_data = $this->BunkerSupply_model->get_bunker_supply_data($bunker_id);
      $vessel_id=$bunker_supply_data[0]['vessel_id'];
    	$data['bunker_supply_data'] = $bunker_supply_data; 
      $data['vessel_id']=$vessel_id; 
    	$data['bunker_id']=$bunker_id; 
    	$this->load->view('LyndonMarine/EditBunkerSupply',$data);
	}

	public function Edit($bunker_id)

    { 	
    	$this->load->Model('BunkerSupply_model');
        $bunker_supply_data=$this->BunkerSupply_model->get_bunker_supply_data($bunker_id); 

           $bunker_id=$bunker_supply_data[0]['bunker_id'];
           $vessel_id=$bunker_supply_data[0]['vessel_id'];
          $vessel_data=$this->BunkerSupply_model->get_vessel_details_by_vessel_id($vessel_id);
            $vessel_name=$vessel_data[0]['vessel_name']; 
     
        $date_of_supply = $_REQUEST['date_of_supply'];  
			  $port_of_supply = $_REQUEST['port_of_supply'];  
		  	$suppliers = $_REQUEST['suppliers'];
		  	$due_date = $_REQUEST['due_date'];
		  	$mdo = $_REQUEST['mdo'];
			  $hfo = $_REQUEST['hfo'];
  			$luboil_1_type = $_REQUEST['luboil_1_type'];
  			$luboil_1_quantity = $_REQUEST['luboil_1_quantity'];
  			$luboil_2_type = $_REQUEST['luboil_2_type'];
  			$luboil_2_quantity= $_REQUEST['luboil_2_quantity'];
  			$others = $_REQUEST['others'];
  			$remarks = $_REQUEST['remarks'];
  			$reminder = $_REQUEST['reminder'];
        $invoice_amount = $_REQUEST['invoice_amount'];
  			$invoice_num = $_REQUEST['invoice_num'];
  			$currency = $_REQUEST['currency'];
  			$paid = $_REQUEST['paid'];
  			$paid_date = $_REQUEST['paid_date'];
		          


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
                if ($_REQUEST['document'.$i.'-removed'] == '1')
                {
                    $document[$i] = '';
                }
                else
                   {
                
                    if ($_FILES["document".$i]["name"] != NULL)
                         {
                             $target_file = $directory_name.'/'.  basename($_FILES['document'.$i]['name']); 
                             move_uploaded_file($_FILES['document'. $i]['tmp_name'], $target_file);
                             $document[$i] = $base_url_website.'/'.$vessel_name.'/'.$_FILES["document".$i]["name"];  

                         }
                     else
                         {
                             $document[$i] =$bunker_supply_data[0]["document".$i];
                         }
                    }     

              }


 				$update=$this->BunkerSupply_model->update_bunker_supply($bunker_id,$supply_date,$suppliers,$port_of_supply,$mdo,$hfo,$luboil_1_type,$luboil_1_quantity,$luboil_2_type,$luboil_2_quantity,$others,$remarks,$reminder,$date_due,$invoice_amount,$invoice_num,$currency,$document[1],$document[2],$paid,$paid_date);
 				
			$base_url = BASE_URL;
            //header("Location: $base_url/index.php/VesselRecommendation/index");
            header("Location: $base_url/index.php/VesselBunkerSupply/index/$vessel_id");
	}	
}    
?>