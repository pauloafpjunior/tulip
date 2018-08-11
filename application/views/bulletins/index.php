<div class="jumbotron">
  <div class="container">
    <h1><?= $title ?></h1>  
    <h4><strong><?= $organization->name ?></strong></h4><br/>  
    <a class="btn btn-primary" href="<?php echo base_url(); ?>bulletins/create" role="button">
      <i class="fa fa-plus"></i>
      New
    </a>
  </div>
</div>
<div class="container">
 <?php foreach($bulletins as $bul) : ?>
  <div class="row">
		<div class="col-md-3">
    <img class="post-thumb" src="<?php echo site_url(); ?>assets/images/bulletins/<?php echo $bul['image']; ?>"/>
    <br/><br/>
  </div>
	<div class="col-md-9">
    
  <h5><strong><?php echo $bul['title']; ?></strong></h5>
    <small class="post-date">Created on: <?php echo time_elapsed_string($bul['created_at']) ?></small>
    <br>
    <a href="#" class="btn btn-outline-success">
      <i class="fa fa-file-alt"></i>
      Sections
    </a>
     <a href="#" class="btn btn-outline-primary">
      <i class="fa fa-edit"></i>
      Edit
     </a>   
   </div>
</div>
<br><br>
  
<?php endforeach; ?>
</div>

