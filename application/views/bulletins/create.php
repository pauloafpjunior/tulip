<?php echo form_open_multipart('bulletins/save'); ?>

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
    <label for="name">Title *</label>
    <input type="text" class="form-control  <?php if(form_error('title')){echo 'is-invalid';} ?>" id="title" name="title" placeholder="Inform the bulletin title">
    <?php echo form_error('title', '<div class="invalid-feedback">' ,'</div>'); ?>
  </div>
  <div class="form-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="image" name="image" size="20">
      <label class="custom-file-label" for="image">Choose an image</label>
    </div> 
  </div>
  <div class="form-group" ?>
    <label for="published">Published? </label>
    <input type="checkbox" class="form-control" id="published" name="published" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Yes" data-off="No">
  </div>
      

  <p>* Required</p>
</form>