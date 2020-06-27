  $(document).ready(function() {
    $('#brand').owlCarousel({
      loop:true,
      margin:20,
      responsiveClass:true,
      pagination:false,
      responsive:{
        0:{
          items:1,
          nav:true
        },
        600:{
          items:3,
          nav:false
        },
        1000:{
          items:5,
          nav:true,
          loop:false
        }
      }
    });




 


    $("#scroller").simplyScroll({ orientation: 'vertical', customClass: 'vert', autoMode: 'loop' });





 







  });