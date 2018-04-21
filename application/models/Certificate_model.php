<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends CI_Model
{	
	function __construct(){
        parent::__construct();
        $this->certificate_table = "certificate";
    }
	function add_certificate($data)
	{
		$this->db->insert('certificate',$data);

		return true;
	}
	
	function get_certificate_data($certificate_id)
	{

		$certificate_data = $this->db->query("SELECT * FROM certificate WHERE certificate_id='$certificate_id'");
		return $certificate_data->result_array();
	}

	function get_all_certificate_details()
	{
		$get_all_certificate_details = $this->db->query("SELECT * FROM certificate WHERE 1 ORDER BY UNIX_TIMESTAMP(date_issue) DESC, `time` DESC");
		return $get_all_certificate_details->result_array();
	}

	function get_certificates_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM certificate WHERE vessel_id='$vessel_id' ");
		return $details_by_vessel_id->result_array();
	}

	function get_certificate_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM certificate WHERE vessel_id='$vessel_id' ORDER BY certificate_name ASC ");
		return $details_by_vessel_id->result_array();
	}

	function get_certificate_details_by_certificate_id($certificate_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM certificate WHERE certificate_id='$certificate_id'");
		return $details_by_vessel_id->result_array();
	}

	public function delete_certificate_by_vessel_id($vessel_id)
    {
        $this->db->query("DELETE FROM certificate WHERE  vessel_id='$vessel_id'");
    }

    public function delete_certificate_by_certificate_id($certificate_id)
    {
        $this->db->query("DELETE FROM certificate WHERE  certificate_id='$certificate_id'");
    }
    
    function searchtable($searchname,$vessel_id,$offset)
    {

        $searchdata = $this->db->query("SELECT * FROM certificate WHERE ((certificate_no LIKE '%$searchname%') OR (certificate_name LIKE '%$searchname%')) AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}
	
	function searchtable_total($searchname,$vessel_id)
    {
        $searchtable_total = $this->db->query("SELECT * FROM certificate WHERE ((certificate_no LIKE '%$searchname%') OR (certificate_name LIKE '%$searchname%')) AND (vessel_id='$vessel_id')");
			return COUNT($searchtable_total->result_array());
	}

	public function get_all_certificate_data_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM certificate WHERE vessel_id='$vessel_id' ORDER BY certificate_name ASC LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

	public function get_total_certificate($vessel_id)
    {
        $count_certificate = $this->db->query("SELECT * FROM certificate WHERE vessel_id = '$vessel_id'");
        return COUNT($count_certificate->result_array());
    }

    function search_by_certificate_type($searchtype,$vessel_id,$offset)
    {
        $searchdata = $this->db->query("SELECT * FROM certificate WHERE (certificate_type LIKE '$searchtype') AND (vessel_id='$vessel_id') LIMIT 10 OFFSET $offset");
			return $searchdata->result_array();
	}
	function search_total_certificate_type($searchtype,$vessel_id)
    {
        $searchdata = $this->db->query("SELECT * FROM certificate WHERE (certificate_type LIKE '$searchtype') AND (vessel_id='$vessel_id')");
			return COUNT($searchdata->result_array());
	}

	public function getSheetLog($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='',$orderbyfield='',$and_match_value='', $custom_code = "", $start_date = "", $last_date = "", $vessel_id)
    {
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM certificate';
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
		//echo $start_date;
		if(!empty($custom_code)){
			if($custom_code == "red"){
				if(empty($where)){
					$where .=	" WHERE ( 
								          (
								          	date_expiry <= CURDATE() + INTERVAL 1 day AND ( date_expiry!='' AND extention_until='' )
								          )
								           OR 
								           (
								           extention_until <= CURDATE() + INTERVAL 1 day AND (date_expiry!='' AND extention_until!='')
								           )
								         )
								          AND vessel_id='$vessel_id'";	
				}else{
					$where .=	" IF( UNIX_TIMESTAMP(`date_expiry`) <>0 ,date_expiry < CURDATE() and UNIX_TIMESTAMP(`date_expiry`) <>0,extention_until < CURDATE() ) AND vessel_id= '$vessel_id'";
				}
					
			}
			
			
			if($custom_code == "brown"){
				if(empty($where)){
					$where .=	"WHERE ((extention_until <= CURRENT_DATE() + INTERVAL 31 day AND extention_until > CURDATE() + INTERVAL 1 day AND extention_until!='' ) OR (date_expiry <= CURRENT_DATE() + INTERVAL 31 day AND date_expiry > CURDATE() + INTERVAL 1 day AND extention_until='')) AND vessel_id='$vessel_id'";	
				}else{
					$where .=	" IF( UNIX_TIMESTAMP(`date_expiry`) <>0 ,date_expiry <= CURRENT_DATE() + INTERVAL 1 MONTH AND date_expiry > CURDATE() AND (date_expiry!='' AND extention_until!='')) AND vessel_id='$vessel_id'";
				}
					
			}
			
			if($custom_code == "green"){
				if(empty($where)){
					$where .=	"  WHERE (date_expiry > CURRENT_DATE() + INTERVAL 46 day OR extention_until >CURRENT_DATE() + INTERVAL 46 day OR date_expiry='') AND vessel_id='$vessel_id'";	
				}else{
					$where .=	" IF( UNIX_TIMESTAMP(`date_expiry`) <>0 ,date_expiry > CURRENT_DATE() + INTERVAL 46 day or extention_until > CURRENT_DATE() + INTERVAL 46 day ) AND vessel_id= '$vessel_id'";
				}
			}
			 
			if($custom_code == "yellow"){
				if(empty($where)){
					$where .=	" WHERE  ( (date_expiry > CURRENT_DATE() + INTERVAL 32 day AND date_expiry <= CURRENT_DATE() + INTERVAL 46 day) OR (extention_until > CURRENT_DATE() + INTERVAL 32 day AND extention_until <= CURRENT_DATE() + INTERVAL 46 day)) AND vessel_id= '$vessel_id'";	
				}else{
					$where .=	"  IF( UNIX_TIMESTAMP(`date_expiry`) <>0 ,date_expiry > CURRENT_DATE() + INTERVAL 32 day AND date_expiry > CURDATE(),extention_until > CURRENT_DATE() + INTERVAL 32 day AND extention_until > CURDATE()) AND vessel_id= '$vessel_id'";
				}
			}

			if($custom_code == "all"){
				if(empty($where)){
					$where .=	"WHERE vessel_id='$vessel_id'";	
				}else{
					$where .=	" WHERE vessel_id='$vessel_id'";
				}
					
			}
			
		}
		// if(!empty($start_date)&&!empty($last_date)){
		// 	$start_date = "'".$start_date."'";
		// 	$last_date = "'".$last_date."'"; 
		// 	if($custom_code == "red"){
		// 		$where .=	"date_expiry < CURDATE()";	
		// 	}
			
		// }
		
		//echo $orderby;
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by certificate_id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
			$sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM certificate'.$where.' '.$and_condition.$orderby : $sql;
		//echo $query;echo "</br>";
        $query = $this->db->query($query);
		
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
}

?>