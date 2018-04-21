<!-- page content -->
    
	  <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>Vessels</h3>
          </div>
          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
                </span> </div>
            </div>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
					
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="img-hover">
			<div class="left-add"> <a href="<?php echo base_url();?>index.php/admin/vessel/add" class="btn btn-primary">Add</a> </div>
             <div class="clearfix"></div>
						 <?php if(!empty($result)){
						$count = 0;
						foreach($result as $key => $value){
							$count ++;
						?>
			 <div class="col-lg-2 col-md-4 col-sm-6 col-xs-12">
                <div class="card img-thumbnail">
									<?php $image_name = $value['image1'] ?>
							<img class="img-responsive" src="<?= $image_name ?>" onerror="this.src='http://root.lyndonmarine.com/LyndonMarineImages/no_image.png'" style="height: 118px;width: 152px;" alt="">
					<div class="card-body">
							<div style="padding-left:6px;"> 
							<h6><p><b> Vessel Name :</b> <?php echo $value['vessel_name']; ?></p>
							<p><b> IMO Number :</b> <?php echo $value['imo_number']; ?></p></h6><hr>
		<p class="center1"><a href="<?php echo base_url();?>index.php/admin/vessel/view/<?php echo $value['vessel_id']; ?>" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View Detail!"><span class="glyphicon glyphicon-eye-open"></span> </a> &nbsp 
			<button type="button"  title="Assigned / Unassigned" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#example<?php echo $value['vessel_id']; ?>">
			<span class="glyphicon glyphicon-retweet"></span></button>

<!-- Modal -->
<div class="modal fade" id="example<?php echo $value['vessel_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content center1">
      <div class="modal-header" style="background-color:#337ab7;">
	   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h3 class="modal-title" id="exampleModalLongTitle" style="color:white;padding-top:10px;">Assigned Vessels</h3>
       
      </div>
     <br>
<div class="container" style="padding:0px;">
<div class="row">
<div class="col-lg-12 center1">	 
  <div class="col-lg-5">
    <div class="input-group" style="float:right; padding-top:4px;">
       <label>Search Your Company
			 <label>Assigned To:</label>
    </div>
  </div>

  <div class="col-lg-7">
    <div class="input-group">
			<form method="post" action="<?php echo base_url();?>index.php/admin/Vessel/add_vessel_to_company" >
			<input type="hidden" name="vessel_id" value="<?php echo $value['vessel_id'];?>" />
			<div id='remote'>
				<input class="typeahead" type = "text" id=  "search_kw" name = "search_kw" value = '' placeholder = "organization name"  style = "width:315px;" autofocus/>
				<input type="hidden" id="custId" name="company" value="" />
			</div>
      <!--<select name="company">
				<?php //foreach($all_company as $key1 => $value1){ ?>
				<option value="<?php //echo $key1;?>"><?php //echo $value1;?></option>
				<?php // } ?>
			</select>-->
			</div>
     <div class="input-group" style = "width:115px;">
			<?php
				if(!empty($assined_companies)){
					if(array_key_exists($value['vessel_id'],$assined_companies)){
								if(is_array($assined_companies[$value['vessel_id']])){
									$name = "";
									$i = 0;
										foreach($assined_companies[$value['vessel_id']] as $k => $v){
											$i ++;
											if($i > 1){
												$name .= ", ".$all_company[$k];	
											}else{
												$name .= $all_company[$k];
											}
										}
										echo $name;
								}else{
									echo $all_company[$assined_companies[$value['vessel_id']]];
								}
					}
				}
			?>
		 </div>
    
		
  </div>
 </div>

  </div>
  </div>
      <div class="modal-footer center1">
       
        <button type="submit" class="btn btn-primary">SUBMIT</button>
      </div>
			</form>
    </div>
  </div>
		
</div></p>


							</div>
					</div>
				</div>
             </div>
						<?php if($count == 6){?>
			 <div class="clearfix"></div>
       <br>
			 <?php } ?>
              <?php }}?>
       
             </div>
           </div>
        <div class="row">
          <div class="col-md-12">
            <div class="text-center"> <?php echo $this->pagination->create_links(); ?> </div>
          </div>
        </div>
            </div>
          </div>
            </div>      </div>
			
<script>
 var product_dataset = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  //prefetch: "/products/data",
  remote: {
    url: "company/admin_data?search=%QUERY",
                    replace: function (url,query) {
					 var multipleValues = $( "#category_dropdown" ).val() || [];
                     $('#url_category').val(multipleValues.join( "," ));
					 //alert($('#url_category').val());
					 return url.replace('%QUERY', query).replace('%CID', $('#url_category').val());
					},
					
	/*filter: function(x) {
                            return $.map(x, function(item) {
                                return {value: item.product};
                            });
                        },*/
                        wildcard: "%QUERY"
    
  }
});
$('#remote .typeahead').typeahead(null, {
  name: 'org_name',
  display: 'org_name',
  source: product_dataset,
  limit:120,
  minlength:3,
  classNames: {
    input: 'Typeahead-input',
    hint: 'Typeahead-hint',
    selectable: 'Typeahead-selectable'
  },
  highlight: true,
  hint:true,
  templates: {
    /*empty: [
      '<div class="empty-message">',
        'unable to find matching product',
      '</div>'
    ].join('\n'),*/
    suggestion: Handlebars.compile('<div style="background-color:white;width:315px;border: 1px solid rgba(0,0,0,.2);outline: 0;-webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5); box-shadow: 0 3px 9px rgba(0,0,0,.5);z-index:-5000;" class="row_hover"><strong style="width:300px;color:black"><a class="row_hover" href="#-1">{{code}}</a></strong></div>'),
	header: Handlebars.compile("<div style='background-color:white;width:315px;border: 1px solid rgba(0,0,0,.2);outline: 0;-webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5); box-shadow: 0 3px 9px rgba(0,0,0,.5);z-index:-5000'><b>Search result for ({{query}}) :'</b></div>"),
	footer: Handlebars.compile("<div style='background-color:white;width:315px;border: 1px solid rgba(0,0,0,.2);outline: 0;-webkit-box-shadow: 0 3px 9px rgba(0,0,0,.5); box-shadow: 0 3px 9px rgba(0,0,0,.5);z-index:-5000'><b>---------lyndonmarine.com---------</b></div>"),
  }
}).on('typeahead:selected', function (obj, datum) {
    $("#custId").val(datum.id);
});
</script>
<script>
	$('#search_kw').change(function() { // do something
		alert(this.val());
		} );
</script>
    <!-- /page content --> 