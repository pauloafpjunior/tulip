<?php echo form_open_multipart('organizations/save'); ?>
  <div class="jumbotron">
    <div class="container">
      <h1><?= $title ?></h1>  
      <button type="submit" class="btn btn-primary">
        <i class="fa fa-save"></i> 
        Salvar
      </button>
    </div>
  </div>
  <div class="container">
  <div class="form-group" ?>
    <label for="name">Nome *</label>
    <input type="text" class="form-control  <?php if(form_error('name')){echo 'is-invalid';} ?>" id="name" name="name" placeholder="Informe o nome da organização">
    <?php echo form_error('name', '<div class="invalid-feedback">' ,'</div>'); ?>
  </div>
  <div class="form-group">
    <label for="description">Descrição</label>
    <textarea class="form-control" id="description" name="description" rows="3" 
      placeholder="Descreva brevemente sua organização..."></textarea>
  </div>
  <div class="form-group">
    <div class="custom-file">
      <input type="file" class="custom-file-input" id="image" name="image" size="20">
      <label class="custom-file-label" for="image">Escolha uma imagem</label>
    </div> 
  </div>  
  <small>* Campos obrigatórios</small>

</form>