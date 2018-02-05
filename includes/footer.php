<footer>
	<div class="container">
    	<div class="row">
        	<div class="col-md-6">
            	<div class="text-left">
                	<p>© 2017 - Marine Lyndon</p>	
                </div>
            </div>
            
            <div class="col-md-6">
            <div class="text-right">
                	<ul class="menu-footer">
                    	<li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="<?php echo base_url(); ?>bower_components/jquery/dist/jquery.min.js"></script> 
<script src="<?php echo base_url(); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
<script>
   $('.owl-carousel').owlCarousel({
        loop:true,
        margin:0,
		autoplay:true,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
</script>

</body>
</html>