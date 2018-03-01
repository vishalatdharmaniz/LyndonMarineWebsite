<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditRecommendation extends CI_Controller 
{
public function index($recommendation_id)
	{
		$this->load->Model('Recommendation_model');
		$recommendation_data=$this->Recommendation_model->get_certificate_data($recommendation_id);
	    $data['recommendation_data'] = $recommendation_data;
	    $data['recommendation_id'] = $recommendation_id;
	    
	  /*  
	  var_dump($recommendation_type);*/
	 $this->load->view('LyndonMarine/EditRecommendation',$data);
    }
    public function edit_recommendation($recommendation_id)

    { 	
    	$this->load->Model('Recommendation_model');
        $recommendation_data=$this->Recommendation_model->get_certificate_data($recommendation_id); 

           $recommendation_id=$recommendation_data[0]['recommendation_id'];
           $vessel_id=$recommendation_data[0]['vessel_id'];
          $vessel_data=$this->Recommendation_model->get_vessel_details_by_vessel_id($vessel_id);
            $vessel_name=$vessel_data[0]['vessel_name']; 
     
        
        $recommendation_type = $_REQUEST['recommendation_type'];
       	$recommendation_date= $_REQUEST['recommendation_date']; 
        $due_date=$_REQUEST['due_date'];
    	$description=$_REQUEST['description'];                  
    	$rectified_status=$_REQUEST['rectified_status'];
    	$rectified_date=$_REQUEST['rectified_date'];            
    	$rectified_by=$_REQUEST['rectified_by']; 
        $reminder=$_REQUEST['reminder'];

         $directory_name = '../LyndonMarineImages/VesselImages/'.$vessel_name;
       
        if(!is_dir($directory_name))
            {
                mkdir($directory_name);
                
            }

        $target_dir = TARGET_DIR;

                 /* Upload Recommendation Images */

      $base_url_website = VESSEL_RECOMMENDATION_BASE_URL ; 

            for($i=1;$i<=3;$i++)
            {
                if ($_REQUEST['image'.$i.'-removed'] == '1')
                {
                    $image[$i] = '';
                }
                else
                    {
                    if ($_FILES["image".$i]["name"] != NULL)
                         {
                             $target_file = $directory_name.'/'.basename($_FILES['image'.$i]['name']); 
                           move_uploaded_file($_FILES['image'. $i]['tmp_name'], $target_file);
                             $image[$i] = $base_url_website.'/'.$vessel_name.'/'. $_FILES["image".$i]["name"];  
                                      
                            
                         }
                     else
                         {
                             $image[$i] = $recommendation_data[0]["image".$i];
                         }
                }

            }
    	
      $this->load->Model('Update_model');
      $this->Update_model->Edit_Recommendation($recommendation_id,$recommendation_type,$recommendation_date,$due_date,$description,$rectified_status,$rectified_date,$rectified_by,$reminder,$image[1],$image[2],$image[3]) ;

      $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselRecommendation/index/$vessel_id"); 
    }
}    