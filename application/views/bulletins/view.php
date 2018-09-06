<div class="nav-content container">
      <h4><?=$title?></h4>
      <br>
    </div>
  </nav>
  <div class="container section">
    <div class="row">
      <div class="col s12 m6 l3" style="text-align: center">
        <img class="responsive-img image-thumb" src="<?php echo $bul->image; ?>"/>
      </div>
      <div class="col s12 m6 l9">            
      <h5>
          <strong><?php echo $bul->title; ?></strong>
        </h5>
        <p><i><?php echo $bul->subtitle; ?></i></p>
        <p class="grey lighten-2">Última atualização: <?php echo time_elapsed_string($bul->created_at) ?></p>      
        <a class="btn waves-effect waves-light teal" target="_blank" href="https://play.google.com/store/apps/details?id=com.aws.tulipapp">
          <i class="material-icons left">android</i>          
          Baixar App
        </a>
      </div>
    </div>

    <div class="row">
      <ul class="collapsible">
        <?php foreach($sections as $sec) : ?>
        <li>
            <div class="collapsible-header">
                <img class="responsive-img" style="height: 24px;" src="<?php echo $sec['icon']; ?>"/>
                &nbsp;&nbsp;<?php echo $sec['title']; ?>
            </div>
            <div class="collapsible-body"><?php echo $sec['content']; ?></div>
        </li>
        <?php endforeach; ?>
    </ul>
  </div>


</div>
