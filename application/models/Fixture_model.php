<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fixture_model extends CI_Model
{
	function __construct(){
        parent::__construct();
        $this->fixture_table = "vessel_fixtures";
    }
	
	function add($data)
	{
		$this->db->insert('vessel_fixtures',$data);
		return true;
	}
	
	public function get_data($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '', $num = '', $offset='', $orderby='', $orderbyfield='', $and_match_value='',$start_date = "", $last_date = ""){
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->fixture_table;
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
		
		
		
		
		if(!empty($start_date)&&!empty($last_date)){
			$start_date = "'".$start_date."'";
			$last_date = "'".$last_date."'";
			if(!empty($where)){
				$where .= "and DATE(fixture_date) BETWEEN ".$start_date." and ".$last_date;	
			}else{
				$where .= " WHERE DATE(fixture_date) BETWEEN ".$start_date." and ".$last_date;
			}
		}elseif(!empty($start_date)){
			
			$start_date = "'".$start_date."'";
			if(!empty($where)){
				$where .= "and DATE(fixture_date) >= ".$start_date;	
			}else{
				$where .= " WHERE DATE(fixture_date) >= ".$start_date;
			}
		}elseif(!empty($last_date)){
			
			$last_date = "'".$last_date."'";
			if(!empty($where)){
				$where .= "and DATE(fixture_date) <= ".$last_date;	
			}else{
				$where .= " WHERE DATE(fixture_date) <= ".$last_date;
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
        
        $query = ($count) ? 'SELECT count(*) FROM '.$this->fixture_table.' '.$where.' '.$and_condition.$orderby : $sql;
		//echo  $query;die;
        $query = $this->db->query($query);
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
	
	public function total($vessel_id){
		$query = $this->db->where('vessel_id',$vessel_id);
		$query = $this->db->count_all_results($this->fixture_table);
		return $query;
	}
	
	public function delete($id,$vessel_id){
		$this->db->where('id',$id);
		$this->db->where('vessel_id',$vessel_id);
        $query = $this->db->delete($this->fixture_table);            
        return $query;
	}
	
	public function get_by_id($id,$vessel_id){
		$this->db->where("id",$id);
		$this->db->where("vessel_id",$vessel_id);
		 $this->db->from($this->fixture_table);
		 $query = $this->db->get();
        $result = $query->result_array();		
		return $result;
	}
	
	public function fixture_data_by_vessel_id($vessel_id)
	{
		$fixture_data=$this->db->query("SELECT * FROM vessel_fixtures WHERE vessel_id='$vessel_id' ");
		return $fixture_data->result_array();
	}
	public function fixture_data_by_fixture_id($id)
	{
		$fixture_data=$this->db->query("SELECT * FROM vessel_fixtures WHERE id='$id' ");
		return $fixture_data->result_array();
	}
	public function update_fixture($data,$id,$vessel_id)
    {
        $this->db->where('id',$id);
		$this->db->where('vessel_id',$vessel_id);
        $query = $this->db->update($this->fixture_table,$data); 
        //echo $this->db->last_query();exit;
        return $query;
    }
	
	public function total_record($search,$vessel_id,$search_critria){
		$this->db->select("*");
		$this->db->from($this->fixture_table);
		$this->db->where('vessel_id',$vessel_id);
		$this->db->like($search_critria,$search,'both'); 
		$query = $this->db->get();
		$result = $query->num_rows(); 
        //$result = $query->result();		
		return $result;
	}
	
	public function get_vessel_name($vessel_id){
		$this->db->select('vessel_id,vessel_name');
		$this->db->where("vessel_id",$vessel_id);
		 $this->db->from("vessels");
		 $query = $this->db->get();
        $result = $query->result_array();		
		return $result;	
	}
	
}

?>