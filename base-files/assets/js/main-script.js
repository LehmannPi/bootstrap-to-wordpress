(function ($) {
  "use strict";

  // mobile nav

  if ($(".sub-menu").length) {
    $(".main-menu li.menu-item-has-children").append(
      '<div class="dropdown-btn"><i class="flaticon flaticon-arrow-down-sign-to-navigate"></i></div>'
    );

    // Dropdown Button functionalities
    // $(this).prev('.sub-menu').slideToggle(500);

    // Disable dropdown previous link
    // $('li.menu-item-has-children > a, .side-menu li.menu-item-has-children > a').on('click', () => {
    // 	e.preventDefault();
    // })
  }

  if ($(".mobile-menu").length) {
    var mobileMenuContent = $("#top-navigation .navigation").html();

    $(".mobile-menu .navigation").append(mobileMenuContent);

    $(".sticky-header .navigation").append(mobileMenuContent);

    $(".mobile-menu .close-btn").on("click", function () {
      $("body").removeClass("mobile-menu-visible");
    });

    // Dropdown button
    $("li.menu-item-has-children .dropdown-btn").on("click", function () {
      $(this).prev(".sub-menu").slideToggle(500);
    });

    // Menu Toggle button add
    $(".mobile-nav-toggler").on("click", function () {
      $("body").addClass("mobile-menu-visible");
    });

    // Menu Toggle button remove
    $(".mobile-menu .menu-backdrop, .mobile-menu .close-btn").on(
      "click",
      () => {
        $("body").removeClass("mobile-menu-visible");
      }
    );
  }
})(jQuery);
