
// General site functionality
function adjustHeader(){
  //tweak header
  var head = $('.header');
  if($(document).scrollTop() > 70)
  {
     if(!head.hasClass('small'))
     {
       head.addClass('small');
     }
  }
  else
  {
     if(head.hasClass('small'))
     {
       head.removeClass('small');
     }
  }

}

$(window).on('scroll', function(){
	adjustHeader();
});







