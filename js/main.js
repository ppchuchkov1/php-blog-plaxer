//comp img function execution 
initComparisons();
//navbar-bg
$(window).scroll(function(){
	$('nav').toggleClass('scrolled', $(this).scrollTop() > 50);
});