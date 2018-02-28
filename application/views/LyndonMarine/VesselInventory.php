<?php
include'includes/CheckUserLogin.php';
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Vessel Inventory of Spare Parts
</h2>
        </div>
      </div>
      <div class="col-md-3">
       <!--  <div class="main-edit-add"> <a class="btn-blue" href="vessel-recommendation-form.html">Add</a>  </div> -->
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
      <div class="head-btn">
      	<div class="col-md-4">
        	<a href="#" class="btn btn-xcode">Auxiliary Engine</a>
        </div>
        <div class="col-md-4">
        	<a href="#" class="btn btn-xcode">Electrical Machines & Miscellaneous</a>
        </div>
        <div class="col-md-4">
        	<a href="#" class="btn btn-xcode">Main Engine</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="head-btn">
      	<div class="col-md-4">
        	<a href="#" class="btn btn-xcode">Deck Store</a>
        </div>
        <div class="col-md-4">
        	<a href="#" class="btn btn-xcode">Misc Engine</a>
        </div>
        <div class="col-md-4">
        	<a href="#" class="btn btn-xcode">Movement Store</a>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
include'includes/footer.php';
?>