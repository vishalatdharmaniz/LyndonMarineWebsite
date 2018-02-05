<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller
{
   public function vesseldata()
   {

       $this->load->model("Pagination_model");
 
       $this->load->library("pagination");
 
       $config = array();

       $config["base_url"] = base_url() . "index.php/Pagination/vesseldata";
       $config["total_rows"] = $this->Pagination_model->record_count();
 
       $config["per_page"] = 5;
 
       $config["uri_segment"] = 2;
 
       $this->pagination->initialize($config);
 
       $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
       $data["results"] = $this->Pagination_model->fetch_vessels($config["per_page"], $page);
 
       $data["links"] = $this->pagination->create_links();

       $this->load->view("LyndonMarine/all_vessel", $data);
       //$base_url = BASE_URL;
       //header("Location: $base_url/index.php/AllVessels/user_vessel/$user_id");
   }
}
