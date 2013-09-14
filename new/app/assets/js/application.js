function dataConfirm(){
   $('a[data-confirm]').click(function(e) {
      e.preventDefault();
   
      var location = $(this).attr('href'); 
   
      bootbox.confirm($(this).data('confirm'), function(confirmed) { 
         if (confirmed) { 
            window.location.replace(location); 
         }	  
      });
   });
}

$(document).ready(function() {
   dataConfirm();
});
