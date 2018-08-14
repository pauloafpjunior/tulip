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

ClassicEditor
  .create( document.querySelector( '#content' ), {
      toolbar: [ 'heading', '|', 'alignment', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]      
    })    
    .catch( error => {
      console.error( error );
    }); 
