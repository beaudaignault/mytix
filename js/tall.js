(function($) {
 // Manage tall images > [height^="6"]
  var numRange =  [7, 8, 9, 10, 11, 12, 13];
  var newSize = document.createElement("a");
  var figImage = document.getElementsByTagName("img");
  var firstImage = figImage[0];
    for (var i = 0; i < numRange.length; i++) {
      var getAtt = document.querySelector("img[height^=" + CSS.escape(numRange[i]) + " ] ");
     if (getAtt){
        getAtt.setAttribute('height', '600');
        $('img').wrap('<a data-rel="lightbox-0"></a>');
     } 

    }
  }(jQuery));