<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>

<section id="main-edit">
  <div class="container">
  	
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Survey Status </h2>
        </div>
        
        
      </div>
    </div>
     
  </div>
</section>

<section id="top_mail">
	<div class="container">
    	<div class="row"> 
        
        <div class="col-md-3">
        <div class="main-edit-add-left">
         <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>				     
        </div>       
      </div>
      
      <div class="col-md-4">

    <form action="<?php echo base_url()."index.php/VesselSurvey/search/$vessel_id" ?>" method="post">
    <div class="input-group">
    <input type="text" id="search_box" class="form-control-text" placeholder="Search" name="search">
  <div class="input-group-btn"> <a class="btn btn-default text-muted" href="<?php echo base_url();?>index.php/VesselSurvey/index/<?php echo $vessel_id;?>" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
    <button type="submit" class="btn btn-info"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span> </button>
    </div>
     </div>		
  </form>
      </div>
      
      <div class="col-md-5">
      	<div class="list_right">
         <ul class="main-edit-add"> 
        <li><a class="btn-blue" href="<?php echo base_url();?>index.php/AddSurveyScreen/index/<?php echo $vessel_id;?>">Add Survey</a></li>
         <li> <a class="btn-blue" href="<?php echo base_url();?>index.php/VesselSurvey/index/<?php echo $vessel_id;?>">ALL Survey</a></li> 
          <!--li><button class="btn-blue" onclick="mail_selected_vessels()" >Mail Document</button></li-->
          </ul>
         </div>
         </div>
         
         
      </div>
    </div>
</section>


