<div class="nav-content container">
      <h4><?=$title?></h4>
      <div>
        <a href="<?php echo site_url(); ?>bulletins/exit_bul" class="waves-effect waves-light btn-small grey">Voltar</a>
        <strong>&nbsp;&nbsp;<?= $_SESSION['bul_title']; ?></strong>
      </div>      
      <br>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light blue" 
        href="<?php echo site_url(); ?>sections/create">
        <i class="material-icons">add</i>
      </a>
  </div>
</nav>
<div class="container section">
  <ul class="collapsible">
    <?php foreach($sections as $sec) : ?>
    <li>
      <div class="collapsible-header">
        <img class="responsive-img" style="height: 24px;" src="<?php echo $sec['icon']; ?>"/>
        &nbsp;&nbsp;<?php echo $sec['title']; ?>
      </div>
      <div class="collapsible-body">
        <?php echo $sec['content']; ?>
        <br/><br/>
        <a class='btn waves-effect waves-light btn blue-grey' href="<?php echo site_url(); ?>sections/edit/<?php echo $sec['id']; ?>">
          <i class="material-icons left">edit</i>
          Editar
        </a>
        <a class='btn waves-effect waves-light btn red modal-trigger' href="#modalRemove<?php echo $sec['id']; ?>">
          <i class="material-icons left">delete</i>
          Remover
        </a>
      </div>
    </li>
    <!-- Modal -->
    <div id="modalRemove<?php echo $sec['id']; ?>" class="modal">
      <div class="modal-content">
        <h5>Atenção</h5>
        <p>
          Deseja realmente remover a seção <strong><?php echo $sec['title']; ?></strong>?
        </p>
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-close btn grey">
          Não
        </a>
        <a href="<?php echo site_url(); ?>sections/remove/<?php echo $sec['id']; ?>" class="modal-close btn red">
          Sim
          <i class="material-icons left">delete</i>          
        </a>
      </div>
    </div>


    <?php endforeach; ?>
  </ul>
</div>