// Add your custom JS here.
(function ($) {
	$(document).ready(function () {

    //funzionalità select2 su custom select
    $('.select-interesse').select2({
         placeholder: "Inizia a digitare...",
          allowClear: true
        }
      );

	  
    $('.carousel').carousel(
    {
      interval: 3500,
      pause: false
     });
    
    //swiper icone homepage
    var SwiperIcone = new Swiper('.gallery-thumbs-icone', {

      on:{
        slideChange: function(){
          this.addClass("attivazione");
        }
      },

      spaceBetween: 0,
      slidesPerView: 6,
      loop: false,
      freeMode: false,
      loopedSlides: 6, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
    });

    //initialize swiper when document ready
    var swiper = new Swiper('.gallery-home', {
      spaceBetween: 30,
      slidesPerView: 1,
      centeredSlides: true,
      loopedSlides: 6, //looped slides should be the same
      
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: SwiperIcone,
      },
    });


    //initialize swiper when document ready
    var swiper = new Swiper('.gallery-reviews', {
      slidesPerView: 1,
      centeredSlides: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });

    //aggiunta background alla navbar allo scroll  
    $(window).on("scroll", function() {
       var altezzaHeroSlogan = document.getElementById('hero_slogan').offsetHeight;
       var offsetAltezza = altezzaHeroSlogan - 120;
        if($(window).scrollTop() > offsetAltezza) {
            $(".navbar").addClass("nav_active");
            $('.navbar .navbar-brand img').attr('src', themeURL + '/src/assets/logo-agenzia-Pea-scroll.svg');
        } else {
            //remove the background property so it comes transparent again (defined in your css)
           $(".navbar").removeClass("nav_active");
           $('.navbar .navbar-brand img').attr('src', themeURL + '/src/assets/logo-agenzia-Pea-white.svg');
        }
    });

	});
		
}(jQuery));