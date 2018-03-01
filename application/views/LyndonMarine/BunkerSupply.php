<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>

 <section id="main-edit">
  <div class="container">
    
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Bunker Supply</h2> <br>
        </div> 
       </div>
    </div>
     
  </div>
</section>
<section id="top_mail">
  <div class="container">
      <div class="row"> 
        <div class="col-md-3">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/FleetDetails/index/<?php echo $vessel_id; ?>">Go Back</a>                
          </div>       
      </div>
      
      <div class="col-md-4">
      <!-- for alignment of add button towards right . -->
      </div>
      
      <div class="col-md-5">
        <div class="list_right">
        <ul class="main-edit-add"> 
        <li><a class="btn-blue" href="<?php echo base_url(); ?>index.php/AddBunkerSupply/index/<?php echo $vessel_id; ?>">Add</a></li>
          <li><a class="btn-blue" onclick="mail_selected_vessels()" >Mail Selected Document</a></li>
          </ul>
         </div>
         </div>
         
         
      </div>
    </div>
</section>

<section id="work-done">
  <div class="container">
    <!--<div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="img-upload"> <img src="img/image01.jpg" class="img-responsive"> </div>
      </div>
    </div>-->
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Supply Date</th>
                <th>Supplier Name</th>
                <th>Supply Port</th>
                <th>Due Date</th>
                <th>Invocie Amount</th>
                <th>Currency</th>
                <th>View Invoice </th>
                <th>Status</th>
                <th>Select</th>
                
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
                <td class="text-center"><a href="#" class="btn btn-primary">View</td>
                <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td> 
                <td>
                    <input type="checkbox" name="checkbox" id="#">
                </td>
               
              </tr>
               
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="work-done">
  <div class="container">
    <div class="row">
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
           
            <tbody>
              <tr>
                <td><button type="button" class="update text-center btn btn-danger btn-sm"></button></td>
                <td>Due Now or Overdue within 15day</td>
               
              </tr>
                <tr>
                <td><button type="button" class="update text-center btn btn-success btn-sm"></button></td>
                <td>Rectified</td>
               
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