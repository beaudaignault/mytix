(function($) {
  var numRange =  [ 1, 2, 7, 8, 9 ];
  var figImage = document.getElementsByTagName('figure');
  var firstImage = figImage[0];
    for (var i = 0; i < numRange.length; i++) {
      var getAtt = document.querySelector("img[height^=" + CSS.escape(numRange[i]) + " ] ");
     if (getAtt){
        getAtt.setAttribute('height', '600');
        $(getAtt).wrap('<a class="tall"></a>');
        firstImage.classList.add("mtx-icon");
      } 
    }
  }(jQuery));