<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Survey_model extends CI_Model
{
	function __construct(){
        parent::__construct();
        $this->survey_table = "survey";
    }
	
	function add($data)
	{
		
		$this->db->insert('survey',$data);

		return true;
	}
	
	public function get_data($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '', $num = '', $offset='', $orderby='', $orderbyfield='', $and_match_value=''){
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->survey_table;
        $where='';
        $and_condition='';
		//print_r($match_values);die;
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
			
            $match_values = array_slice($match_values, 1);
            //print_r($match_values);die;
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
		//echo $orderby;
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
			$sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM '.$this->survey_table.' '.$where.' '.$and_condition.$orderby : $sql;
		//echo  $query;die;
        $query = $this->db->query($query);
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
	public function total(){
		$query = $this->db->count_all_results($this->survey_table);
		return $query;
	}
	
	public function delete($id,$vessel_id){
		$this->db->where('id',$id);
		$this->db->where('vessel_id',$vessel_id);
        $query = $this->db->delete($this->survey_table);            
        return $query;
	}
	
	public function get_survey_info($id,$vessel_id){
		$this->db->where("id",$id);
		$this->db->where("vessel_id",$vessel_id);
		 $this->db->from($this->survey_table);
		 $query = $this->db->get();
        $result = $query->result();		
		return $result;
	}
	
	public function update_survey($data,$id,$vessel_id)
    {
        $this->db->where('id',$id);
		$this->db->where('vessel_id',$vessel_id);
        $query = $this->db->update($this->survey_table,$data); 
        //echo $this->db->last_query();exit;
        return $query;
    }
	
	public function total_record($search){
		$this->db->select("*");
		$this->db->from($this->survey_table);
		//$this->db->where('key',$key);
		$this->db->like('survey_no',$search,'both'); 
		$query = $this->db->get();
		$result = $query->num_rows(); 
        //$result = $query->result();		
		return $result;
	}
	
	
	public function getSheetLog($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='',$orderbyfield='',$and_match_value='', $custom_code = "", $start_date = "", $last_date = "")
    {
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->survey_table;
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
					$where .=	" WHERE IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_to < CURDATE() and UNIX_TIMESTAMP(`range_to`) <>0,due_date < CURDATE() )";	
				}else{
					$where .=	" IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_to < CURDATE() and UNIX_TIMESTAMP(`range_to`) <>0,due_date < CURDATE() )";
				}
					
			}
			if($custom_code == "green"){
				if(empty($where)){
					$where .=	"  WHERE IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_from > CURRENT_DATE() + INTERVAL 30 DAY,due_date > CURRENT_DATE() + INTERVAL 30 DAY )";	
				}else{
					$where .=	"  IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_from > CURRENT_DATE() + INTERVAL 30 DAY,due_date > CURRENT_DATE() + INTERVAL 30 DAY )";
				}
			}
			 
			if($custom_code == "yellow"){
				if(empty($where)){
					$where .=	" WHERE  IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_from < CURRENT_DATE() + INTERVAL 30 DAY AND range_to > CURDATE(),due_date <= CURRENT_DATE() + INTERVAL 30 DAY AND due_date > CURDATE())";	
				}else{
					$where .=	"  IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_from < CURRENT_DATE() + INTERVAL 30 DAY AND range_to > CURDATE(),due_date <= CURRENT_DATE() + INTERVAL 30 DAY AND due_date > CURDATE())";
				}
			}
			
		}
		if(!empty($start_date)&&!empty($last_date)){
			$start_date = "'".$start_date."'";
			$last_date = "'".$last_date."'";
			if($custom_code == "red"){
				$where .=	"range_to < CURDATE()";	
			}
			
		    //$where .= "and DATE(created) BETWEEN".$start_date."and".$last_date;
		}
		//echo $orderby;
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
			$sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM '.$this->survey_table.' '.$where.' '.$and_condition.$orderby : $sql;
		//echo $query;echo "</br>";
        $query = $this->db->query($query);
		
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
	
	
	public function red($vessel_id){
		$query = "SELECT * FROM survey WHERE IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_to < CURDATE() and UNIX_TIMESTAMP(`range_to`) <>0,due_date < CURDATE() ) AND vessel_id = $vessel_id";
		$query = $this->db->query($query);	
		return $query->result_array();
	}
	
	public function green($vessel_id){
		$query = "SELECT * FROM survey WHERE IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_from > CURRENT_DATE() + INTERVAL 30 DAY,due_date > CURRENT_DATE() + INTERVAL 30 DAY ) AND vessel_id = $vessel_id";
		$query = $this->db->query($query);	
		return $query->result_array();
	}
	
	public function yellow($vessel_id){
		$query = "SELECT * FROM survey WHERE  IF( UNIX_TIMESTAMP(`range_to`) <>0 ,range_from <= CURRENT_DATE() + INTERVAL 30 DAY AND range_to >= CURDATE(),due_date <= CURRENT_DATE() + INTERVAL 30 DAY AND due_date >= CURDATE()) AND vessel_id = $vessel_id";
		$query = $this->db->query($query);	
		return $query->result_array();
	}
}

?>