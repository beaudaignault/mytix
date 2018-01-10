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

  // set the current menu link class

  var url = window.location.href;
  var activePage = url;
  $('.menu-item a').each(function () {
    var linkPage = this.href;
    if (activePage == linkPage) {
      $(this).closest('li').addClass('active');
    }
  });

})(jQuery);
