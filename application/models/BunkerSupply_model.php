<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BunkerSupply_model extends CI_Model
{  
	function add_bunker_supply($data)
	{
		$this->db->insert('bunker_supply',$data);

		return true;
	}

	function get_bunker_supply_data($bunker_id)
	{
		$bunker_supply_data = $this->db->query("SELECT * FROM bunker_supply WHERE bunker_id='$bunker_id'");
		return $bunker_supply_data->result_array();
	}
	
	function get_bunker_supply_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM bunker_supply WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}
	function get_vessel_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM vessels WHERE vessel_id='$vessel_id'");
		return $details_by_vessel_id->result_array();
	}
	function delete_buker_supply_by_bunker_id($bunker_id)
	{
		$delete_bunker_supply=$this->db->query("DELETE FROM bunker_supply WHERE bunker_id='$bunker_id' ");
	}

	function searchtable($searchname,$vessel_id,$offset)
    {

        $searchdata = $this->db->query("SELECT * FROM bunker_supply WHERE ((suppliers LIKE '%$searchname%') OR (port_of_supply LIKE '%$searchname%')) AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}

	function searchtable_total($searchname,$vessel_id)
    {

        $searchtable_total = $this->db->query("SELECT * FROM bunker_supply WHERE ((suppliers LIKE '%$searchname%') OR (port_of_supply LIKE '%$searchname%')) AND (vessel_id='$vessel_id')");
			return COUNT($searchtable_total->result_array());
	}
	
	public function update_bunker_supply($bunker_id,$supply_date,$suppliers,$port_of_supply,$mdo,$hfo,$luboil_1_type,$luboil_1_quantity,$luboil_2_type,$luboil_2_quantity,$others,$remarks,$reminder,$date_due,$invoice_amount,$currency,$document1,$document2,$paid,$paid_date)
	{
              $this->db->query("UPDATE bunker_supply SET date_of_supply='$supply_date' ,suppliers='$suppliers'                                      ,due_date='$date_due',port_of_supply='$port_of_supply',mdo='$mdo',
									                     hfo='$hfo',luboil_1_type='$luboil_1_type',reminder='$reminder',
									                     luboil_1_quantity='$luboil_1_quantity',luboil_2_type='$luboil_2_type',
									                     luboil_2_quantity='$luboil_2_quantity',others='$others',remarks='$remarks',
									                     invoice_amount='$invoice_amount',currency='$currency',document1='$document1',
									                     document2='$document2',paid='$paid',paid_date='$paid_date'	
									                     WHERE bunker_id='$bunker_id' ");
             return true;
	}
	public function get_all_bunker_supply_data_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM bunker_supply WHERE vessel_id='$vessel_id' LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

	public function get_total_bunker($vessel_id)
    {
        $count_bunker = $this->db->query("SELECT * FROM bunker_supply WHERE vessel_id = '$vessel_id'");
        return COUNT($count_bunker->result_array());
    }
     function search_by_supplier_type($searchtype,$vessel_id,$offset)
    {
        $searchdata = $this->db->query("SELECT * FROM bunker_supply WHERE (suppliers LIKE '$searchtype') AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}
	function search_total_supplier_type($searchtype,$vessel_id)
    {
        $searchdata = $this->db->query("SELECT * FROM bunker_supply WHERE (suppliers LIKE '$searchtype') AND (vessel_id='$vessel_id')");
			return COUNT($searchdata->result_array());
	}

 public function getSheetLog($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='',$orderbyfield='',$and_match_value='', $custom_code = "", $start_date = "", $last_date = "", $vessel_id)
    {
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM bunker_supply';
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
					$where .=	" WHERE ( due_date <= CURDATE()+ INTERVAL 5 day ) AND vessel_id= '$vessel_id'";	
				}else{
					$where .=	" IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date < CURDATE()+ INTERVAL 5 day ) AND vessel_id= '$vessel_id'";
			  }
					
		    }
		   
		     if($custom_code == "green")
			  {
				if(empty($where))
				{
					$where .=	" WHERE (due_date > CURDATE()+ INTERVAL 5 day AND due_date > date_of_supply AND paid='No') AND vessel_id= '$vessel_id'";	
				}
				else
				{
					$where .=	" IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date > CURDATE()+ INTERVAL 5 day AND UNIX_TIMESTAMP(`date_of_supply`) <>0,due_date > date_of_supply AND paid='No' ) AND vessel_id= '$vessel_id'"; 
				}
					
			}

			
			if($custom_code == "blue")
			{
				if(empty($where))
				{
					$where .=	"  WHERE paid ='Yes' AND vessel_id= '$vessel_id' ";	
				}else{
					$where .=	" paid ='Yes' AND vessel_id= '$vessel_id'";
				}
			 }
			
	   }
		
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by bunker_id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
			$sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM bunker_supply'.$where.' '.$and_condition.$orderby : $sql;
		//echo $query;echo "</br>";
        $query = $this->db->query($query);
		
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }


}
?>
