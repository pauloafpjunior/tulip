<div class="nav-content container">
      <h4><?=$title?></h4>
      <br>
    </div>
  </nav>
<div class="container section">
<?php echo form_open_multipart('sections/save'); ?>
  <input type="hidden" name="id" value="<?php echo $sec->id; ?>">
  <input type="hidden" name="image_path" value="<?php echo $sec->icon; ?>">
  <div class="row">
    <div class="input-field col s12">
      <input id="title" name="title" type="text" class="validate <?php if (form_error('title')) {echo 'invalid';}?>" value="<?php echo $sec->title; ?>">
        <label for="title">Título *</label>        
        <span class="helper-text" data-error="<?php echo form_error('title', ' ', ' '); ?>">Informe o título da seção</span>        
      </div>
    </div>
    <div class="row">
        <img class="responsive-img image-thumb" src="<?php echo $sec->icon; ?>"/>
    </div>
    <div class="row">
      <div class="file-field input-field">
        <div class="btn">
          <span>Procurar</span>
          <input type="file" id="icon" name="icon">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Escolha um ícone">
        </div>
      </div>
    </div>

    <div class="row">
      <label for="content">Conteúdo da seção</label>        
      <textarea name="content" rows="15" id="content">
        <?php echo $sec->content; ?>
      </textarea>
    </div>

    <div class="row">
      <small>* Campos obrigatórios</small>
    </div>      
    <div class="row">
        <button class="btn waves-effect waves-light blue" type="submit">
          Salvar
          <i class="material-icons left">save</i>          
        </button>
        <a href="<?php echo site_url(); ?>sections/index" class="waves-effect waves-light btn grey">
          Cancelar
          <i class="material-icons left">close</i>          
        </a>
    </div>
  </form>
