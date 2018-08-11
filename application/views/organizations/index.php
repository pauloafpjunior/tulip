<div class="jumbotron">
  <div class="container">
    <h1><?= $title ?></h1>  
    <a class="btn btn-primary" href="<?php echo base_url(); ?>organizations/create" role="button">
      <i class="fa fa-plus"></i>
      New
    </a>
  </div>
</div>
<div class="container">
 <?php foreach($organizations as $org) : ?>
  <div class="row">
		<div class="col-md-3">
    <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/organizations/<?php echo $org['image']; ?>"/>
    <br/><br/>
  </div>
	<div class="col-md-9">
    
  <h5><strong><?php echo $org['name']; ?></strong></h5>
    <small class="post-date">Last updated on: <?php echo time_elapsed_string($org['last_updated']) ?></small>

    <?php echo word_limiter($org['description'], 60).'...'; ?>
    <a href="#" class="badge badge-light" data-toggle="modal" data-target="#modal<?php echo $org['id'] ?>">Read more</a>
    <br><br>
     <a href="<?php echo base_url(); ?>organizations/view/<?php echo $org['id']; ?>" class="btn btn-outline-success">
      <i class="fa fa-file-alt"></i>
      Bulletins
     </a>
     <a href="#" class="btn btn-outline-primary">
      <i class="fa fa-edit"></i>
      Edit
     </a>   
   </div>
</div>
<br><br>
  
<!-- Modal -->
<div class="modal fade" id="modal<?php echo $org['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">
          <?php echo $org['name']?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php echo $org['description']?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          <i class="fa fa-times"></i>
          Close
        </button>
      </div>
    </div>
  </div>
</div>

<?php endforeach; ?>
</div>

