(function($){
  'use strict';

  // print and download Resume
  function printPdf()
  {

    // change button to spinner
    // if animations are on, then first we have to remove them
    if(($("div").hasClass("wow")))
    {
      $(".resume-print-wrapper div").css("visibility", "visible");
      $(".resume-print-wrapper li").css("visibility", "visible");
    }

    window.print();
  }

  $( document ).on( "click", ".print-resume", printPdf);

  // hijack control P and run our custom function
  jQuery(document).bind("keyup keydown", function(e){
    if(e.keyCode === 80)
    {
        printPdf();
        return false;
    }
  });


  let footer = $('.footer-buttons');
  if(footer)
  {
    // show footer only when the user scrolls down
    $(window).scroll(function() {
      if($(this).scrollTop() > 900) {
        footer.show();
      } else {
        footer.hide();
      }
    });

  }

  $( document ).ready(function() {
    $('.preloader').hide();
    $('.transition-overlay').hide();
  });


  // default-dark

  let body = $('body');
  $('#dark-theme').click(function (){

    if(!body.hasClass('default-dark'))
    {
      body.addClass('default-dark')
    }

   });

  $('#light-theme').click(function (){

    if(body.hasClass('default-dark'))
    {
      body.removeClass('default-dark')
    }

  });

})(jQuery);
