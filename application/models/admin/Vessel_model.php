<?php
class Vessel_model extends CI_Model
{
	function __construct(){
        parent::__construct();
        $this->vessel = "vessels";
    }
	
	public function get_data($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '', $num = '', $offset='', $orderby='', $orderbyfield='', $and_match_value=''){
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->vessel;
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
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by vessel_id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
			$sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) as total FROM '.$this->vessel.' '.$where.' '.$and_condition.$orderby : $sql;
		//echo  $query;die;
        $query = $this->db->query($query);
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
	
	public function get_vessel($id){
		$this->db->where("vessel_id",$id);
		 $this->db->from($this->vessel);
		 $query = $this->db->get();
        $result = $query->result_array();		
		return $result;	
	}
	
	public function delete_record($id){
		$this->db->where('id',$id);
        $query = $this->db->delete($this->vessel);
        return $query;
        
	}
	
	public function get_all_company(){
		$this->db->from('user_details');
		 $query = $this->db->get();
        $result = $query->result_array();
		return $result;
	}
	
	
	public function update_status($id){
		$this->db->where('vessel_id',$id);
		$data = array('assigned' => 1);
        $query = $this->db->update($this->vessel,$data); 
        //echo $this->db->last_query();exit;
        return $query;
	}
	
	public function add_relation($vessel_id,$company_id){
		$data = array(
			'company_id' => $company_id,
			'vessel_id' => $vessel_id
		);
		$this->db->insert('company_vessel_relationship',$data);
		return true;
	}
	
	public function check_status($vessel_id,$company_id){
		$this->db->where('vessel_id',$vessel_id);
		$this->db->where('company_id',$company_id);
		
		$this->db->from('company_vessel_relationship');
		 $query = $this->db->get();
        $result = $query->result_array();
		return $result;
	}
	
	
	public function get_all_company_relation(){
		$this->db->from('company_vessel_relationship');
		 $query = $this->db->get();
        $result = $query->result_array();
		return $result;
	}
	
	public function check_company($search_kw,$company_id){
		$this->db->where('organization',$search_kw);
		$this->db->where('id',$company_id);
		
		$this->db->from('user_details');
		 $query = $this->db->get();
        $result = $query->result_array();
		return $result;
	}
	
	
	
}