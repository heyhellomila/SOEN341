
$(document).ready(function(){   
   
     $(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 100) {
    $('#topPage').show("slide", { direction: "right" }, 1000);
  } else {
    $('#topPage').hide("slide", { direction: "right" }, 1000);
  }
});



});