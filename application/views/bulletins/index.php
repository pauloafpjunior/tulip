  <div class="nav-content container">
      <h4><?=$title?></h4>
      <div>
        <a href="<?php echo site_url(); ?>organizations/exit_org" class="waves-effect waves-light btn-small grey">Voltar</a>
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
      <div class="col s12 m6 l3" style="text-align: center">
        <img class="responsive-img image-thumb" src="<?php echo $bul['image']; ?>"/>
      </div>
      <div class="col s12 m6 l9">            
        <h5>
          <strong><?php echo $bul['title']; ?></strong>
        </h5>
        <p><i><?php echo $bul['subtitle']; ?></i></p>
        <div class="switch">
            <label class="tooltipped" data-position="right" data-tooltip="The bulletin must be pusblished before notifying the users.">
              Não publicado
              <input onchange="window.location.href='<?php echo site_url(); ?>bulletins/publish/<?php echo $bul['id'] ?>'"  
                type="checkbox" <?php if($bul['published']) { echo 'checked'; } ?> id="published" 
                name="published">
              <span class="lever"></span>
              Publicado
            </label>
        </div>
        <p class="grey lighten-2">Última atualização: <?php echo time_elapsed_string($bul['created_at']) ?></p>      
        <a class="btn waves-effect waves-light btn teal" href="<?php echo site_url(); ?>bulletins/entry/<?php echo $bul['id']; ?>">
          <i class="material-icons right">send</i>
          Entrar
        </a>
        <a class='btn waves-effect waves-light btn blue-grey' href='#'>
          <i class="material-icons left">edit</i>
          Editar
        </a>
        <a class='btn green' <?php if(!$bul['published']) { echo 'disabled'; } ?> href="<?php echo site_url(); ?>bulletins/notify_users/<?php echo $bul['id']; ?>">
          <i class="material-icons left">notifications</i>
          Notificar usuários
        </a>
        
        
      </div>
    </div>  
    <?php endforeach; ?>
</div>

