jQuery(document).ready(function($){
  // Adds taget element to blank pages for Testimonials links
  $('.testimonials .url a').attr('target','_blank');

  $("select#cat").after("<span class='downarrow'></span>");
});
