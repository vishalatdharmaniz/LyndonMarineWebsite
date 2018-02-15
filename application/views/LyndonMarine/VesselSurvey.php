<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Survey</h2>
        </div>
      </div>
      
      <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/AddSurveyScreen/index/">Add</a> </div>
        <br>
       <!-- <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/VesselCertificate/index">All Certificate</a> </div>-->
        <!-- <br><div class="main-edit-add"> <a class="btn-blue" onclick="<?php $all_checked; ?>" >Mail Document</a> </div> -->
      </div>
    </div>
  </div>
</section>
<?php
							if($this->uri->segment(4) == 'msg'){
?>
											<div id="msg" style="display: none;">
<?php 
								$msg = $this->uri->segment(5);
								if(isset($msg)){    ?>
													<div class="alert alert-success"><?php echo urldecode($msg); ?></div>
								<?php
								}
								?>
								</div>
								<?php
							}	 ?>
<section id="work-done">
  <div class="container">
    <div class="row">
			<form action="<?php echo base_url().'/index.php/VesselSurvey/search' ?>" method="post">
      <div class="col-md-6 col-md-offset-3">
        <div class="input-group">
          <input type="text" class="form-control-text" placeholder="Search" name="search">
          <span class="input-group-btn">
      			<a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
      			<button  type="submit" class="btn btn-info">
      				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      			</button>
          </span>
        </div>
      </div>
			</form>
    </div>
    <div class="row">
		<div class="col-md-8">
			<button type="button" id="yellowclor" class="update text-center btn btn-yelow btn-sm"></button>
			&nbsp;<span>Within Range</span>&nbsp;&nbsp;
			<button type="button" id="redclor" class="update text-center btn btn-red btn-sm"></button>
			&nbsp;<span>Due now or Overdue</span>&nbsp;&nbsp;
			<button type="button" id="greenclr" class="update text-center btn btn-green btn-sm"></button>
			&nbsp;<span>Valid </span>&nbsp;&nbsp;
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
							 ?> </td>
							<td>
							<?php
							if($value['due_date'] != "0000-00-00 00:00:00"){
								echo date("d/m/Y",strtotime($value['due_date']));	
							}else{
								echo "";
							}
							 ?> 
							</td>
							<td>
							<?php
							if($value['range_from'] != "0000-00-00 00:00:00"){
								echo date("d/m/Y",strtotime($value['range_from']))." to ".date("d/m/Y",strtotime($value['range_to']));
							}else{
								echo "";
							}
							 ?>
							</td>
							<td><?php echo $res; ?></td>
							<td><a href="<?php echo base_url();?>index.php/VesselSurvey/edit/<?php echo $value['id']; ?>" class="btn-bk">
									<i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a href="<?php echo base_url();?>index.php/VesselSurvey/delete/<?php echo $value['id']; ?>" Onclick="return confirm('Are you Sure?');" class="btn-bk">
									<i class="fa fa-trash" aria-hidden="true"></i></a>
							</td>
						</tr>
<?php } ?>
            </tbody>
          </table>
					
					<div class="row">
							<div class="col-md-12">
							<div class="text-center">
							<?php echo $this->pagination->create_links(); ?>
							</div>
						</div>
						</div>
					
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
