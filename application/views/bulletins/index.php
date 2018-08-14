  <div class="nav-content container">
      <h3><?=$title?></h3>
      <div>
        <a href="<?php echo site_url(); ?>organizations/exit_org" class="waves-effect waves-light btn-small grey">Exit</a>
        <strong>&nbsp;&nbsp;<?= $_SESSION['org_name']; ?></strong>
      </div>      
      <br>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light blue" 
        href="<?php echo site_url(); ?>bulletins/create">
        <i class="material-icons">add</i>
      </a>
  </div>
</nav>
<div class="container section">
<?php foreach ($bulletins as $bul): ?>
    <div class="row">
      <div class="col s12 m6 l3">
        <img class="responsive-img image-thumb" src="<?php echo base_url(); ?>assets/images/bulletins/<?php echo $bul['image']; ?>"/>
      </div>
      <div class="col s12 m6 l9">            
        <h5>
          <strong><?php echo $bul['title']; ?></strong>
          <div class="switch">
            <label>
              Unpublished
              <input onchange="window.location.href='<?php echo site_url(); ?>bulletins/publish/<?php echo $bul['id'] ?>'"  type="checkbox" <?php if($bul['published']) { echo 'checked'; } ?> id="published" name="published">
              <span class="lever"></span>
              Published
            </label>
          </div>
        
        </h5>
        <p class="grey lighten-2">Created at: <?php echo time_elapsed_string($bul['created_at']) ?></p>      
        <a class="waves-effect waves-light btn teal" href="<?php echo site_url(); ?>bulletins/entry/<?php echo $bul['id']; ?>">
          <i class="material-icons right">send</i>
          Entry
        </a>
        <a class='btn blue-grey' href='#'>
          <i class="material-icons left">edit</i>
          Edit
        </a>
        
        
      </div>
    </div>  
    <?php endforeach; ?>
</div>

