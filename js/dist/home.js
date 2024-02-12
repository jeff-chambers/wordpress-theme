jQuery(document).ready(function () {
  // Testimonials carousel
  jQuery(".testimonials__carousel").slick({
    dots: false,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1
        },
      }
    ],
  });

  // Vision Carousel
  jQuery(".vision__carousel").slick({
    dots: true,
    arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1
  });

  // FAQs Accordion
  jQuery('.faqs__question').on("click", function () {
    jQuery(this).parent('.faqs__item').toggleClass('active');
    jQuery(this).siblings('.faqs__answer').slideToggle();
    jQuery(this).parent('.faqs__item').siblings('.faqs__item').removeClass('active').children('.faqs__answer').slideUp();
   });

  // Awards Carousel
  jQuery(".awards__carousel").slick({
    dots: true,
    arrows: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
    mobileFirst: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 5
        },
      }
    ],
  });
});
