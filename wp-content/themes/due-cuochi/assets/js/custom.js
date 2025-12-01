jQuery(document).ready(function() {
  var $carousel = jQuery('.cardapio-carousel');
  var initialized = false;

  function toggleCarousel() {
    if (!initialized) {
        $carousel.owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                0: {
                    items: 1
                }
            }
        });
        initialized = true;
    }
  }

  // Initial check
  toggleCarousel();
});
jQuery(document).ready(function(jQuery) {
    
    jQuery('.hamburger').click(function(){
        jQuery(this).toggleClass('open');
        jQuery('.right-header').toggleClass('active-nav');
    });  
    jQuery(window).on('resize', function() {
      if(jQuery(window).width()>767) {
        jQuery('.hamburger').removeClass('open');
        jQuery('.right-header').removeClass('active-nav');
      }
  });
  jQuery('.gallery-slider').owlCarousel({
    loop: true,
    stagePadding:0,
    margin: 5,
    dots: false,
    nav: true,
    items: 3,
  });
    jQuery('.custom-carousel').owlCarousel({
      loop: true,
      margin: 5,
      dots: false,
      nav: true,
      0:{
        items:1,
        stagePadding:50,
      },
      992: {
          stagePadding: 80,
      },
      1200: {
          stagePadding: 100,
      },
      1400: {
          stagePadding: 135,
      },
    });
  jQuery('.due-slider').owlCarousel({
    stagePadding: 30,
    loop:true,
    margin:7,
    nav:true,
    dots: false,
    responsive:{
        0:{
            items:1
        },
        992: {
            stagePadding: 50,
            items:1
        },
        1200: {
            stagePadding: 80,
            items:1
        },
        1400: {
            stagePadding: 105,
            items:1,
            margin:6,
        },
        
    }
});
  jQuery('#post-carousel').owlCarousel({
    items: 3,
    loop: true,
    dots: true,
    nav: false,
    responsive: {
      0: {
        items: 1
      },
      480: {
        items: 1
      },
      768: {
        items: 2
      },
      992: {
        items: 3
      }
    }
  }); 
  jQuery('#trattoria-bottom').owlCarousel({
    loop:true,
    margin:7,
    nav:true,
    dots: false,
    responsive:{
        0:{
            stagePadding: 30,
            items:1
        },
        600: {
          stagePadding: 0,
          items:2
      },
      768: {
        stagePadding: 0,
        items:3
    },
        992: {
            stagePadding: 0,
            items:3
        }, 
    }
});
jQuery(document).ready(function() {
  jQuery('.mobile-icon .mobile-tabbing:first').addClass('tab-active');
  jQuery('.tabs-stage .tabbing-wrap').hide();
  jQuery('.tabs-stage .tabbing-wrap:first').show();

  // Change tab class and display content
  jQuery('.mobile-icon a').on('click', function(event) {
      event.preventDefault();
      var targetTab = jQuery(this).attr('href');
      jQuery('.mobile-icon .mobile-tabbing').removeClass('tab-active');
      jQuery(this).parent().addClass('tab-active');
      jQuery('.tabs-stage .tabbing-wrap').hide();
      jQuery(targetTab).show();
  });
});

const tabs = jQuery('.our-unit-content .our-units li');
const tabContents = jQuery('.tab-content');

tabs.on('click', function() {
  // Remove active class from all tabs and hide all content
  tabs.removeClass('btn-active');
  tabContents.removeClass('btn-active');

  // Add active class to the clicked tab and show the corresponding content
  jQuery(this).addClass('btn-active');
  const tabId = jQuery(this).data('tab');
  jQuery(`.${tabId}`).addClass('btn-active');
});


// Change tab class and display content on click
jQuery('.primary-cardapio li a').on('click', function(event) {
    event.preventDefault();
    let targetTab = jQuery(this).attr('href');
    let cat_id = jQuery(this).data('cat');
    jQuery('.primary-cardapio .cardapio-tabbing').removeClass('active-tab');
    jQuery(this).parent().addClass('active-tab');
    jQuery('.ul-wrap').addClass('hide-class');
    jQuery(targetTab).removeClass('hide-class');
    jQuery('.cardapio-post-list.post-tabs').addClass('hide-cat');
    jQuery('.ul-wrap li:nth-child(1)').addClass('active-post');
    jQuery(`[data-id="${cat_id}-1"]`).removeClass('hide-cat');

});

jQuery('.ul-wrap li a').on('click', function(event) {
  event.preventDefault();
  let targetTab = jQuery(this).attr('href');
  jQuery('.ul-wrap li').removeClass('active-post');
  jQuery(this).parent().addClass('active-post');
  jQuery('.cardapio-post-list.post-tabs').addClass('hide-cat');
  jQuery(targetTab).removeClass('hide-cat');
});


jQuery('#executive-slider').owlCarousel({
  items:1,
  loop:true,
  dots:true,
  margin:10,
  nav:false,
  responsive: {
    768: {
      items: 1
    },
  }
  });
  jQuery('.custom-carousel-1').owlCarousel({
    loop: true,
    stagePadding:0,
    margin: 250,
    dots: false,
    nav: true,
    responsiveClass: true,
    responsive: {
        600: {
            items: 2,
            nav: false
        },
    }
});
jQuery('#progress-journey').owlCarousel({
  items: 4,
    loop: true,
    dots: false,
    nav: true,
    responsive: {
      768: {
        items: 2
      },
      992: {
        items: 3
      },
      1200: {
        items: 4
      }
    }
    });
    
jQuery('.loop').owlCarousel({
    items:1,
    loop:true,
    dots:false,
    margin:10,
});
Fancybox.bind('[data-fancybox="gallery"]', {
    //
  });

  function initializeMasonry() {
    var gutterSize = window.innerWidth <= 767 ? 10 : 20;

    var $grid = jQuery('.grid').masonry({
        itemSelector: '.grid-item',
        percentPosition: true,
        columnWidth: '.grid-sizer',
        gutter: gutterSize
    });

    // Ensure that Masonry layout is properly initialized
    $grid.imagesLoaded().progress(function() {
        $grid.masonry('layout');
    });
}

// Initialize Masonry after the timeout
setTimeout(initializeMasonry, 2500);

// Reinitialize Masonry on window resize to adjust gutter size dynamically
jQuery(window).resize(function() {
    // Destroy previous masonry instance before reinitializing
    jQuery('.grid').masonry('destroy');
    initializeMasonry();
});

});




