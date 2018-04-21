<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AddVessel extends CI_Controller
{

	public function index()
	{
		$this->add_vessel();

	}

	
    function add_vessel()
    {
            $company_id = $this->session->userdata('company_id');
    		$vessel_name = $this->input->post('vessel_name');
			$imo_number = $this->input->post('imo_number');
            $flag = $this->input->post('flag');
            $class_no = $this->input->post('class_no');
            $grain = $this->input->post('grain');
            $bale = $this->input->post('bale');
            $dwt = $this->input->post('dwt');
            //$price_idea = $this->input->post('price_idea');
			$owner_name = $this->input->post('owner_name');
            $owner_address = $this->input->post('owner_address');
			$owner_email = $this->input->post('owner_email');
            $owner_contact_number = $this->input->post('owner_contact_number');
			$manager_name = $this->input->post('manager_name');
            $manager_address = $this->input->post('manager_address');
			$manager_email = $this->input->post('manager_email');
			$manager_contact_number = $this->input->post('manager_contact_number');
    		$agency = $this->input->post('agency');
            $agency_address = $this->input->post('agency_address');
            $agency_email = $this->input->post('agency_email');
            $agency_contact_number = $this->input->post('agency_contact_number');
            //$short_description = $this->input->post('short_description');
            $loa = $this->input->post('loa');
            //$currency = $this->input->post('currency');
            $year_built = $this->input->post('year_built');
            $vessel_breadth = $this->input->post('vessel_breadth');
            //$vessel_location = $this->input->post('vessel_location');
            $place_built = $this->input->post('place_built');
            $vessel_depth = $this->input->post('vessel_depth');
            $vessel_type = $this->input->post('vessel_type');
            $vessel_date = $this->input->post('vessel_date');
    		$role = $this->input->post('role');
            $status = $this->input->post('status');
            $full_description = $this->input->post('full_description');
            $time = time();
     
            /*$grain = number_format($grain); 
            $bale = number_format($bale);
            $dwt = number_format($dwt);*/

            $vessel_date = str_replace('/', '-', $vessel_date);
            $vessel_date = date("Y-m-d", strtotime($vessel_date));

            $grain = str_replace(',','',$grain);
            $bale = str_replace(',','',$bale);
            $dwt = str_replace(',','',$dwt);

           $vesselfolder = '/VesselImages/';
            $directory_name = '../LyndonMarineImages/LyndonMarineVessels/'.$vessel_name;
            if(!is_dir($directory_name))
                {
                    mkdir($directory_name);
                }   
            
            $image_directory = $directory_name.$vesselfolder; //print_r($image_directory);die();
            if(!is_dir($image_directory))
                {
                    mkdir($image_directory);
                }
                     /* Upload Documents */
            $target_dir = TARGET_DIR;
            $image_base_url = VESSEL_IMAGES_BASE_URL.$vessel_name.$vesselfolder;
           
            for($i=1;$i<=5;$i++)
            {
                $target_file[$i] = $image_directory.'/'. basename($_FILES["image".$i]["name"]);
                $imageFileType[$i]= pathinfo($target_file[$i],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["image".$i]["tmp_name"], $target_file[$i]);
                if ($_REQUEST['image'.$i.'-removed'] == '1')
                {
                    $image[$i] = '';
                }
                else
                {
                    if ($_FILES["image".$i]["name"] != NULL)
                    {
                        $image[$i] =$image_base_url. $_FILES["image".$i]["name"];
                    }
                    else
                    {
                        $image[$i] = '';
                    }
                }
            }

                    /* Upload Documents */

   /*     $base_url_website = DOCUMENT_BASE_URL;

            for($i=1;$i<=5;$i++)
            {
                $target_file[$i] = $target_dir .'UploadedDocuments/'. basename($_FILES["document".$i]["name"]);
                $imageFileType[$i]= pathinfo($target_file[$i],PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["document".$i]["tmp_name"], $target_file[$i]);
                if ($_FILES["document".$i]["name"] != NULL)
                {
                    $document[$i] =$base_url_website. $_FILES["document".$i]["name"];
                }
                else
                {
                    $document[$i] ='';
                }
            }*/
        
    	$this->load->model('AddVessel_model');

    	$data = array(
                'company_id' => $company_id,
    			'vessel_name' => $vessel_name,
    			'imo_number' => $imo_number,
                'flag' => $flag,
                'class_no' => $class_no,
                'grain' => $grain,
                'bale' => $bale,
                'dwt' => $dwt,
                //'price_idea' => $price_idea,
    			'owner_name' => $owner_name,
                'owner_address' => $owner_address,
    			'owner_email' => $owner_email,
                'owner_contact_number' => $owner_contact_number,
    			'manager_name' => $manager_name,
                'manager_address' => $manager_address,
    			'manager_email' => $manager_email,
    			'manager_contact_number' => $manager_contact_number,
    			'agency' => $agency,
                'agency_address' => $agency_address,
                'agency_email' => $agency_email,
                'agency_contact_number' => $agency_contact_number,
                'loa' => $loa,
                //'short_description' =>$short_description,
                //'currency' => $currency,
                'year_built' =>$year_built,
                'vessel_breadth' => $vessel_breadth,
                //'vessel_location' => $vessel_location,
                'place_built'=> $place_built,
                'vessel_depth' => $vessel_depth,
                'vessel_type' => $vessel_type,
                'vessel_date' => $vessel_date,
    			'role' => $role,
                'status' => $status,
                'full_description'=>$full_description,
                'time' => $time,
    			'image1' => $image[1],
                'image2' => $image[2],
                'image3' => $image[3],
                'image4' => $image[4],
                'image5' => $image[5]
    		);
            
    

	    	$this->AddVessel_model->add_vessel($data);


	    	$message = 'Your data Successfully saved!';
			$data['message']= $message;
	    	
    	       $base_url = BASE_URL;
                //header("Location: $base_url/index.php/AllVessels/index"); 
                header("Location: $base_url/index.php/AllVessels/company_vessel/$company_id"); 
    }

    function get_all_vessel_data()
    {
        $this->load->model('Vessel_model');

        $all_vessel_details = $this->Vessel_model->get_all_vessel_details();
        return $all_vessel_details;
    }
}

?>