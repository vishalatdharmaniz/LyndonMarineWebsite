<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recommendation_model extends CI_Model
{	
	
	function add_recommendation($data)
	{
		$this->db->insert('recommendation',$data);

		return true;
	}
	
	function get_recommendation_data($recommendation_id)
	{
		/*var_dump($recommendation_id);*/
		$recommendation_data = $this->db->query("SELECT * FROM recommendation WHERE recommendation_id='$recommendation_id'");
		return $recommendation_data->result_array();
	}

	function get_all_recommendation_details()
	{
		$get_all_recommendation_details = $this->db->query("SELECT * FROM recommendation");
		return $get_all_recommendation_details->result_array();
	}

	function get_recommendation_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM recommendation WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}

	function get_vessel_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}

	function delete_recommendation_by_recommendation_id($recommendation_id)
	{
		$delete_recommendation=$this->db->query("DELETE FROM recommendation WHERE recommendation_id='$recommendation_id' ");
	}
	public function get_all_recommendation_data_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM recommendation WHERE vessel_id='$vessel_id' LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

	public function get_total_recommendation($vessel_id)
    {
        $count_recommendation = $this->db->query("SELECT * FROM recommendation WHERE vessel_id = '$vessel_id'");
        return COUNT($count_recommendation->result_array());
    }
    function search_by_recommendation_type($searchtype,$vessel_id,$offset)
    {
        $searchdata = $this->db->query("SELECT * FROM recommendation WHERE (recommendation_type LIKE '$searchtype') AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}
	function search_total_recommendation_type($searchtype,$vessel_id)
    {
        $searchdata = $this->db->query("SELECT * FROM recommendation WHERE (recommendation_type LIKE '$searchtype') AND (vessel_id='$vessel_id')");
			return COUNT($searchdata->result_array());
	}
 public function getSheetLog($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='',$orderbyfield='',$and_match_value='', $custom_code = "", $start_date = "", $last_date = "", $vessel_id)
    {
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM recommendation';
        $where='';
        $and_condition='';
		
        if($match_values){
            $keys = array_keys($match_values);
            $compare_type = $compare_type ? $compare_type : 'like';
            if($condition!='')
                $and_or = $condition;
            else 
                $and_or = ($compare_type == 'like') ? ' OR ' : ' AND '; 
          
            $where = 'WHERE ';
			if($and_match_value){
				$where .= '(';
			}
			
            switch ($compare_type){
                case 'like':
                    $where .= $keys[0].' '.$compare_type .'"%'.$match_values[$keys[0]].'%" ';
                    break;

                case '=':
                default:
                    $where .= $keys[0].' '.$compare_type .'"'.$match_values[$keys[0]].'" ';
                    break;
            }
			//echo $custom_code;
			if(!empty($custom_code)){
				if(empty($where)){
					$where .= "where".$custom_code;
				}else{
					$where .= " and (".$custom_code.")";
				}
			}
            $match_values = array_slice($match_values, 1);
            
            foreach($match_values as $key => $value){                
                $where .= $and_or.' '.$key.' ';
                switch ($compare_type){
                    case 'like':
                        $where .= $compare_type .'"%'.$value.'%"';
                        break;
                    
                    case '=':
                    default:
                        $where .= $compare_type .'"'.$value.'"';
                        break;
                }
            }
			
			if($and_match_value){
				foreach($and_match_value as $key=>$value){                
					$and_condition .= "AND"." ".$key."="."'".$value."'";
					$where .= ')';
				}
			} 
		}  
	
			if(!empty($custom_code))
			{
			  if($custom_code == "red")
			  {
				if(empty($where)){
					$where .=	" WHERE ( due_date <= CURDATE()+ INTERVAL 10 day  AND rectified_status='No') AND vessel_id= '$vessel_id'";	
				}else{
					$where .=	" IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date < CURDATE()+ INTERVAL 10 day ) AND vessel_id= '$vessel_id'";
			  }
					
		    }
		   
		     if($custom_code == "green")
			  {
				if(empty($where))
				{
					$where .=	" WHERE (due_date > CURDATE()+ INTERVAL 10 day AND due_date > recommendation_date AND rectified_status='No') AND vessel_id= '$vessel_id'";	
				}
				else
				{
					$where .=	" IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date > CURDATE()+ INTERVAL 10 day AND UNIX_TIMESTAMP(`recommendation_date`) <>0,due_date > recommendation_date AND rectified_status='No' ) AND vessel_id= '$vessel_id'"; 
				}
					
			}

			
			if($custom_code == "blue")
			{
				if(empty($where))
				{
					$where .=	"  WHERE rectified_status ='Yes' AND vessel_id= '$vessel_id' ";	
				}else{
					$where .=	" rectified_status ='Yes' AND vessel_id= '$vessel_id'";
				}
			 }
			
	   }
		
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by recommendation_id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
			$sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM recommendation'.$where.' '.$and_condition.$orderby : $sql;
		//echo $query;echo "</br>";
        $query = $this->db->query($query);
		
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
}



?>