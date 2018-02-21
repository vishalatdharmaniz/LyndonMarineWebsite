<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Status</h2>
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
<section id="work-done">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="input-group">
          <input type="text" class="form-control-text" placeholder="Search" name="search" id="search_vessel">
          <span class="input-group-btn">
      			<a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
      			<button onclick="search(document.getElementById('search_vessel').value)" type="button" class="btn btn-info">
      				<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
      			</button>
          </span>
        </div>
      </div>
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
                
              </tr>
            </thead>
            <tbody>

				<tr>
					
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							
							<!--<td class="text-center">
								<a href="<?php echo base_url();?>index.php/DeleteCertificate/index/" Onclick="return confirm('Are you Sure?');" class="btn-bk">
									<i class="fa fa-trash" aria-hidden="true"></i>
								</a>
								<a href="<?php echo base_url();?>index.php/VesselCertificate/edit_certificate/" class="btn-bk">
									<i class="fa fa-pencil" aria-hidden="true"></i>
								</a>
							</td>-->
						</tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
