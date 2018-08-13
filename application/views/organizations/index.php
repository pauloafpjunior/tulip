<div class="jumbotron">
  <div class="container">
    <h1><?=$title?></h1>
    <a class="btn btn-primary" href="<?php echo base_url(); ?>organizations/create">
      <i class="fa fa-plus"></i>
      New
    </a>
  </div>
</div>
<div class="container">
<?php foreach ($organizations as $org): ?>
  <div class="row">
		<div class="col-md-3">
      <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/organizations/<?php echo $org['image']; ?>"/>
    </div>
	  <div class="col-md-9">
      <h5><strong><?php echo $org['name']; ?></strong></h5>
      <?php echo word_limiter($org['description'], 45) . '...'; ?>
      <a href="#" class="badge badge-light" data-toggle="modal" data-target="#modalReadmore<?php echo $org['id']; ?>">Read more</a>      
      <small class="post-date">Última atualização: <?php echo time_elapsed_string($org['last_updated']) ?></small>      
      <a href="<?php echo base_url(); ?>organizations/entry/<?php echo $org['id']; ?>" class="btn btn-outline-success">
        <i class="fa fa-sign-in-alt"></i>
        Entry
      </a>
      <a href="#" class="btn btn-outline-primary">
        <i class="fa fa-edit"></i>
        Edit
      </a>
    </div>    
  </div>
  <br/><br/>

  <!-- Modal -->
  <div class="modal fade" id="modalReadmore<?php echo $org['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <strong><?php echo $org['name']; ?></strong>
          </h5>
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php echo $org['description']; ?>
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


<?php endforeach;?>
</div>

