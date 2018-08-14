<div class="nav-content container">
      <h3><?=$title?></h3>
      <br>
    </div>
  </nav>
<div class="container section">
<?php echo form_open_multipart('sections/save'); ?>
  <div class="row">
    <div class="input-field col s12">
      <input id="title" name="title" type="text" class="validate <?php if (form_error('title')) {echo 'invalid';}?>">
        <label for="title">Title *</label>        
        <span class="helper-text" data-error="<?php echo form_error('title', ' ', ' '); ?>">Inform the section title</span>        
      </div>
    </div>

    <div class="row">
      <div class="file-field input-field">
        <div class="btn">
          <span>Open</span>
          <input type="file" id="icon" name="icon">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Choose a 24px icon">
        </div>
      </div>
    </div>

    <div class="row">
      <label for="editor">Content</label>        
      <textarea name="content" rows="15" id="content"></textarea>
    </div>

    <div class="row">
      <small>* Required fields</small>
    </div>      
    <div class="row">
        <button class="btn waves-effect waves-light blue" type="submit">
          Save
          <i class="material-icons left">save</i>          
        </button>
        <a href="<?php echo site_url(); ?>sections/index" class="waves-effect waves-light btn grey">
          Cancel
          <i class="material-icons left">close</i>          
        </a>
    </div>
  </form>
