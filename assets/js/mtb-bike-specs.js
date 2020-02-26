$(window).on('load resize change', function() {

	// shrinks model image on scroll
	$(function() {
		var	scrollPosition = 100;

		window.onscroll = function() {
			if (window.pageYOffset > scrollPosition) {
				$('.mtb-item-image').addClass('mtbImageShrinker');
			} else if (window.pageYOffset == 0) {
				$('.mtb-item-image').removeClass('mtbImageShrinker');
			}
		};
	});

});