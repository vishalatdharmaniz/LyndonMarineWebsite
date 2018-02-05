<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>View Vessel</h2>
        </div>
      </div>
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
                  <th width="40%">Owner Name</th>
                  <th width="60%"><?php echo $vessels['owner_name']; ?></th>
                
                </tr>
                <tr>
                  <th scope="row">Owner Address</th>
                  <td><?php echo $vessels['owner_address']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Owner Email</th>
                  <td><?php echo $vessels['owner_email']; ?></td>  
                </tr>
                <tr>
                  <th scope="row">Owner Contact Number</th>
                  <td><?php echo $vessels['owner_contact_number']; ?></td>
                </tr>
                <tr>
                  <th scope="row">Manager Name</th>
                  <td><?php echo $vessels['manager_name']; ?></td> 
                </tr>
                 <tr>
                   <th scope="row">Manager Address</th>
                  <td><?php echo $vessels['manager_address']; ?></td>
                  
                </tr>
                 <tr>
                   <th scope="row">Manager Email</th>
                   <td><?php echo $vessels['manager_email']; ?></td>
                 
                  </tr>
                  <tr>
                  <th scope="row">Manager Contact Number</th>
                  <td><?php echo $vessels['manager_contact_number']; ?></td> 
                </tr>
                <tr>
                  <th scope="row">Agency</th>
                  <td><?php echo $vessels['agency']; ?></td> 
                </tr>
                 <tr>
                   <th scope="row">Agency Address</th>
                  <td><?php echo $vessels['agency_address']; ?></td> 
                </tr>
                <tr>
                  <th scope="row">Agency Email Address</th>
                  <td><?php echo $vessels['agency_email']; ?></td>
                  
                </tr>
                <tr>
                  <th scope="row">Agency Contact Number</th>
                  <td><?php echo $vessels['agency_contact_number']; ?></td> 
                </tr>
                </tbody>
               
              </table>
            </div>
            </div>
            
            
    </div>
     <?php } ?>
  </div>
</section>

<?php
include'includes/footer.php';
?>
