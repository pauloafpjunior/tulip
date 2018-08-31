<div class="nav-content container">
      <h4><?=$title?></h4>
      <br>
    </div>
  </nav>
  <div class="container section">
    <div class="row">
      <div class="col s12 m6 l3" style="text-align: center">
        <img class="responsive-img image-thumb" src="<?php echo $org->image; ?>"/>
      </div>
      <div class="col s12 m6 l9">            
        <h5><strong><?php echo $org->name; ?></strong></h5>
        <p class="grey lighten-2">Última atualização: <?php echo time_elapsed_string($org->last_updated) ?></p>      
        <?php echo $org->description; ?>
        <br/><br/>
        <a class="btn waves-effect waves-light teal" href="#">
          <i class="material-icons left">android</i>          
          Baixar App
        </a>
      </div>
    </div>
</div>
