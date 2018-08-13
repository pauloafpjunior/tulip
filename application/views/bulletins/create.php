<?php echo form_open_multipart('bulletins/save'); ?>

  <div class="jumbotron">
    <div class="container">
      <h1><?=$title?></h1>
      <h5><?= $_SESSION['org_name']; ?></h5>     
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i>
        Save
      </button>
      <a class="btn btn-secondary" href="<?php echo base_url(); ?>bulletins/index">
        <i class="fa fa-times"></i>
        Cancel
      </a>
      <small>* Required fields</small>
    </div>
  </div>
  <div class="container">
    <div class="form-group" ?>
      <label for="name">Title *</label>
      <input type="text" class="form-control <?php if (form_error('title')) {echo 'is-invalid';}?>" id="title"
        name="title" placeholder="Inform the bulletin title">
      <?php echo form_error('title', '<div class="invalid-feedback">', '</div>'); ?>
    </div>
    <div class="form-group">
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="image" name="image">
        <label class="custom-file-label" for="image">Choose an image</label>
      </div>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="published" name="published">
      <label class="form-check-label" for="published">
        Yes, I want to publish this bulletin
      </label>
    </div>        
  </div>
</form>