jQuery(document).ready(function($){
  // Adds taget element to blank pages for Testimonials links
  $('.testimonials .url a').attr('target','_blank');

  $("select#cat").after("<span class='downarrow'></span>");

  $("#podcast-cta, .smooth-scroll").on('click', function(event) {
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
  var popUpOnExit = false

  // Only trigger the on exit on the below pages
  var pagesToDisplayOnExit = [
    'page-id-8',      // Life Coaching
    'page-id-4830',   // Intuitive Readings
    'page-id-4355',   // Mentor Coaching
    // 'page-template-template-podcast-main',     // main podcast page
    'page-id-4237',                          // main podcast page
    // 'page-template-template-homepage',    // home page
];

  // Check if the visitor is on the page to trigger the onExit event
  pagesToDisplayOnExit.map(function(page) {
    if ($('body').hasClass(page) && !cookieIsPresent('show-podcast-popup')) popUpOnExit = true;
  });

  // console.log('should onexit be active? ', popUpOnExit);

  // Adding the event if onExit is true
  if (popUpOnExit) addEvent(document, "mouseout", function(e) {
    // console.log('added');
    e = e ? e : window.event;
    var from = e.relatedTarget || e.toElement;
    if ((!from || from.nodeName == "HTML") && e.pageY < jQuery(window).scrollTop()) {
        if (popUpOnExit) {
          // console.log('triggered');
          createCookie('show-podcast-popup', 30);
          $('#subscribe-to-podcast').once();
        }
    }
  });
});

function cookieIsPresent(name) {
  return document.cookie
      .split(';')
      .filter(function(item) {
        // return item.indexOf('show-podcast-popup=false') >= 0 })
        return item.indexOf(name + '=false') >= 0 })
      .length === 1;
}

function createCookie(name, days) {
  var expire = new Date(
    dateAdd(new Date(), 'day', days)
  );
  // document.cookie = 'show-podcast-popup=false; expires=' + expire.toGMTString() + ';path=/';
  document.cookie = name + '=false; expires=' + expire.toGMTString() + ';path=/';
}


// helper function for setting the cookie date
function dateAdd(date, interval, units) {
  var ret = new Date(date); //don't change original date
  var checkRollover = function() { if(ret.getDate() != date.getDate()) ret.setDate(0);};
  switch(interval.toLowerCase()) {
    case 'year'   :  ret.setFullYear(ret.getFullYear() + units); checkRollover();  break;
    case 'quarter':  ret.setMonth(ret.getMonth() + 3*units); checkRollover();  break;
    case 'month'  :  ret.setMonth(ret.getMonth() + units); checkRollover();  break;
    case 'week'   :  ret.setDate(ret.getDate() + 7*units);  break;
    case 'day'    :  ret.setDate(ret.getDate() + units);  break;
    case 'hour'   :  ret.setTime(ret.getTime() + units*3600000);  break;
    case 'minute' :  ret.setTime(ret.getTime() + units*60000);  break;
    case 'second' :  ret.setTime(ret.getTime() + units*1000);  break;
    default       :  ret = undefined;  break;
  }
  return ret;
}
