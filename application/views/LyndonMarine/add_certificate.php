<?php
include'includes/header_login.php';
?>
<section id="main-edit">
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-6">
        <div class="page-heading">
          <h2>Add Certificate</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="main-editone">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="form-action">
          <form>
            <div class="row">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Photo1 </label>
                <input required type="file" name="photo1" id="photo1" accept="image/*">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-12">
                <label class="control-label">Certificate No</label>
                <input type="text" placeholder="Certificate No" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Type</label>
                <input type="text" placeholder="Type" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Certificate</label>
                <input type="text" placeholder="Certificate" name="certificate" id="certificate" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Issued on</label>
                <input type="text" placeholder="Issued on" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Expires on</label>
                <input type="text" placeholder="Expires on" class="form-control-text">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label class="control-label">Postponed</label>
                <input type="text" placeholder="Postponed" class="form-control-text">
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Excemption</label>
                <input type="text" placeholder="Excemption" class="form-control-text">
              </div>
            </div>
            <button type="submit" name="submit" class="btn btn-black">Save </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
include'includes/footer.php';
?>