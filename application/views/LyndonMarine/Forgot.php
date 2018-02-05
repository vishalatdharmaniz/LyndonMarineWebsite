<?php
include'includes/header.php';
?>
<section id="work-done-forgot">
	<div class="container">
    	<div class="row">
    		<div class="forgot-text">
	
                <div class="col-md-8 col-md-offset-2"> 
                 	<div class="done-forgot-text">
                    <?php echo $message; ?>
                    	<h2>Forgot your Password?</h2>
                        <p>Enter Your Email Id</p>
                    	<form action="<?php echo base_url(); ?>index.php/ForgotPassword/index" method="post">
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <div class="form-group">
                  <input type="text" name="email" placeholder="Email" class="form-control">
                </div>
                <button type="submit" class="btn btn-black">Send</button>
              </div>
              
            </div>
            
           
          </form>
                    
                    </div>	
            	</div>
            </div>
            
        
        </div>	
        
	</div>
</section>
<?php
include'includes/footer.php';
?>