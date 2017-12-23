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
})(jQuery);
