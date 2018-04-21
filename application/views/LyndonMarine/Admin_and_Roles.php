<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<style>
 /* .form-control-text1{
    color: #444;
    
 
 padding: 15px 10px;
  font-size: 18px;

  }*/
  .well {
    min-height: 20px;
    padding: 12px;
    margin-bottom: 20px;
    background-color: #ffffff;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    /* -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05); */
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
.box {
    padding: 12px 12px 16px 12px;
}
</style>


<section id="tab-bar-img">
  <div class="container">
    <div class="row"> <!-- Nav tabs -->
      <div class="card">
     <!-- <?php if($user_data['role'] == "user2" OR $user_data['role'] == "user1") {
          }
          else{ ?>  -->


		 <div class="col-md-4" style="margin-bottom:15px;margin-top:20px;">
            <div class="input-group">
        <form onsubmit="searchEnter(document.getElementById('search_vessel').value); return false;">
          <input type="text" class="form-control-text" placeholder="Search For" name="search" id="search_vessel">
        </form>
          <span class="input-group-btn">
            <a class="btn btn-default text-muted" href="#" title="Clear" onclick="reset()"><i class="glyphicon glyphicon-remove"></i> </a>
            <button onclick="searchIcon(document.getElementById('search_vessel').value)" type="button" class="btn btn-info">
              <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
            </button>
          </span>
        </div>
          </div>
		  <?php  } ?>
		  
     <div class="col-md-8 text-right" style="margin-bottom:15px;">
	 <div class="btn-group">
 
 </div>
		<div class="btn-group">
      <a href="<?php echo base_url(); ?>index.php/AddUserScreen/index/<?php echo $com_id; ?>" class="btn btn-primary"> Add User</a>
   </div>
 <div class="btn-group">
 <form>
    <div class="form-group">
   
      <select class="form-control" sty="background-color:#337ab7;" id="sel2">
        <option >All</option>
        <option>User</option>
        <option>Staff</option>
      </select>
      <br>
        </div>
  </form>
 </div>
</div>


     </div>        
        <div class="col-md-12" style="margin-bottom: 20px;">
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#AssignedVessels" aria-controls="home" role="tab" data-toggle="tab">Admin and Roles</a></li>
            
          </ul>
        </div>
        <!--Tab panes-->
       </div>
    </div>
  </div>
</section>



<section id="work-done">
  <div class="container">
    <div class="row">
    	  <?php 
      foreach ($user_data as $key => $value) 
      {
      	
        $name = $value['name'];
      	$first_name = $value['first_name'];
      	$image = $value['image'];
      ?>
        <div class="col-md-2 well text-center box">

           <img style="padding-bottom:15px;" width="100%" src="<?php echo $image; ?>" class="img-responsive">
		   <p class="card-title center1" style="font-size:14px; padding-top:10px; padding-bottom:20px;">
		    <button style="float:left;margin-left:5px;"><a href="#"  data-toggle="tooltip" title="Unactive" style="color:Gray;"><span class="fa fa-circle"></span></a></button><b> <?php if($name!=''){echo $name;}else{echo $first_name;} ?> </b> <a href="#" class="btn btn-xs btn-danger" style="float:right;" data-toggle="tooltip" title="Offline"><span class="glyphicon glyphicon-off"></span> User</a></p>
					<hr>	
            
			<a href="#" class="btn btn-primary data-toggle="tooltip" title="Edit Profile"> <span class="glyphicon glyphicon-edit"></span></a>
			<a href="#" class="btn btn-primary data-toggle="tooltip" title="Delete"> <span class="glyphicon glyphicon-trash"></span></a>	
			<button class="btn btn-primary icon-links  center1" data-toggle="collapse" data-target="#1"  data-toggle="tooltip" title="Detail "> <span class="glyphicon glyphicon-eye-open"></span></button>
			<div id="1" class="collapse text-left" style="color:black;"> 
			<br><hr>
			<p style="padding-top:5px;padding-bottom:5px; font-size:12px;color:#3d3939;">1. User Name : Hampton</p> <hr>
			<p style="padding-top:5px;padding-bottom:5px;font-size:12px;color:#3d3939;">2. ID Number : 112235</p> <hr>
			<p style="padding-top:5px;padding-bottom:5px;font-size:12px;color:#3d3939;">3. Email : john@gmail.com</p> <hr>
							
		</div>	
       </div> 
       <?php 
         } //for getting dynamic 
       ?>
	</div><!-- row  --> 
  </div>
</section>

<?php
include'includes/footer.php';
?>
<script>
function searchEnter(search_vessel)
{
    if(search_vessel == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
      window.location.href = "<?php echo base_url(); ?>index.php/AllVessels/searchdata/"+search_vessel+"/"+<?php echo $vessel_data['user_id'] ?>;
    }
}
function searchIcon(search_vessel)
{
    if(search_vessel == "")
    {
        alert("Please enter a value to be searched");
    }
    else
    {
            window.location.href = "<?php echo base_url(); ?>index.php/AllVessels/searchdata/"+search_vessel+"/"+<?php echo $vessel_data['user_id']?>;
    }
}
function reset(search_vessel)
{
  $('#search_vessel').val('');
  window.location.href = "<?php echo base_url(); ?>index.php/AllVessels/user_vessel/"+<?php echo $vessel_data['user_id'] ?>;
}
</script>