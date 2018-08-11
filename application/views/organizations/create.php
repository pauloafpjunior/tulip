<?php echo form_open_multipart('organizations/save'); ?>

  <div class="jumbotron">
    <div class="container">
      <h1><?= $title ?></h1>  
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> Save
      </button>
    </div>
  </div>
  <div class="container">
  <div class="form-group" ?>
    <label for="name">Name*</label>
    <input type="text" class="form-control  <?php if(form_error('name')){echo 'is-invalid';} ?>" id="name" name="name" placeholder="Inform the organization name">
    <?php echo form_error('name', '<div class="invalid-feedback">' ,'</div>'); ?>
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description" rows="3" 
      placeholder="Provide a brief description on this organization, describing the subjects you intent to spread..."></textarea>
  </div>
  <div class="form-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="image" name="image" size="20">
      <label class="custom-file-label" for="image">Choose an image</label>
    </div> 
  </div>  
  <p>* Required</p>
</form>