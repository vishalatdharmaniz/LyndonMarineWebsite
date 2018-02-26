<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <?php foreach($vessel_details as $vessels) {  ?>
        <div class="col-md-2">
      <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url();?>index.php/FleetDetails/index/<?php echo $vessels['vessel_id']; ?>">Go Back</a> </div>
      </div>
      <div class="col-md-offset-1 col-md-6">
        <div class="page-heading">
          <h2><?php echo $vessels['vessel_name']; ?> Particular</h2>
        </div>
      </div>
      <div class="main-edit-add">
        <button class="btn-blue" onclick="mail_vessel_details(<?php echo $vessels["vessel_id"];?>)" >Mail Document</button>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
<section id="table-data">
<div class="container">
<?php foreach($vessel_details as $vessels) { ?>
  <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center">
        <div class="image-table text-center">
        <!-- <img src="" alt="" class="img-responsive">-->
        
        <div class="owl-carousel owl-theme">
            <?php if ($vessels["image1"] != ""): ?>
            <div class="item"><img src="<?php echo $vessels["image1"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessels["image2"] != ""): ?>
            <div class="item"><img src="<?php echo $vessels["image2"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessels["image3"] != ""): ?>
            <div class="item"><img src="<?php echo $vessels["image3"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessels["image4"] != ""): ?>
            <div class="item"><img src="<?php echo $vessels["image4"]; ?>" alt=""></div>
            <?php endif; ?>
            <?php if ($vessels["image5"] != ""): ?>
            <div class="item"><img src="<?php echo $vessels["image5"]; ?>" alt=""></div>
            <?php endif; ?>
          </div>
            </div>
          </div>
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
                                </div>
      </div>
          
    <div class="row">
        
      <div class="col-md-10 col-md-offset-1">
        <div class="table-responsive">
        <table class="table table-bordered">

              <thead>
                
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Vessel Type</th>
                  <td><?php echo $vessels['vessel_type']; ?></td>
                  
                </tr>
                <tr>
                  <th scope="row">DWT </th>
                  <td><?php echo number_format($vessels['dwt']); ?></td>
                  
                </tr>
                <tr>
                  <th scope="row">IMO Number</th>
                  <td><?php echo $vessels['imo_number']; ?></td>
                  
                </tr>
                <tr>
                  <th scope="row">LOA</th>
                  <td><?php echo $vessels['loa']; ?></td>
                </tr>
                
                <tr>
                  <th scope="row">Vessel Name</th>
                  <td><?php echo ucwords($vessels['vessel_name']); ?></td>
                </tr>

                <tr>
                  <th scope="row">Vessel Breadth</th>
                  <td><?php echo $vessels['vessel_breadth']; ?></td>
                </tr>
                
                <tr>
                  <th scope="row">Year Built</th>
                  <td><?php echo $vessels['year_built']; ?></td> 
                </tr>
                  
                  
                  <tr>
                    <th scope="row">Vessel Depth</th>
                    <td><?php echo $vessels['vessel_depth']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Place Built</th>
                    <td><?php echo $vessels['place_built']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Grain</th>
                    <td><?php echo number_format($vessels['grain']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Date</th>
                    <td><?php echo date("d/m/Y",strtotime($vessels['vessel_date'])); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Bale</th>
                    <td><?php echo number_format($vessels['bale']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Flag</th>
                    <td><?php echo $vessels['flag']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Status</th>
                    <td><?php echo ucwords($vessels['status']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Class</th>
                    <td><?php echo $vessels['class_no']; ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Role</th>
                    <td><?php echo ucwords($vessels['role']); ?></td>
                  </tr>
                  <tr>
                    <th scope="row">Full Description</th>
                    <td><?php echo $vessels['full_description']; ?></td>
                  </tr>
                </tbody>
               
              </table>
            </div>
            </div>
            
            
    </div>
     <?php } ?>
    <!--p style="color:blue;">
      (All information including the technical details, price and availability of the
      vessel's Is given in good faith but without guarantee of accuracy or completeness)
    </p-->
  </div>
</section>

<?php
include'includes/footer.php';
?>
<script>
  function mail_vessel_details(vessel_id) 
{
    var email = prompt("Please enter the Email of recepient:", "abc@gmail.com");
    if (email != null) {
        window.location.href = "<?php echo site_url(); ?>/MailVesselDetails/vessel_mail/"+vessel_id+"/"+email;
    }
}
</script>
