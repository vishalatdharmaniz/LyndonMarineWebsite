<?php
include'includes/header_login.php';
include'includes/CheckUserLogin.php';
?>
<section id="main-edit">
  <div class="container">
    
    <div class="row">
        <div class="main-edit-add-left"> <a class="btn-blue" href="<?php echo base_url();?>index.php/CrewDetails/index/<?php echo $vessel_id; ?>">Go Back</a>             
        </div>     
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Edit Crew Details </h2> <br>
        </div> 
      </div>
    </div>  
  </div>
</section>
<section id="main-editone">
  <?php 
   foreach ($crew_details as $data) 
   {
      $crew_id=$data['crew_id'];
      $name=$data['name'];
      $tourist_p_num=$data['tourist_p_num'];
      $seaman_p_num=$data['seaman_p_num'];
      $rank=$data['rank'];
      $salary=$data['salary'];
      $join_date=$data['join_date'];
      $nationality=$data['nationality'];
      $remark=$data['remark'];
      $document1=$data['document1'];
      $document2=$data['document2'];
      $document3=$data['document3'];
      $document4=$data['document4'];
      $document5=$data['document5'];
      $document6=$data['document6'];
      $document7=$data['document7'];
      $document8=$data['document8'];
      $document9=$data['document9'];
      $document10=$data['document10'];
      $document11=$data['document11'];
      $document12=$data['document12'];
      $document13=$data['document13'];
      $document14=$data['document14'];
      $document15=$data['document15'];
      $document16=$data['document16'];
      $document17=$data['document17'];
      $document18=$data['document18'];
      $document19=$data['document19'];
      $document20=$data['document20'];
   }


  ?>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-action">
          <form method="post" action="<?php echo base_url(); ?>index.php/EditCrew/index/<?php echo $crew_id ; ?>" enctype="multipart/form-data">
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Name</label>
                <input type="text" placeholder="Name" name="name" value="<?php echo $name ; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Tourist Passport Number</label>
                <input type="text" placeholder="Tourist Passport Number" value="<?php echo $tourist_p_num ; ?>" required name="tourist_p_num" class="form-control-text">
              </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                <label class="control-label">Seaman Passport Number</label>
                <input type="text" placeholder="Seaman Passport Number" value="<?php echo $seaman_p_num ; ?>" name="seaman_p_num" required class="form-control-text">
              </div>
               <div class="form-group col-md-6">
                <label class="control-label">Rank</label>
                <input type="text" placeholder="Rank" name="rank" value="<?php echo $rank ; ?>" required class="form-control-text">
              </div>
            </div>
            
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Salary (USD)</label>
                <input type="text" placeholder="Salary (USD)" name="salary" value="<?php echo $salary ; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Join Date</label>
                <input type="text" id="datepicker1" placeholder="Join Date" value="<?php echo $join_date ; ?>" name="join_date" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Nationality</label>
                <input type="text" placeholder="Nationality" name="nationality" value="<?php echo $nationality ; ?>" required class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Remark</label>
                <input type="text" placeholder="Remark" name="remark" value="<?php echo $remark ; ?>"  class="form-control-text">
              </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document1-chosen" name="document1"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document1 )) {?>
                    
                      <span id = "show-document1">
                      <a href="<?php echo $document1 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document1 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document1" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document2-chosen" name="document2"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document2 )) {?>
                    
                      <span id = "show-document2">
                      <a href="<?php echo $document2 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document2 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document2" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document3-chosen" name="document3"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document3 )) {?>
                    
                      <span id = "show-document3">
                      <a href="<?php echo $document3 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document3 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document3" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document4-chosen" name="document4"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document4 )) {?>
                    
                      <span id = "show-document4">
                      <a href="<?php echo $document4 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document4 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document4" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document5-chosen" name="document5"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document5 )) {?>
                    
                      <span id = "show-document5">
                      <a href="<?php echo $document5 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document5 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document5" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document6-chosen" name="document6"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document6)) {?>
                    
                      <span id = "show-document6">
                      <a href="<?php echo $document6 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document6 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document6" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document7-chosen" name="document7"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document7 )) {?>
                    
                      <span id = "show-document7">
                      <a href="<?php echo $document7 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document7 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document7" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document8-chosen" name="document8"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document8 )) {?>
                    
                      <span id = "show-document8">
                      <a href="<?php echo $document8 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document8 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document8" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document9-chosen" name="document9"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document9 )) {?>
                    
                      <span id = "show-document9">
                      <a href="<?php echo $document9 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document9 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document9" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document10-chosen" name="document10"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document10 )) {?>
                    
                      <span id = "show-document10">
                      <a href="<?php echo $document10 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document10 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document10" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document11-chosen" name="document11"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document11 )) {?>
                    
                      <span id = "show-document11">
                      <a href="<?php echo $document11 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document11 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document11" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document12-chosen" name="document12"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document12 )) {?>
                    
                      <span id = "show-document12">
                      <a href="<?php echo $document12 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document12 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document12" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document13-chosen" name="document13"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document13 )) {?>
                    
                      <span id = "show-document13">
                      <a href="<?php echo $document13 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document13 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document13" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document14-chosen" name="document14"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document14 )) {?>
                    
                      <span id = "show-document14">
                      <a href="<?php echo $document14 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document14 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document14" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document15-chosen" name="document15"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document15 )) {?>
                    
                      <span id = "show-document15">
                      <a href="<?php echo $document15 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document15 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document15" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document16-chosen" name="document16"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document16 )) {?>
                    
                      <span id = "show-document16">
                      <a href="<?php echo $document16 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document16 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document16" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document17-chosen" name="document17"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document17 )) {?>
                    
                      <span id = "show-document17">
                      <a href="<?php echo $document17 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document17 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document17" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document18-chosen" name="document18"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document18 )) {?>
                    
                      <span id = "show-document18">
                      <a href="<?php echo $document18 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document18 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document18" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document19-chosen" name="document19"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document19 )) {?>
                    
                      <span id = "show-document19">
                      <a href="<?php echo $document19 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document19 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document19" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                  <div class="col-md-4">
                    <label class="control-label">Upload Document (max size 64mb)</label>
                    <input type="file" id="document20-chosen" name="document20"  accept="png, jpg/*"><br>
                  </div>
                   <div class="col-md-8" id="document_view">
                    <br>
                    <?php if(!empty($document20 )) {?>
                    
                      <span id = "show-document20">
                      <a href="<?php echo $document20 ;  ?>" class="btn btn-primary"> View</a>&nbsp;
                      <?php $value = explode("/",$document20 );
                         
                            echo substr($value[6],0,25); 
                        ?>
                       <button type="button"  class="btn btn-danger" id="remove-document20" style="margin-left:10px;">Remove</button>
                      </span>
                      
                      <?php } 
                      else { ?>
                      <span> No Document Available </span>
                      <?php } ?>
                  </div> 
                </div>
            </div>

            <input type="hidden" name="document1-removed" id="document1-removed">
            <input type="hidden" name="document2-removed" id="document2-removed">
            <input type="hidden" name="document3-removed"  id="document3-removed">
            <input type="hidden" name="document4-removed"  id="document4-removed">
            <input type="hidden" name="document5-removed"  id="document5-removed">
            <input type="hidden" name="document6-removed"  id="document6-removed">
            <input type="hidden" name="document7-removed"  id="document7-removed">
            <input type="hidden" name="document8-removed"  id="document8-removed">
            <input type="hidden" name="document9-removed"  id="document9-removed">
            <input type="hidden" name="document10-removed"  id="document10-removed">
            <input type="hidden" name="document11-removed"  id="document11-removed">
            <input type="hidden" name="document12-removed"  id="document12-removed">
            <input type="hidden" name="document13-removed"  id="document13-removed">
            <input type="hidden" name="document14-removed"  id="document14-removed">
            <input type="hidden" name="document15-removed"  id="document15-removed">
            <input type="hidden" name="document16-removed"  id="document16-removed">
            <input type="hidden" name="document17-removed"  id="document17-removed">
            <input type="hidden" name="document18-removed"  id="document18-removed">
            <input type="hidden" name="document19-removed"  id="document19-removed">
            <input type="hidden" name="document20-removed"  id="document20-removed">


            <button type="submit" class="btn btn-black">Save </button>

          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
