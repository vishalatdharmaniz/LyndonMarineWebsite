<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Profiles</h2>
        </div>
      </div>
      <div class="col-md-3">
        <div class="main-edit-add"> <a class="btn-blue" href="<?php echo base_url(); ?>index.php/Profile/edit_profile">Edit</a> </div>
      </div>
    </div>
  </div>
</section>
<section id="work-done">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="img-upload"> <img src="<?php echo base_url(); ?>img/image01.jpg" class="img-responsive"> </div>
      </div>
    </div>
    <div class="row">
     <?php foreach($user_data as $user) { ?>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Username</th>
                <th><?php echo $user['email']; ?></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>First Name</td>
                <td><?php echo $user['name']; ?></td>
              </tr>
              <tr>
                <td>Surname</td>
                <td><?php echo $user['last_name']; ?></td>
              </tr>
              <tr>
                <td>Organization</td>
                <td><?php echo $user['organization']; ?></td>
              </tr>
              <tr>
                <td>Telephone</td>
                <td><?php echo $user['telephone']; ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><?php echo $user['address']; ?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?php echo $user['city']; ?></td>
              </tr>
              <tr>
                <td>Country</td>
                <td><?php echo $user['country']; ?></td>
              </tr>
              <tr>
                <td>Notes</td>
                <td><?php echo $user['note']; ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>