<?php
class DeleteVesselModel extends CI_Model 
{   
    public function delete_vessel_by_vessel_id($vessel_id,$user_id)
    {
        $this->db->query("DELETE FROM vessels WHERE vessel_id = '$vessel_id' AND user_id='$user_id'");
    }
    
}
?>