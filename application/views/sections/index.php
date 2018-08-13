<div class="jumbotron">
  <div class="container">
    <h1><?= $title ?></h1>
    <h5><?= $_SESSION['bul_title']; ?></h5>     
    <a class="btn btn-primary" href="<?php echo base_url(); ?>sections/create">
      <i class="fa fa-plus"></i>
      New
    </a>
    <a class="btn btn-secondary" href="<?php echo base_url(); ?>bulletins/exit" role="button">
      <i class="fa fa-arrow-left"></i>
      Back
    </a>
  </div>
</div>
<div class="container">
  <div id="accordion">
    <?php foreach($sections as $sec) : ?>
      <div class="card border-dark mb-3">
        <div class="card-header" id="heading<?php echo $sec['id']; ?>">
          <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $sec['id']; ?>" aria-expanded="true" aria-controls="collapse<?php echo $sec['id']; ?>">
              <?php echo $sec['title']; ?>
            </button>
          </h5>
        </div>

        <div id="collapse<?php echo $sec['id']; ?>" class="collapse" data-parent="#accordion">
          <div class="card-body">
            <p class="card-text">
              <?php echo $sec['content']; ?>
            </p>  
          </div>
          <div class="card-footer text-center">
            <button class="btn btn-primary">
              <i class="fa fa-edit"></i>  
              Edit 
            </button>
            <button class="btn btn-danger">
              <i class="fa fa-trash"></i>    
              Remove
            </button>
          </div>
        </div>
      </div>    
      <p></p>
    <?php endforeach; ?>
  </div>
</div>

