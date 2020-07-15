(function($) {
  $(document).ready(function() {
    console.log('editor connected');

    var heroSlider = {
      settings: {
        slideSettings: {
          dots: true,
          arrows: false,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 5000
        }
      },
      init: function() {
        if(!!$('.hero-slider-container')) {
          if($('.hero-slider-container.slick-slider').length > 0) {
            $('.hero-slider-container').slick('unslick');
          }
          $('.hero-slider-container').slick(this.settings.slideSettings);
        }


      }
    }
    heroSlider.init();

  });
}(jQuery))