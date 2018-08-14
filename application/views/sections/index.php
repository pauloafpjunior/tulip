<div class="nav-content container">
      <h3><?=$title?></h3>
      <div>
        <a href="<?php echo site_url(); ?>bulletins/exit_bul" class="waves-effect waves-light btn-small grey">Exit</a>
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
        <img class="responsive-img" style="height: 24px;" src="<?php echo base_url(); ?>assets/images/sections/<?php echo $sec['icon']; ?>"/>
        &nbsp;&nbsp;<?php echo $sec['title']; ?>
      </div>
      <div class="collapsible-body"><?php echo $sec['content']; ?></div>
    </li>
    <?php endforeach; ?>
  </ul>
</div>

