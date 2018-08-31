<div class="nav-content container">
      <h4><?=$title?></h4>
      <br>
      <a class="btn-floating btn-large halfway-fab waves-effect waves-light blue" 
        href="#">
        <i class="material-icons">add</i>
      </a>      
    </div>
  </nav>
  <div class="container section">
  <?php echo form_open('users/login'); ?>
    <div class="row">
      <div class="input-field col s12">
        <input id="email" name="email" type="email" class="validate <?php if (form_error('email')) {echo 'invalid';}?>">
        <label for="email">Email</label>        
        <span class="helper-text" data-error="<?php echo form_error('email', ' ', ' '); ?>">Informe seu endereço de email</span>        
      </div>
    </div>
    <div class="row">
      <div class="input-field col s12">
        <input id="password" name="password" type="password" class="validate <?php if (form_error('password')) {echo 'invalid';}?>">
        <label for="password">Senha</label>        
        <span class="helper-text" data-error="<?php echo form_error('password', ' ', ' '); ?>">Informe sua senha</span>        
      </div>  
    </div>    
    <div class="row">
        <button class="btn waves-effect waves-light teal" type="submit">
          Entrar
          <i class="material-icons right">send</i>          
        </button>
    </div>  
  </form>
</div>
