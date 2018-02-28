<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DeleteRecommendation extends CI_Controller
{	

public function index($recommendation_id,$vessel_id)
{
	$this->load->Model('Recommendation_model');
	$DeleteRecommendation=$this->Recommendation_model->delete_recommendation_by_recommendation_id($recommendation_id);

	 $base_url = BASE_URL;
                header("Location: $base_url/index.php/VesselRecommendation/index/$vessel_id");
}

}