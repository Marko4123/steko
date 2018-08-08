$(document).ready(function() {
  //Check to see if the window is top if not then display button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 300) {
      $(".top-btn").fadeIn();
    } else {
      $(".top-btn").fadeOut();
    }
  });

  //Click event to scroll to top
  $(".top-btn").click(function() {
    $("html, body").animate({ scrollTop: 0 }, 800);
    return false;
  });
});