<section id="work-done">
  <div class="container">
    <div class="row">
     <div class="black_bg">
     <div class="col-md-8">
     	<div class="mar_box">
      <form id="drop_down"action="<?php echo base_url()."index.php/VesselSurvey/search_dropdown/$vessel_id" ?>" method="get">
        <input type="hidden" name="range" value="yellow" />
        <button type="submit" id="yellowclor" class="update text-center btn btn-yelow btn-sm"></button>
      </form>
      &nbsp;<span>Within 30 days</span>&nbsp;&nbsp;
      <form id="drop_down"action="<?php echo base_url()."index.php/VesselSurvey/search_dropdown/$vessel_id" ?>" method="get">
        <input type="hidden" name="range" value="red" />
        <button type="submit" id="redclor" class="update text-center btn btn-red btn-sm"></button>
      </form>
      &nbsp;<span>Due now or Overdue</span>&nbsp;&nbsp;
			<form id="drop_down"action="<?php echo base_url()."index.php/VesselSurvey/search_dropdown/$vessel_id" ?>" method="get">
        <input type="hidden" name="range" value="brown" />
        <button type="submit" id="brownclr" class="update text-center btn btn-brwon btn-sm"></button>
      </form>
      &nbsp;<span>Due Soon</span>&nbsp;&nbsp;
      <form id="drop_down"action="<?php echo base_url()."index.php/VesselSurvey/search_dropdown/$vessel_id" ?>" method="get">
        <input type="hidden" name="range" value="green" />
        <button type="submit" id="greenclr" class="update text-center btn btn-green btn-sm"></button>
      </form>
      &nbsp;<span>Valid </span>&nbsp;&nbsp; 
      </div>
    </div>
	
	 <div class="col-md-2">
       <div class="input-group"> 
	<?php
		if(array_key_exists('range',$_REQUEST)){
		 $range = $_REQUEST['range'];
			}else{
		$range ="";
		}
			?>	   
  <form id="drop_down"  action="<?php echo base_url()."index.php/VesselSurvey/search_dropdown/$vessel_id" ?>" method="get">
   
    <select name="range" style="width: 169px;" onchange="this.form.submit()">
		<option selected value="">Select Status</option>
      <option value="yellow" <?php if($range == "yellow"){echo "selected=selected";}?>>Within 30 days</option>
			<option value="brown" <?php if($range == "brown"){echo "selected=selected";}?>>Due Soon</option>
      <option value="red" <?php if($range == "red"){echo "selected=selected";}?>>Due</option>
      <option value="green" <?php if($range == "green"){echo "selected=selected";}?>>Valid</option>
    </select>
   
     </form>
		 
		 
		 
      </div>
      </div>
      </div>
       </div>
   
  <div class="row">
    <div class="panel-body">
      <div class="table-responsive">
        <table id="tableselected" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Survey</th>
              <th>Last Survey</th>
              <th>Postponed Date</th>
              <th>Due</th>
              <th>Range</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
				//echo $date = date("y-m-d");
				foreach($all_survey_details as $key=> $value){
								$res = "";
								if($value['range_from'] != "0000-00-00 00:00:00" && $value['range_to'] != "0000-00-00 00:00:00"){
									$range_from = strtotime($value['range_from']);
									$range_to =  strtotime($value['range_to']);
									$date = date("y-m-d");
									$current_date = strtotime($date);
									
									if($current_date >= $range_to){
										$res = "<button type=button id=redclor class='update text-center btn btn-red btn-sm'></button>";	
									}else{
										$range_from_plus_thirty_date = date("y-m-d",strtotime($value['range_from']."+30 days"));
										
										$range_from_plus_thirty = strtotime($range_from_plus_thirty_date);
										if($current_date<=$range_from_plus_thirty){
											$res =	"<button type=button id=greenclr class='update text-center btn btn-green btn-sm'></button>";
										}
										
										
										$plus_thirty_date = date("y-m-d",strtotime("+30 days"));
										if($plus_thirty_date<= $range_from){
											$res =	"<button type=button id=greenclr class='update text-center btn btn-green btn-sm'></button>";
											if($current_date>=$range_from && $current_date<=$range_to){
												$res ="<button type=button id=yellowclor class='update text-center btn btn-yelow btn-sm'></button>";
											}
										}
										
										$range_from_minus_thirty_date = date("y-m-d",strtotime($value['range_from']."-30 days"));
										$range_from_minus_thirty = strtotime($range_from_minus_thirty_date);
										if($current_date>$range_from_minus_thirty && $current_date < $range_from){
											$res ="<button type=button id=yellowclor class='update text-center btn btn-yelow btn-sm'></button>";
										}
										
										//if($current_date>=$range_from && $current_date<=$range_to){
										//	$res ="<button type=button id=yellowclor class='update text-center btn btn-yelow btn-sm'></button>";
										//}										
									}
									
								}else{
									$due_date =  strtotime($value['due_date']);
									$date = date("y-m-d");
									$current_date = strtotime($date);
									if($current_date >= $due_date){
										$res = "<button type=button id=redclor class='update text-center btn btn-red btn-sm'></button>";
									}else{
											$date_plus_thirty = date("y-m-d",strtotime("+30 days"));
											$current_date_plus_thirty = strtotime($date_plus_thirty);
											if($current_date_plus_thirty < $due_date){
												$res =	"<button type=button id=greenclr class='update text-center btn btn-green btn-sm'></button>";
											}
											
											
											if($current_date_plus_thirty >= $due_date){
												$res ="<button type=button id=yellowclor class='update text-center btn btn-yelow btn-sm'></button>";
											}
									
									}
								}
								
								//$postponed_date = strtotime($value['postponed_date']);
								//
								//if($current_date < $range_from){
								//		$res =	"<button type=button id=greenclr class='update text-center btn btn-green btn-sm'></button>";
								//}
								//if($current_date >= $range_from && $current_date <= $range_to){
								//	$res = "<button type=button id=yellowclor class='update text-center btn btn-yelow btn-sm'></button>";
								//}
								//if($current_date > $range_to){
								//	
								//}
								
					?>
            <tr>
              <td><?php echo $value['survey_no']; ?></td>
              <td><?php
							if($value['last_survey_date'] != "0000-00-00 00:00:00"){
								echo date("d/m/Y",strtotime($value['last_survey_date']));	
							}else{
								echo "";
							}
							 ?></td>
              <td><?php
							if($value['postponed_date'] != "0000-00-00 00:00:00"){
								echo date("d/m/Y",strtotime($value['postponed_date']));	
							}else{
								echo "";
							}
							 ?></td>
              <td><?php
							if($value['due_date'] != "0000-00-00 00:00:00"){
								echo date("d/m/Y",strtotime($value['due_date']));	
							}else{
								echo "";
							}
							 ?></td>
              <td><?php
							if($value['range_from'] != "0000-00-00 00:00:00"){
								echo date("d/m/Y",strtotime($value['range_from']))." to ".date("d/m/Y",strtotime($value['range_to']));
							}else{
								echo "";
							}
							 ?></td>
              <td><?php //echo $value['id'];//echo $res;
							if($ststus[$value['id']] == "red"){
								echo "<button type=button id=redclor class='update text-center btn btn-red btn-sm'></button>";
							}elseif($ststus[$value['id']] == "yellow"){
								echo "<button type=button id=yellowclor class='update text-center btn btn-yelow btn-sm'></button>";
							}elseif($ststus[$value['id']] == "green"){
								echo "<button type=button id=greenclr class='update text-center btn btn-green btn-sm'></button>";
							}elseif($ststus[$value['id']] == "brown"){
								echo "<button type=button id=brownclr class='update text-center btn btn-brwon btn-sm'></button>";
							}
							
							?></td>
              <td><a href="<?php echo base_url();?>index.php/EditSurvey/index/<?php echo $value['id']; ?>/<?php echo $value['vessel_id'];?>" class="btn-bk"> <i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="<?php echo base_url();?>index.php/VesselSurvey/delete/<?php echo $value['id']; ?>/<?php echo $value['vessel_id'];?>" Onclick="return confirm('Are you Sure?');" class="btn-bk"> <i class="fa fa-trash" aria-hidden="true"></i></a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
		<div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
        </div>
            
  </div>
</section>
<?php
include'includes/footer.php';
?>
<script>
	function reset(){
		//alert("hi");
		$("#search_box").val("");
	}
</script>