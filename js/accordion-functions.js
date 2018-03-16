(function ($) {
  $('#accordion').accordion({
    active:1,
    collapsible: true,
    'font-family': '$font__headings'
  }); 
  $('.ui-accordion-header').on({
    click: function() {
      $('.ui-accordion-header').css({
        'background-color': 'white',
        'outline': 'none',
        'overflow':'hidden'
      }),
      $('.ui-widget-content b small').css({
        'display':'block',
        'font-style': 'italic',
        'margin-top': '4px',
        'color':'darkslategrey'
      });
    }
  });
  $('figure.ui-accordion-content').addClass('fig-style');  
})(jQuery);
