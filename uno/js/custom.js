jQuery(document).ready(function($){
  // Adds taget element to blank pages for Testimonials links
  $('.testimonials .url a').attr('target','_blank');

  $("select#cat").after("<span class='downarrow'></span>");

  $("#podcast-cta, .smooth-scroll, #join-chat").on('click', function(event) {
    event.preventDefault();   // Prevent default anchor click behavior
    var hash = this.hash;     // Store hash
    console.log('in click');

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 1500, function(){
      // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });
  });
});
