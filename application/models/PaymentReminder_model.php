<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentReminder_model extends CI_Model
{  
	function add_payment_reminder_detail($data)
	{
		$this->db->insert('payment_reminder',$data);

		return true;
	}
  function add_payment_reminder($vessel_id,$invoice_number,$company,$reminder_date,$due_date,$amount,$currency,$paid_status,$remarks)
  {
    $add_reminder=$this->db->query("INSERT INTO payment_reminder (vessel_id,invoice_number,company,reminder_date,due_date,amount,currency,paid_status,remarks) VALUES ('$vessel_id','$invoice_number','$company','$reminder_date','$due_date','$amount','$currency','$paid_status','$remarks') ");


  }
	function get_reminder_details($reminder_id)
	{
		$payment_reminder_data = $this->db->query("SELECT * FROM payment_reminder WHERE reminder_id='$reminder_id'");
		return $payment_reminder_data->result_array();
	}
	
	function get_reminder_details_by_vessel_id($vessel_id)
	{
		$details_by_vessel_id = $this->db->query("SELECT * FROM payment_reminder WHERE vessel_id='$vessel_id' ORDER BY reminder_id ASC");
		return $details_by_vessel_id->result_array();
	}

    function get_all_payments_reminder_for_pagination($vessel_id,$offset)
    {
        $all_items = $this->db->query("SELECT * FROM payment_reminder WHERE vessel_id='$vessel_id' ORDER BY reminder_id ASC LIMIT 10 OFFSET $offset");
        return $all_items->result_array();
    }

    function get_total_reminder_details($vessel_id)
    {
        $count_documents = $this->db->query("SELECT * FROM payment_reminder WHERE vessel_id = '$vessel_id'");
        return COUNT($count_documents->result_array());
    }
   function update_reminder_details($reminder_id,$invoice_number,$company,$reminder_date,$due_date,$amount,$currency,$paid_status,$remarks)
   {
   	$update_query=$this->db->query("UPDATE payment_reminder SET  invoice_number='$invoice_number',company='$company',reminder_date='$reminder_date',due_date='$due_date',amount='$amount',currency='$currency',paid_status='$paid_status',remarks='$remarks' WHERE reminder_id='$reminder_id' ");
   	return $update_query;
   }
   function delete_reminder_by_reminder_id($reminder_id)
    {
        $this->db->query("DELETE FROM payment_reminder WHERE  reminder_id='$reminder_id'");
    }

  function getSheetLog($getfields='', $match_values = '',$condition ='', $compare_type = '', $count = '',$num = '',$offset='',$orderby='',$orderbyfield='',$and_match_value='', $custom_code = "", $start_date = "", $last_date = "", $vessel_id)
    {
      $fields =  $getfields ? implode(',', $getfields) : '';
        $sql = 'SELECT ';
        $sql .= $fields ? $fields : '*';
        $sql .= ' FROM payment_reminder';
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
      /*  if($custom_code == "red")
        {
        if(empty($where)){
          $where .= " WHERE ( due_date <= CURDATE()+ INTERVAL 5 day ) AND vessel_id= '$vessel_id'"; 
        }else{
          $where .= " IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date < CURDATE()+ INTERVAL 5 day ) AND vessel_id= '$vessel_id'";
        }
          
        }*/
        if($custom_code == "all")
        {
        if(empty($where))
        {
          $where .= " WHERE vessel_id= '$vessel_id'"; 
        }
        else
        {
          $where .= " vessel_id= '$vessel_id'";
        }
          
      }
          if($custom_code == "red")
        {
        if(empty($where))
        {
          $where .= " WHERE ( due_date <= CURDATE()+ INTERVAL 5 day AND paid_status='No' ) AND vessel_id= '$vessel_id'"; 
        }
        else
        {
          $where .= "  IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date < CURDATE()+ INTERVAL 5 day ) AND vessel_id= '$vessel_id'";
        }
          
      }
       
         if($custom_code == "green")
        {
        if(empty($where))
        {
          $where .= " WHERE ((due_date > CURDATE()+ INTERVAL 5 day AND due_date > reminder_date ) AND paid_status='No') AND vessel_id= '$vessel_id'";  
        }
        else
        {
          $where .= " IF( UNIX_TIMESTAMP(`due_date`) <>0 ,due_date > CURDATE()+ INTERVAL 5 day AND UNIX_TIMESTAMP(`reminder_date`) <>0,due_date > reminder_date AND paid_status='No' ) AND vessel_id= '$vessel_id'"; 
        }
          
      }

      
      if($custom_code == "blue")
      {
        if(empty($where))
        {
          $where .= "  WHERE paid_status ='Yes' AND vessel_id= '$vessel_id' "; 
        }else{
          $where .= " paid_status ='Yes' AND vessel_id= '$vessel_id'";
        }
       }
      
     }
    
        $orderby = ($orderby !='')?' order by '.$orderbyfield.' '.$orderby.'':'order by reminder_id desc ';
        if($offset=="" && $num=="")
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby;
        elseif($offset=="")
      $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$num;
        else
            $sql .= ' '.$where.' '.$and_condition.' '.$orderby.' '.'limit '.$offset .','.$num;
        
        $query = ($count) ? 'SELECT count(*) FROM payment_reminder'.$where.' '.$and_condition.$orderby : $sql;
    //echo $query;echo "</br>";
        $query = $this->db->query($query);
    
    //echo $this->db->last_query();exit;
    return $query->result_array();
    }

}//class end.


