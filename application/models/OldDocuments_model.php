<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OldDocuments_model extends CI_Model
{  
	function add_old_documents($data)
	{
		$this->db->insert('Old_documents',$data);

		return true;
	}
	function get_document_data($document_id)
	{
		$old_documents_data = $this->db->query("SELECT * FROM Old_documents WHERE document_id='$document_id'");
		return $old_documents_data->result_array();
	}
	
	function get_document_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM Old_documents WHERE vessel_id='$vessel_id' ORDER BY document_id ASC");
		return $details_by_vessel_id->result_array();
	}

    function get_all_documents_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM Old_documents WHERE vessel_id='$vessel_id' ORDER BY document_id ASC LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

    function get_total_documents($vessel_id)
    {
        $count_documents = $this->db->query("SELECT * FROM Old_documents WHERE vessel_id = '$vessel_id'");
        return COUNT($count_documents->result_array());
    }
   function update_documents($document_id,$document_name,$description,$document1,$document2)
   {
   	$update_query=$this->db->query("UPDATE Old_documents SET name='$document_name',description='$description',document1='$document1',document2='$document2' WHERE document_id='$document_id' ");
   	return $update_query;
   }
   public function delete_documents_by_document_id($document_id)
    {
        $this->db->query("DELETE FROM Old_documents WHERE  document_id='$document_id'");
    }


}//class end.


