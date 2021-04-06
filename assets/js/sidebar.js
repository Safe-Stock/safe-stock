$(document).ready(function () {
  var viewportWidth = $(window).width();
  if (viewportWidth <= 767) {
    $("#filesrank").hide();
  } else {
    $("#filesrank").show();
  }
});

$(window).resize(function () {
  var viewportWidth = $(window).width();
  if (viewportWidth <= 767) {
    $("#filesrank").hide();
  } else {
    $("#filesrank").show();
  }
});

$("#sidebarToggle").click(function () {
  $("#filesrank").toggle();
});
