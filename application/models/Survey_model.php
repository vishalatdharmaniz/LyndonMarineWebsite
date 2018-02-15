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
	
	public function delete($id){
		$this->db->where('id',$id);
        $query = $this->db->delete($this->survey_table);            
        return $query;
	}
	
	public function get_survey_info($id){
		$this->db->where("id",$id);
		 $this->db->from($this->survey_table);
		 $query = $this->db->get();
        $result = $query->result();		
		return $result;
	}
	
	public function update_survey($data,$id)
    {
        $this->db->where('id',$id);
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
}

?>