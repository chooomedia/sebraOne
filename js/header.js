jQuery(function ($) {
	$(document).on('scroll', function () {
		var $nav = $(".navbar");
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});

	function qs(key) {
		key = key.replace(/[*+?^$.\[\]{}()|\\\/]/g, "\\$&"); // escape RegEx meta chars
		var match = location.search.match(new RegExp("[?&]" + key + "=([^&]+)(&|$)"));
		var slide = match && decodeURIComponent(match[1].replace(/\+/g, " "));
		if (Math.floor(slide) == slide && $.isNumeric(slide)) {
			return parseInt(slide);
		} else {
			return 0;
		}
	}
	
	$('#main').carousel(qs('slide'));
});