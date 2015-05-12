jQuery(document).ready(function($) {					
	function onAfter(curr, next, opts, fwd) {
		 var $ht = $(this).height();

		  //set the container's height to that of the current slide
		 $(this).parent().animate({height: $ht});
	}
	
//это заставит ссылки вести себя как теги в портфолио


var data_filter_fix = {
	".blago" : 24,
	".blago-dwor" : 26,
	".blago-zagorodom" : 28,
	".child" : 18,
	".sport-inv" : 10,
	".work-out" : 12,
	".sport" : 16,
	".trenaj" : 14
}
var data_filter_fix_opt;

for (data_filter_fix_opt in data_filter_fix){

	$('a[href$='+data_filter_fix[data_filter_fix_opt]+']').attr('data-filter', data_filter_fix_opt);
}



$('.dcjq-accordion a.dcjq-parent').click(function(e){
	e.preventDefault();

	var selector = $(this).attr('data-filter');
	$('#portfolio-wrapper').isotope({ filter: selector });

});




////////////////////////////////////////////////////////////////////////////end
    $(".imgLiquidFill").imgLiquid();

	// Mobile Nav
	$('#menu-main-navigation').tinyNav({
  		active: 'selected', // String: Set the "active" class
  		header: 'Navigation', // String: Specify text for "header" and show header instead of the active item
  		label: '' // String: Sets the <label> text for the <select> (if not set, no label will be added)
	});
	
	// Portfolio
	$('.portfolio-tabs a').click(function(e){
		e.preventDefault();

		var selector = $(this).attr('data-filter');
		$('#portfolio-wrapper').isotope({ filter: selector });

		$(this).parents('ul').find('li').removeClass('active');
		$(this).parent().addClass('active');
	});

	
	// Tabs
	$('.tabs-wrapper').each(function() {
		$(this).find(".tab_content").hide(); //Hide all content
		$(this).find("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(this).find(".tab_content:first").show(); //Show first tab content
	});
	
	$("ul.tabs li").click(function(e) {
		$(this).parents('.tabs-wrapper').find("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(this).parents('.tabs-wrapper').find(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(this).parents('.tabs-wrapper').find(activeTab).show(); //Fade in the active ID content
		
		e.preventDefault();
	});

	 
	$("ul.tabs li a").click(function(event) {
		event.preventDefault();
	});
	
	$('.tabset').each(function() {
		var menuWidth = $(this).width();
	    var menuItems = $(this).find('li').size();
	    var itemWidth = (menuWidth/menuItems);

	$(this).css({'width': menuWidth +'px'});
	$(this).find('li').css({'width': itemWidth +'px'});
	});
	
	$('.toggle-content').each(function() {
		if(!$(this).hasClass('default-open')){
			$(this).hide();
		}
	});

	// Accordian
	$("h5.toggle").click(function(){
		if($(this).parents('.accordian').length >=1){
			var accordian = $(this).parents('.accordian');

			if($(this).hasClass('active')){
				$(accordian).find('h5.toggle').removeClass('active');
				$(accordian).find(".toggle-content").slideUp();
			} else {
				$(accordian).find('h5.toggle').removeClass('active');
				$(accordian).find(".toggle-content").slideUp();

				$(this).addClass('active');
				$(this).next(".toggle-content").slideToggle();
			}
		} else {
			if($(this).hasClass('active')){
				$(this).removeClass("active");
			}else{
				$(this).addClass("active");
			}
		}

		return false;
	});

	$("h5.toggle").click(function(){
		if(!$(this).parents('.accordian').length >=1){
			$(this).next(".toggle-content").slideToggle();
		}
	});
	
	$('.reviews').cycle({
		fx: 'fade',
		after: onAfter,
		timeout: 15000
	});

});

jQuery(window).load(function() {
	jQuery('#portfolio-wrapper').isotope({
		// options
		itemSelector: '.portfolio-item',
		layoutMode: 'fitRows'
	});

});

var sf=jQuery.noConflict();
	sf(window).load(function(){
    // superFish
    sf('ul.sf-menu').supersubs({
	minWidth:    16, // minimum width of sub-menus in em units
    maxWidth:    40, // maximum width of sub-menus in em units
    extraWidth:  1 // extra width can ensure lines don't sometimes turn over
    })
	.superfish(); // call supersubs first, then superfish
});

//скрипт ПЛЮСО 

(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();
