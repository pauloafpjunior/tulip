<div class="nav-content container">
      <h3><?=$title?></h3>
      <br>
    </div>
  </nav>
<div class="container section">
  <?php echo form_open_multipart('organizations/save'); ?>
    <div class="row">
      <div class="input-field col s12">
        <input id="name" name="name" type="text" class="validate <?php if (form_error('name')) {echo 'invalid';}?>">
        <label for="name">Name *</label>        
        <span class="helper-text" data-error="<?php echo form_error('name', ' ', ' '); ?>">Inform the organization name</span>        
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="description" name="description" class="materialize-textarea"></textarea>
        <label for="name">Description</label>
        <span class="helper-text">Provide a description for your organization...</span>        
      </div>    
    </div>
    <div class="row">
      <div class="file-field input-field">
        <div class="btn">
          <span>Open</span>
          <input type="file" id="image" name="image">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Choose an image">
        </div>
      </div>
    </div>
    <div class="row">
      <small>* Required fields</small>
    </div>      
    <div class="row">
        <button class="btn waves-effect waves-light blue" type="submit">
          Save
          <i class="material-icons left">save</i>          
        </button>
        <a href="<?php echo base_url(); ?>organizations/index" class="waves-effect waves-light btn grey">
          Cancel
          <i class="material-icons left">close</i>          
        </a>
    </div>
  </form>
</div>
