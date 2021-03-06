// Modal
$(document).ready(function(){
  $('.modal').modal();
});

$(document).ready(function(){
  $('.collapsible').collapsible();
});

$(document).ready(function(){
  $('.fixed-action-btn').floatingActionButton();
});

$(document).ready(function(){
  $('.sidenav').sidenav();
});

$(document).ready(function(){
  $('.tooltipped').tooltip() ;
});

ClassicEditor
  .create( document.querySelector( '#content' ), {
      toolbar: [ 'heading', '|', 'alignment', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]      
    })    
    .catch( error => {
      console.error( error );
  }); 
