<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update_model extends CI_Model
{

	public function edit_vessel($vessel_id,$vessel_name,$imo_number,$flag,$class_no,
					$grain,$bale,$dwt,$price_idea,$owner_name,$owner_address,$owner_email,$owner_contact_number,
		 			$manager_name,$manager_address,$manager_email,$manager_contact_number,
					$agency,$agency_address,$agency_email,$agency_contact_number,$loa,
					$currency,$year_built,$vessel_breadth,$vessel_location,$place_built,$vessel_depth,$vessel_type,
					$vessel_date,$time,$status,$full_description,$image1,$image2,$image3,$image4,$image5)
	{
		$this->db->query("UPDATE vessels SET vessel_name='$vessel_name',imo_number='$imo_number',flag='$flag',class_no='$class_no',grain='$grain',
					bale='$bale',dwt='$dwt',price_idea='$price_idea',owner_name='$owner_name',owner_address='$owner_address',owner_email='$owner_email',
					owner_contact_number='$owner_contact_number',manager_name='$manager_name',manager_address='$manager_address',manager_email='$manager_email',manager_contact_number='$manager_contact_number',
					agency='$agency',agency_address='$agency_address',agency_email='$agency_email',agency_contact_number='$agency_contact_number',loa='$loa',
					currency='$currency',year_built='$year_built',vessel_breadth='$vessel_breadth',vessel_location='$vessel_location',place_built='$place_built',vessel_depth='$vessel_depth',vessel_type='$vessel_type',
					vessel_date='$vessel_date',time='$time',status='$status',full_description='$full_description',
					image1='$image1',image2='$image2',image3='$image3',image4='$image4',image5='$image5'
					WHERE vessel_id='$vessel_id'");
		return true;
	} 

	public function edit_certificate($certificate_id,$certificate_no,$certificate_name,$certificate_type,
				 		$date_issue,$date_expiry,$extention_until,$reminder1,$reminder2,$examption,
						$comments,$time,$document1,$document2,$document3,$document4,$document5)
	{
		$this->db->query("UPDATE certificate SET certificate_no='$certificate_no',certificate_name='$certificate_name',certificate_type='$certificate_type',
					date_issue='$date_issue',date_expiry='$date_expiry',extention_until='$extention_until',reminder1='$reminder1',
					reminder2='$reminder2',examption='$examption',comments='$comments',time='$time',document1='$document1',document2='$document2',document3='$document3',
					document4='$document4',document5='$document5'
					WHERE certificate_id='$certificate_id'");
		return true;
	} 

	
}

?>