jQuery(document).ready(function () {
  // Smooth scrolling using jQuery easing
  jQuery(".smoothscroll").click(function (event) {
    if (
      location.pathname.replace(/^\//, "") ==
        this.pathname.replace(/^\//, "") &&
      location.hostname == this.hostname
    ) {
      var target = jQuery(this.hash);
      target = target.length
        ? target
        : jQuery("[name=" + this.hash.slice(1) + "]");
      if (target.length) {
        event.preventDefault();
        jQuery("html, body").animate(
          {
            scrollTop: target.offset().top - 200,
          },
          1000,
          function () {
            var jQuerytarget = jQuery(target);
            jQuerytarget.focus();
            if (jQuerytarget.is(":focus")) {
              return false;
            } else {
              jQuerytarget.attr("tabindex", "-1");
              jQuerytarget.focus();
            }
          }
        );
      }
    }
  });
  // use jquery to add/remove a class based on a scroll point
  jQuery(window).scroll(function () {
    let headerHeight = jQuery(".header").height();
    if (jQuery(window).scrollTop() > headerHeight - 50) {
      jQuery("header").addClass("header__scrolled");
    } else {
      jQuery("header").removeClass("header__scrolled");
    }
  });
  // jquery onclick 
  jQuery(".header__toggle").click(function () {
    jQuery(".header__toggle").toggleClass("header__toggle--active");
    jQuery(".header__nav").slideToggle();
  });
});
