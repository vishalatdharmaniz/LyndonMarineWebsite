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
        
        $data['recommendation_id']=$recommendation_id;
        $vessel_id = $recommendation_data[0]['vessel_id'];

    	$recommendation_date=$_REQUEST['recommendation_date']; 
        $due_date=$_REQUEST['due_date'];
    	$description=$_REQUEST['description'];                  
    	$rectified_status=$_REQUEST['rectified_status'];
    	$rectified_date=$_REQUEST['rectified_date'];            
    	$rectified_by=$_REQUEST['rectified_by'];
        $recommendation_type=$_REQUEST['recommendation_type'];  
        $reminder=$_REQUEST['reminder'];

         $directory_name = '../LyndonMarineImages/VesselRecommendation/'.$recommendation_type;
        
      
        if(!is_dir($directory_name))
            {
                mkdir($directory_name);
                
            }

        $target_dir = TARGET_DIR;

 
                 /* Upload Recommendation Images */

        $base_url_website = RECOMMENDATION_BASE_URL.'/'.$recommendation_type.'/';
        /*print_r($base_url_website);
        die();*/
        
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
                             $target_file = $directory_name.'/'.  basename($_FILES['image'.$i]['name']);
                             move_uploaded_file($_FILES['image'. $i]['tmp_name'], $target_file);
                             $image[$i] = $base_url_website. $_FILES["image".$i]["name"];  

                         }
                     else
                         {
                             $image[$i] = $recommendation_type[0]["image".$i];
                         }
                }

            }
    	
      $this->load->Model('Update_model');
      $values=$this->Update_model->Edit_Recommendation($recommendation_id,$recommendation_type,$recommendation_date,$due_date,$description,$rectified_status,$rectified_date,$rectified_by,$reminder,$image[1],$image[2],$image[3]) ;

      $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselRecommendation/index/$vessel_id"); 
    }
}    