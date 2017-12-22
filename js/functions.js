(function ($) {

$('li a[href*="twitter"]').prepend(function () {
  return '<span class="' + $(this).text() + ' fab fa-twitter"></span>';
});
$('li a[href*="instagram"]').prepend(function () {
  return '<span class="' + $(this).text() + ' fab fa-instagram"></span>';
});
$('li a[href*="mailto"]').prepend(function () {
  return '<span class="' + $(this).text() + ' fas fa-envelope"></span>';
});
$(function ($) {
  // var event = $( "#accordion" ).accordion( "option", "event" );
  $("#accordion").accordion({
    active:1,
    collapsible: true,
    "font-family": "$font__headings"
  });
  $(".ui-accordion-header").on({
    click: function() {
      $(".ui-accordion-header").css({
        "background-color": "white",
        "outline": "none",
        "overflow":"visible"
      }),
      $(".ui-widget-content b small").css({
        "display":"block",
        "font-style": "italic",
        "margin-top": "4px",
        "color":"darkslategrey"
      })
    }
 
  });  
}); //end #accordion h3.ui-accordion-header
})(jQuery);
