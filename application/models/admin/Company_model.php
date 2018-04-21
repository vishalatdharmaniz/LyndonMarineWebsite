<?php
class Company_model extends CI_Model
{
	function __construct(){
        parent::__construct();
        $this->company = "user_details";
		$this->vessel = "vessels";
    }
	
	public function get_data($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '', $num = '', $offset='', $orderby='', $orderbyfield='', $and_match_value=''){
	    $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM '.$this->company;
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
        
        $query = ($count) ? 'SELECT count(*) as total FROM '.$this->company.' '.$where.' '.$and_condition.$orderby : $sql;
		//echo  $query;die;
        $query = $this->db->query($query);
		//echo $this->db->last_query();exit;
		return $query->result_array();
    }
	
	public function get_user($id){
		$this->db->where("id",$id);
		 $this->db->from($this->user);
		 $query = $this->db->get();
        $result = $query->result_array();		
		return $result;	
	}
	
	public function delete_record($id){
		$this->db->where('id',$id);
        $query = $this->db->delete($this->company);
        return $query;
        
	}
	
	
	function add($data)
	{
		$this->db->insert($this->company,$data);
		return true;
	}
	
	function get_company($id){
		$this->db->where("id",$id);
		 $this->db->from($this->company);
		 $query = $this->db->get();
        $result = $query->result_array();		
		return $result;	
	}
	
	function update_company($data,$id){
		$this->db->where('id',$id);
        $query = $this->db->update($this->company,$data); 
        //echo $this->db->last_query();exit;
        return $query;
	}
	
	public function get_vessel_data($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '', $num = '', $offset='', $orderby='', $orderbyfield='', $and_match_value=''){
		
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
			
			
		}
		if($and_match_value){
				$ids = implode(",",$and_match_value);
				$where .= "WHERE vessel_id IN (".$ids.")";
			}else{
				$where .= "WHERE vessel_id IN ( NULL )";
			}
		
		
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
	
	public function get_vessel_ids($company_id){
		$this->db->select("vessel_id");
		$this->db->where("company_id",$company_id);
		 $this->db->from("company_vessel_relationship");
		 $query = $this->db->get();
        $result = $query->result_array();		
		return $result;	
	}
	
	public function process_request($id,$status){
		$this->db->where('id',$id);
		$data = array("status" => $status);
        $query = $this->db->update($this->company,$data); 
        //echo $this->db->last_query();exit;
        return $query;		
	}
	
	
	public function get_all_data($search_kw){
		$query = "SELECT * FROM user_details WHERE organization like '%$search_kw%' and role = 1";
		$query =$this->db->query($query);
		return $query->result_array();
	}
	
	public function save($data){
		$this->db->insert($this->company,$data);
		return true;
	}
	
	function update_company_user($data,$id){
		$this->db->where('id',$id);
        $query = $this->db->update($this->company,$data); 
        //echo $this->db->last_query();exit;
        return $query;
	}

/////////// /////////

	function add_company($data)
	{

		$this->db->insert('company',$data);

		return true;

	}
	function add_users($data)
	{

		$this->db->insert('user_details',$data);
		return true;

	}
	function check_email($email)
	{
		$this->db->select('*');
		$this->db->from('company');
		$this->db->where('email',$email);
		$query= $this->db->get();
		if($query->num_rows()>0)
		{
			return false;
		}
		else{
			return true;
		}
	}
	

	function login_company($email,$password)
	{
		
		$result= $this->db->query("SELECT * FROM company where email='$email' AND password = '$password'");
			$login_details=$result->result_array();
			if(isset($login_details[0]))
			{
				return true;
			}
			else
			{
				return false;
			}
		
	}

 	public function get_enable_by_company_by_user_id($user_id)
    {
         $enabled_query = $this->db->query("SELECT `enabled` FROM company WHERE id = '$user_id'");
        return $enabled_query->result_array()[0]["enabled"];
 	}

	function get_company_profile($email)
	{
		$result = $this->db->query("SELECT * FROM company WHERE email='$email'");
		
		$data = $result->result_array();

		
			return $data;
	}
	public function get_role_by_company_id($company_id)
 	{
 		$role_value = $this->db->query("SELECT role FROM company WHERE id='$company_id'");
 		return $role_value->result_array();
 
 	}
	public function get_user_details_by_company_id($company_id)
 	{
 		$details = $this->db->query("SELECT * FROM user_details WHERE company_id='$company_id'");
 		return $details->result_array();
 
 	}
}
