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

  function addEvent(obj, evt, fn) {
      if (obj.addEventListener) {
          obj.addEventListener(evt, fn, false);
      }
      else if (obj.attachEvent) {
          obj.attachEvent("on" + evt, fn);
      }
  }

  // var to only show the onExitPopup once - this needs improvement for sessions (30 days etc and use cookies)
  var popUpOnExit = false;

  // Only trigger the on exit on the below pages
  var pagesToDisplayOnExit = [
    'page-id-8',      // Life Coaching
    'page-id-4830',   // Intuitive Readings
    'page-id-4355',   // Mentor Coaching
];

  // Check if the visitor is on the page to trigger the onExit event
  pagesToDisplayOnExit.map(function(page) {
    if ($('body').hasClass(page)) popUpOnExit = true;
  });

  // console.log('should onexit be active? ', popUpOnExit);

  // Adding the event if onExit is true
  if (popUpOnExit) addEvent(document, "mouseout", function(e) {
    // console.log('added');
    e = e ? e : window.event;
    var from = e.relatedTarget || e.toElement;
    if ((!from || from.nodeName == "HTML") && e.pageY < jQuery(window).scrollTop()) {
        if (popUpOnExit) {
          popUpOnExit = false;
          $('#subscribe-to-podcast').click();
          // add id's here for the pages we want to trigger an on exit event for.

        }
    }
  });

});
