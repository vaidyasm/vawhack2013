$(document).ready(function(){
	if (!!$('.sticky').offset()) { // make sure ".sticky" element exists

		    var stickyTop = $('.sticky').offset().top; // returns number 

		    $(window).scroll(function(){ // scroll event

		      var windowTop = $(window).scrollTop(); // returns number 

		      if (stickyTop < windowTop){
		        $('.sticky').css({ position: 'fixed', top: 0 });
		      }
		      else {
		        $('.sticky').css('position','static');
		      }

		    });

		  }

	// dropkick
	$('.default').dropkick();

	// lightbox
	  $("a[rel*=leanModal]").leanModal({closeButton: ".modal_close"});
	  $('header').css('min-height', $(window).height()+'px');

});