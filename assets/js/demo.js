$(function() {
  // owl carousel script starts
  if ($("#main-banner-carousel").length) {
    $("#main-banner-carousel").owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplaySpeed: 2000,
      autoplayHoverPause: true,
      autoWidth: false,
      dots: true,
      margin: 0,
      responsiveClass: true,
      responsive: {
        0: {
          items: 1
        },
        320: {
          items: 1
        }
      }
    });
  }

  // scroll header script here
  window.onscroll = function() {
    scrollHeader();
  };
  // Get the header
  var header = $(".navbar-bottom-menu");
  var body = $("body");
  function scrollHeader() {
    // adding sticky class
    if (window.pageYOffset > 105) {
      $(header).addClass("sticky");
    } else {
      // removing sticky class
      $(header).removeClass("sticky");
    }
  }

  // navbar toggler script
  $(".navbar-toggler").on("click", function() {
    $(".collapse").toggleClass("show");
    $("body").toggleClass("layer-open");
    // $(header).toggleClass("sticky-not");
    $(".navbar-close").show();
  });
  $(".navbar-close").on("click", function() {
    $(".collapse").toggleClass("show");
    $(".navbar-close").hide();
    $("body").toggleClass("layer-open");
    // $(header).toggleClass("sticky-not");
    $(".dark-overlay").click(function() {
      $(".collapse").removeClass("show");
      $("body").removeClass("layer-open");
    });
  });
});
