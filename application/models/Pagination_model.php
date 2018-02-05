<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination_model extends CI_Model
 
{

   public function record_count($user_id) {
 
      //return $this->db->count_all("vessels");
      $result = $this->db->query("SELECT count(*) as c FROM vessels WHERE user_id='$user_id'");
    $row = $result->row_array();
    return $row['c'];
       
   }
 
 
 
   public function fetch_vessels($limit, $start)
   {
 
       $this->db->limit($limit, $start);
 
       $query = $this->db->get("vessels");
 
 
 
       if ($query->num_rows() > 0) {
 
           foreach ($query->result() as $row) {
 
               $data[] = $row;
 
           }
 
           return $data;
 
       }
 
       return false;
 
   }
 
}