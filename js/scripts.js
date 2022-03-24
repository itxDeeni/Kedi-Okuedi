(function($) { 

  // countdown
  $(function () {
	  var austDay = new Date();
	  austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
	  $('#defaultCountdown').countdown({until: austDay});
	  $('#year').text(austDay.getFullYear());
  }); 
  
  // navigation toggle icon
  $('#toggle-icon').click(function(){
		$(this).toggleClass('open');
	});

  //media queries and changing navigation
  $(function (){
    $smallscreen();
    $(window).resize(function () {
    $smallscreen()
    });
  });
  $smallscreen = function (){
    "use strict";
      if ( $(window).width() >= 992 ) { 
        //change class for scrolling changing navigation
          var menu1 = $('.top1');
          $(window).scroll(function() {
          var y = $(this).scrollTop();
          var z = $('.menuswitch').offset().top;
          if (y >= z) {
            menu1.addClass('top-disappear');
          } else  {
            menu1.removeClass('top-disappear');
          }
        });
      } 		
      else {
        
    }
  }
  
  
  //counter
  $('.timerwrapper').waypoint(function(){
    $('.timer').countTo();     
  },{offset: 420, triggerOnce: true});
  

  //colorbox lightbox
  $('.imagepopup').colorbox({maxWidth:'70%', maxHeight:'70%', rel:'gal'});
  

  //top slider 
  $('.flexslider').flexslider({
    animation: "fade",
	  controlNav: true, 
    directionNav: true,
	  slideshowSpeed: 6000000,             
	  animationSpeed: 600,  
  });

})(jQuery);


$(window).load(function() {

  
  // isotope
  "use strict";  
   var $container = $('#portfoliocontainer');
    $container.isotope({
        itemSelector: '.element'
    });

    var $optionSets = $('#options .option-set'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.click(function() {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('selected')) {
            return false;
        }
        var $optionSet = $this.parents('.option-set');
        $optionSet.find('.selected').removeClass('selected');
        $this.addClass('selected');
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');
        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            // changes in layout modes need extra logic
            changeLayoutMode($this, options)
        } else {
            // otherwise, apply new options
            $container.isotope(options);
        }
        return false;
    });
  });

  //scroll to top function
  function scrollToTop($) {
  jQuery('html, body').animate({
      scrollTop: 0
  }, 'slow');
}