include'includes/footer.php';
?>
<script>
  $( function() {
    $( "#datepicker1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
  } );
    $('#selectedvalue').hide();
  $("#remove-document1").click(function(){
      document.getElementById("document1-removed").value = '1';
      document.getElementById("show-document1").style.display = 'none';
    });
  $("#remove-document2").click(function(){
      document.getElementById("document2-removed").value = '1';
      document.getElementById("show-document2").style.display = 'none';
    });
  $("#remove-document3").click(function(){
      document.getElementById("document3-removed").value = '1';
      document.getElementById("show-document3").style.display = 'none';
    });
  $("#remove-document4").click(function(){
      document.getElementById("document4-removed").value = '1';
      document.getElementById("show-document4").style.display = 'none';
    });
  $("#remove-document5").click(function(){
      document.getElementById("document5-removed").value = '1';
      document.getElementById("show-document5").style.display = 'none';
    });
  $("#remove-document6").click(function(){
      document.getElementById("document6-removed").value = '1';
      document.getElementById("show-document6").style.display = 'none';
    });
  $("#remove-document7").click(function(){
      document.getElementById("document7-removed").value = '1';
      document.getElementById("show-document7").style.display = 'none';
    });
  $("#remove-document8").click(function(){
      document.getElementById("document8-removed").value = '1';
      document.getElementById("show-document8").style.display = 'none';
    });
  $("#remove-document9").click(function(){
      document.getElementById("document9-removed").value = '1';
      document.getElementById("show-document9").style.display = 'none';
    });
  $("#remove-document10").click(function(){
      document.getElementById("document10-removed").value = '1';
      document.getElementById("show-document10").style.display = 'none';
    });
  $("#remove-document11").click(function(){
      document.getElementById("document11-removed").value = '1';
      document.getElementById("show-document11").style.display = 'none';
    });
  $("#remove-document12").click(function(){
      document.getElementById("document12-removed").value = '1';
      document.getElementById("show-document12").style.display = 'none';
    });
  $("#remove-document13").click(function(){
      document.getElementById("document13-removed").value = '1';
      document.getElementById("show-document13").style.display = 'none';
    });
  $("#remove-document14").click(function(){
      document.getElementById("document14-removed").value = '1';
      document.getElementById("show-document14").style.display = 'none';
    });
  $("#remove-document15").click(function(){
      document.getElementById("document15-removed").value = '1';
      document.getElementById("show-document15").style.display = 'none';
    });
  $("#remove-document16").click(function(){
      document.getElementById("document16-removed").value = '1';
      document.getElementById("show-document16").style.display = 'none';
    });
  $("#remove-document17").click(function(){
      document.getElementById("document17-removed").value = '1';
      document.getElementById("show-document17").style.display = 'none';
    });
  $("#remove-document18").click(function(){
      document.getElementById("document18-removed").value = '1';
      document.getElementById("show-document18").style.display = 'none';
    });
  $("#remove-document19").click(function(){
      document.getElementById("document19-removed").value = '1';
      document.getElementById("show-document19").style.display = 'none';
    });
  $("#remove-document20").click(function(){
      document.getElementById("document20-removed").value = '1';
      document.getElementById("show-document20").style.display = 'none';
    });

$("#document1-chosen").click(function(){
      document.getElementById("document1-removed").value = '0';
  
    });
$("#document2-chosen").click(function(){
      document.getElementById("document2-removed").value = '0';
  
    });
$("#document3-chosen").click(function(){
      document.getElementById("document3-removed").value = '0';
  
    });
$("#document4-chosen").click(function(){
      document.getElementById("document4-removed").value = '0';
  
    });
$("#document5-chosen").click(function(){
      document.getElementById("document5-removed").value = '0';
  
    });
$("#document6-chosen").click(function(){
      document.getElementById("document6-removed").value = '0';
  
    });
$("#document7-chosen").click(function(){
      document.getElementById("document7-removed").value = '0';
  
    });
$("#document8-chosen").click(function(){
      document.getElementById("document8-removed").value = '0';
  
    });
$("#document9-chosen").click(function(){
      document.getElementById("document9-removed").value = '0';
  
    });
$("#document10-chosen").click(function(){
      document.getElementById("document10-removed").value = '0';
  
    });
$("#document10-chosen").click(function(){
      document.getElementById("document10-removed").value = '0';
  
    });
$("#document11-chosen").click(function(){
      document.getElementById("document11-removed").value = '0';
  
    });
$("#document12-chosen").click(function(){
      document.getElementById("document12-removed").value = '0';
  
    });
$("#document13-chosen").click(function(){
      document.getElementById("document13-removed").value = '0';
  
    });
$("#document14-chosen").click(function(){
      document.getElementById("document14-removed").value = '0';
  
    });
$("#document15-chosen").click(function(){
      document.getElementById("document15-removed").value = '0';
  
    });
$("#document16-chosen").click(function(){
      document.getElementById("document16-removed").value = '0';
  
    });
$("#document17-chosen").click(function(){
      document.getElementById("document17-removed").value = '0';
  
    });
$("#document18-chosen").click(function(){
      document.getElementById("document18-removed").value = '0';
  
    });
$("#document19-chosen").click(function(){
      document.getElementById("document19-removed").value = '0';
  
    });
$("#document20-chosen").click(function(){
      document.getElementById("document20-removed").value = '0';
  
    });
</script>