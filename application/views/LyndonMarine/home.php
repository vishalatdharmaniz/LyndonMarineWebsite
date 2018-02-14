<?php
include'includes/header.php';
?>
<section id="main-head">
<h3 style="color:#8B0000;margin-left:68%;margin-bottom:10px"><?php echo $message; ?></h3>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="main-text-head">
          <h2>Welcome to</h2>
          <h1>Lyndon Marine</h1>
          <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years.</p>
          <a href="#">Read More &nbsp; <i class="fa fa-angle-right" aria-hidden="true"></i></a> </div>
      </div>
      <div class="col-md-6">
        <div class="form-right-text-one">
          <div class="form-text">
            <h2>Request account</h2>
            <p>Enter your personal details below:</p>
          </div>
          <form action="<?php echo base_url(); ?>index.php/SignUp/index" id="signup_form" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Name" class="form-control" name="name" required>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Organization" class="form-control" name="organization" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input type="text" placeholder="Address" class="form-control" name="address" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="City" class="form-control" name="city" required>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Country" class="form-control" name="country" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Telephone" class="form-control" name="telephone" required>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="text" placeholder="Account Type" class="form-control" name="account_type" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <input type="text" placeholder="Note" class="form-control" name="note" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <div class="ajax_response_result"></div>
                  <input type="email" placeholder="Email" onblur="check_email_exists();" value="<?php echo set_value('email'); ?>" id="email" class="form-control" name="email" required>
                  <span id="emailmsg"></span>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <div class="form-group">
                  <input type="password" placeholder="Password" class="form-control" name="password" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" value="">
                    &nbsp;&nbsp;I agree to the Terms of Use and Privacy Policy</label>
                </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-sm-12">
              	<div class="btn-box">
                <button type="submit" class="btn btn-black">Apply</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>
<!--script>

function check_email_exists()
{

  var email = $('#email').val();
  $.ajax({
      type:"POST",
      url: "<?php //echo site_url('SignUp/check_email_exist') ?>" ,
      data: {email:email},
      success: function(response)
      {
        if(response==true)
        {
          $('#emailmsg').style.color = 'Red';
          $('#emailmsg').html='Email already exists';
          $('#emailmsg').disabled=true;
        }
        else
        {
          $('#emailmsg').style.color = 'green';
          $('#emailmsg').html='';
          $('#emailmsg').disabled=true;
        }
      }
  });

}
</script-->
