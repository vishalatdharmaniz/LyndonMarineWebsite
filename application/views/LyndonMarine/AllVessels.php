<?php 
include_once 'Files.php';
include_once'Functions.php';
header('Content-type: application/json');
extract($_REQUEST);
$inputJSON = file_get_contents('php://input');
$input = json_decode( $inputJSON, TRUE ); //convert JSON into array


$all_vessels = get_all_vessels();
if($all_vessels)
{
	$message = array('status'=>1,'message'=>'All Records','data'=>$all_vessels);
	send_response($message);
	exit;
}
else
{
	$message = array('status'=>0,'message'=>'No Vessels found');
	send_response($message);
	exit;
}
?>