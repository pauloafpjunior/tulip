<div class="nav-content container">
      <h4><?=$title?></h4>
      <br>
    </div>
  </nav>
<div class="container section">
  <?php echo form_open_multipart('private/organizations/save'); ?>
    <input type="hidden" name="id" value="<?php echo $org->id; ?>">
    <input type="hidden" name="image_path" value="<?php echo $org->image; ?>">
    <div class="row">
      <div class="input-field col s12">
        <input id="name" name="name" type="text" class="validate <?php if (form_error('name')) {echo 'invalid';}?>" value="<?php echo $org->name; ?>">
        <label for="name">Nome *</label>        
        <span class="helper-text" data-error="<?php echo form_error('name', ' ', ' '); ?>">Informe o nome da organização</span>        
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <textarea id="description" name="description" class="materialize-textarea"><?php echo $org->description; ?></textarea>
        <label for="name">Descrição</label>
        <span class="helper-text">Descreva sua organização aqui...</span>        
      </div>    
    </div>
    <div class="row">
        <img class="responsive-img image-thumb" src="<?php echo $org->image; ?>"/>
    </div>
    <div class="row">
      <div class="file-field input-field">
        <div class="btn">
          <span>Procurar</span>
          <input type="file" id="image" name="image">
        </div>
        <div class="file-path-wrapper">
          <input class="file-path validate" type="text" placeholder="Escolha uma imagem">
        </div>
      </div>
    </div>
    <div class="row">
      <small>* Campos obrigatórios</small>
    </div>      
    <div class="row">
        <button class="btn waves-effect waves-light blue" type="submit">
          Salvar
          <i class="material-icons left">save</i>          
        </button>
        <a href="<?php echo base_url(); ?>private/organizations/index" class="waves-effect waves-light btn grey">
          Cancelar
          <i class="material-icons left">close</i>          
        </a>
    </div>
  </form>
</div>
