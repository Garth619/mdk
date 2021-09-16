// @codekit-prepend 'waypoints.js'
// @codekit-prepend 'slick.js'
// @codekit-prepend 'underscore.js'
// @codekit-prepend 'lazysizes.js'

jQuery(document).ready(function ($) {
  $("body").addClass("ready");

  /* Wistia - Call function when script needs to be loaded either by hover or waypoints
     --------------------------------------------------------------------------------------- */

  // loads wistia on click to improve initial page speed
  $(".wistia_embed").click(function () {
    //make sure to only load if Wistia is not already loaded
    let self = this;
    if (typeof Wistia === "undefined") {
      jQuery.getScript(
        "https://fast.wistia.com/assets/external/E-v1.js",
        function (data, textStatus, jqxhr) {
          // We got the text but, it's possible parsing could take some time on slower devices. Unfortunately, js parsing does not have
          // a hook we can listen for. So we need to set an interval to check when it's ready
          var interval = setInterval(function () {
            if ($(self).attr("id") && window._wq) {
              _wq.push({
                id: "_all",
                onReady: function (video) {
                  video.play();
                },
              });
              clearInterval(interval);
            }
          }, 100);
        }
      );
    } else {
      console.log("wistia is already defined");
    }
  });

  /* Waypoints
     --------------------------------------------------------------------------------------- */

  function createWaypoint(
    triggerElementId,
    animatedElement,
    className,
    offsetVal,
    functionName,
    reverse
  ) {
    if (jQuery("#" + triggerElementId).length) {
      var waypoint = new Waypoint({
        element: document.getElementById(triggerElementId),
        handler: function (direction) {
          if (direction === "down") {
            jQuery(animatedElement).addClass(className);

            if (typeof functionName === "function") {
              functionName();
              this.destroy();
            }
          } else if (direction === "up") {
            if (reverse) {
              jQuery(animatedElement).removeClass(className);
            }
          }
        },
        offset: offsetVal,
        // Integer or percent
        // 500 means when element is 500px from the top of the page, the event triggers
        // 50% means when element is 50% from the top of the page, the event triggers
      });
    }
  }

  createWaypoint("section-one", "body", "fade-header", -185, null, true);
  createWaypoint("internal-main", "body", "fade-header", -185, null, true);

  createWaypoint("section-one", "body", "sticky", -250, null, true);
  createWaypoint("internal-main", "body", "sticky", -250, null, true);

  createWaypoint("section-two", "#section-two", "visible", -200, null, true);

  createWaypoint(
    "sec-three-slider",
    "#sec-three-slider",
    "visible",
    300,
    null,
    true
  );

  createWaypoint("section-five", "#section-five", "visible", 200, null, true);

  /* Smooth Scroll down to section on click (<a href="#id_of_section_to_be_scrolled_to">)
  --------------------------------------------------------------------------------------- */

  $(function () {
    $('a[href*="#"]:not([href="#"])').click(function () {
      if (
        location.pathname.replace(/^\//, "") ==
          this.pathname.replace(/^\//, "") &&
        location.hostname == this.hostname
      ) {
        var target = $(this.hash);
        target = target.length
          ? target
          : $("[name=" + this.hash.slice(1) + "]");
        if (target.length) {
          $("html, body").animate(
            {
              scrollTop: target.offset().top,
            },
            1000
          );
          return false;
        }
      }
    });
  });

  /* Slick Carousel ( http://kenwheeler.github.io/slick/ )
--------------------------------------------------------------------------------------- */

  $("#sec-one-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    prevArrow: ".sec-one-arrow-left",
    nextArrow: ".sec-one-arrow-right",
    adaptiveHeight: true,
    dots: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          adaptiveHeight: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 1170,
        settings: "unslick",
      },
    ],
  });

  $("#sec-three-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    prevArrow: "#sec-three-arrow-left",
    nextArrow: "#sec-three-arrow-right",
    dots: false,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          centerMode: true,
          centerPadding: "130px",
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1169,
        settings: {
          centerMode: true,
          centerPadding: "345px",
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1379,
        settings: {
          centerMode: true,
          centerPadding: "445px",
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
      {
        breakpoint: 1695,
        settings: {
          centerMode: true,
          centerPadding: "150px",
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
    ],
  });

  function caseResultsclick() {
    $(".sec-three-single-slide").not(this).removeClass("show");
    $(this).toggleClass("show");
  }

  if ($(window).width() < 1170) {
    $(".sec-three-single-slide").off().on("click", caseResultsclick);
  }

  $(window).resize(
    _.debounce(function () {
      if ($(window).width() < 1170) {
        $(".sec-three-single-slide").off().on("click", caseResultsclick);
      }
    }, 100)
  );

  $("#sec-five-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    arrows: true,
    fade: true,
    prevArrow: "#sec-five-arrow-left",
    nextArrow: "#sec-five-arrow-right",
    adaptiveHeight: true,
    dots: false,
  });

  $("#awards-slider").slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    dots: true,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          arrows: true,
          prevArrow: "#awards-arrow-left",
          nextArrow: "#awards-arrow-right",
          dots: false,
          slidesToShow: 2,
          slidesToScroll: 2,
        },
      },
      {
        breakpoint: 1100,
        settings: {
          arrows: true,
          prevArrow: "#awards-arrow-left",
          nextArrow: "#awards-arrow-right",
          dots: false,
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 1399,
        settings: {
          arrows: true,
          prevArrow: "#awards-arrow-left",
          nextArrow: "#awards-arrow-right",
          dots: false,
          slidesToShow: 4,
          slidesToScroll: 4,
        },
      },
      {
        breakpoint: 1600,
        settings: {
          arrows: true,
          prevArrow: "#awards-arrow-left",
          nextArrow: "#awards-arrow-right",
          dots: false,
          slidesToShow: 5,
          slidesToScroll: 5,
        },
      },
    ],
  });

  // $("#sec-three-slider").slick({
  //   infinite: true,
  //   slidesToShow: 2,
  //   slidesToScroll: 2,
  //   mobileFirst: true,
  //   arrows: false,
  //   adaptiveHeight: true,
  //   dots: false,
  //   responsive: [
  //     {
  //       breakpoint: 1170,
  //       settings: {
  //         adaptiveHeight: false,
  //         slidesToShow: 2,
  //         slidesToScroll: 2,
  //         dots: false,
  //         arrows: true,
  //         prevArrow: "#sec-three-arrow-left",
  //         nextArrow: "#sec-three-arrow-right",
  //       },
  //     },
  //     {
  //       breakpoint: 1380,
  //       settings: {
  //         adaptiveHeight: false,
  //         slidesToShow: 3,
  //         slidesToScroll: 3,
  //         dots: false,
  //         arrows: true,
  //         prevArrow: "#sec-three-arrow-left",
  //         nextArrow: "#sec-three-arrow-right",
  //       },
  //     },
  //   ],
  // });

  /* Remove "#" from menu anchor items to avoid jump to the top of the page
--------------------------------------------------------------------------------------- */

  $("ul > li.menu-item-has-children > a[href='#']").removeAttr("href");

  // not found go back button

  function goBack() {
    window.history.back();
  }

  $("span.go_back").on("click", function (e) {
    goBack();
  });

  /* Sidebar Widget H3 Hack
--------------------------------------------------------------------------------------- */

  $(".case-results-single-slide").on("click", function (e) {
    $(".case-results-single-slide").not(this).removeClass("show");
    $(this).toggleClass("show");
  });

  /* Sidebar Widget H3 Hack
--------------------------------------------------------------------------------------- */

  $(".widget_categories").prepend("<h3>Categories</h3>");

  /* Sidebar slideToggle
--------------------------------------------------------------------------------------- */

  $(".widget ul.menu > li.menu-item-has-children a").on("click", function (e) {
    $(this).toggleClass("active");
    $(this).next("ul").slideToggle();
  });

  /* Sidebar Current Class for Blog Sidebars
--------------------------------------------------------------------------------------- */

  // add active to blog widgets that dont show a built in current class

  var pgurl = window.location.href;

  $(".widget ul li").each(function () {
    if ($(this).find("a").attr("href") == pgurl)
      $(this).addClass("blog-active");
  });

  /* Magic Line in Nav
--------------------------------------------------------------------------------------- */

  $(".current-menu-item, .current-menu-ancestor").addClass("magic-line-active");

  $(function () {
    var $el,
      leftPos,
      newWidth,
      $mainNav = $("nav").find("ul.menu");

    $mainNav.append("<li id='magic-line'></li>");
    var $magicLine = $("#magic-line");

    if ($("nav ul.menu > li").hasClass("magic-line-active")) {
      $magicLine
        .css({
          left: $("nav").find("ul.menu > li.magic-line-active").position().left,
          width: $("nav ul.menu > li.magic-line-active a").width(),
        })
        .data("origLeft", $magicLine.position().left);
    } else {
      $magicLine
        .css({
          left: -100,
          width: $("nav ul.menu > li:first a").width(),
        })
        .data("origLeft", $magicLine.position().left);
    }

    $("nav")
      .find("ul.menu > li:not(#magic-line)")
      .hover(
        function () {
          $el = $(this);
          leftPos = $el.position().left;
          newWidth = $el.children().width();
          $magicLine.stop().animate({
            left: leftPos,
            width: newWidth,
          });
        },
        function () {
          $magicLine.stop().animate({
            left: $magicLine.data("origLeft"),
            width: $("nav ul.menu > li.magic-line-active a").width(),
          });
        }
      );
  });

  /* Resize Nav Functions
--------------------------------------------------------------------------------------- */

  // resize - tablet and desktop top navigatons behave differently. These turn off click functions at certain window widths without reloading the page

  // nav

  //$('nav ul.menu > li.current-menu-ancestor > a').addClass('active');

  $("#menu-wrapper").on("click", function (e) {
    $("nav, #nav-bg").addClass("open");
  });

  $("#close-wrapper").on("click", function (e) {
    $("nav, #nav-bg").removeClass("open");
  });

  function navDesktop() {
    $("header nav").addClass("nav_desktop");

    $("header nav li.menu-item-has-children > a")
      .next("ul.sub-menu")
      .removeClass("open");

    $("header nav").removeClass("nav_tablet");
  }

  function navTablet() {
    $("header nav").removeClass("nav_desktop");

    $("header nav").addClass("nav_tablet");
  }

  function tabletClick() {
    $(this).parent().toggleClass("active");

    $(this).toggleClass("active");

    $(this).next("ul.sub-menu").toggleClass("active");
  }

  // nav

  if ($(window).width() >= 1170) {
    navDesktop();
  }

  if ($(window).width() < 1170) {
    navTablet();

    $("header nav li.menu-item-has-children > a")
      .off()
      .on("click", tabletClick);
  }

  // resize window width and fire functions

  $(window).resize(
    _.debounce(function () {
      if ($(window).width() >= 1170) {
        navDesktop();

        // off

        $("header nav li.menu-item-has-children > a").off("click", tabletClick);
      }

      if ($(window).width() < 1170) {
        navTablet();

        // off

        $("header nav li.menu-item-has-children > a")
          .off()
          .on("click", tabletClick);
      }
    }, 100)
  );
}); // document ready
