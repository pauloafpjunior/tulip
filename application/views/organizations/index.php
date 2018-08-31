    <div class="nav-content container">
      <h4><?=$title?></h4>
      <br>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light blue" 
        href="<?php echo site_url(); ?>organizations/create">
        <i class="material-icons">add</i>
      </a>      
    </div>
  </nav>
  <div class="container section">
  <?php foreach ($organizations as $org): ?>
    <div class="row">
      <div class="col s12 m6 l3" style="text-align: center">
        <img class="responsive-img image-thumb" src="<?php echo $org['image']; ?>"/>
      </div>
      <div class="col s12 m6 l9">            
        <h5><strong><?php echo $org['name']; ?></strong></h5>
        <p class="grey lighten-2">Última atualização: <?php echo time_elapsed_string($org['last_updated']) ?></p>      
        <?php echo word_limiter($org['description'], 45).'...'; ?>
        <a class="modal-trigger" href="#modalReadmore<?php echo $org['id'];?>">Leia mais</a>
        <br/><br/>
        <a class="btn waves-effect waves-light teal" href="<?php echo site_url(); ?>organizations/entry/<?php echo $org['id']; ?>">
          <i class="material-icons right">send</i>          
          Entrar
        </a>
        <a class='btn waves-effect waves-light blue-grey' href="<?php echo site_url(); ?>organizations/edit/<?php echo $org['id']; ?>">
          <i class="material-icons left">edit</i>
          Editar
        </a>
      </div>
    </div>

    <!-- Modal -->
    <div id="modalReadmore<?php echo $org['id']; ?>" class="modal">
      <div class="modal-content">
        <h5><?php echo $org['name']; ?></h5>
        <p><?php echo $org['description']; ?></p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close btn grey">
          Fechar
          <i class="material-icons left">close</i>          
        </a>
      </div>
    </div>

  <?php endforeach;?>
</div>
