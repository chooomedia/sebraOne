jQuery(function ($) {
	$(document).on('scroll', function () {
		var $nav = $(".navbar");
		$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});
});
