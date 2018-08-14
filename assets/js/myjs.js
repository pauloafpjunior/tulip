// Modal
$(document).ready(function(){
    $('.modal').modal();
});

$(document).ready(function(){
  $('.collapsible').collapsible();
});


$(document).ready(function(){
  $('input.autocomplete').autocomplete({
    data: {
      "Apple": null,
      "Microsoft": null,
      "Google": "save"
    },
  });
});

ClassicEditor
  .create( document.querySelector( '#content' ), {
      toolbar: [ 'heading', '|', 'alignment', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]      
    })    
    .catch( error => {
      console.error( error );
    }); 

CKEDITOR.editorConfig = function( config ) {
      config.language = 'es';
      config.uiColor = '#F7B42C';
      config.height = 300;
      config.toolbarCanCollapse = true;
    };