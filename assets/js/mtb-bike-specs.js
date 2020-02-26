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

			$('#inputDropdown').remove();
		};
	});


});

// input dropdown for changeBikeInput
$(function() {
	$('.changeBikeInput').on('click', function() {
		var thisInput = $(this);
		thisInput.select();
	});

	$('.changeBikeInput').on('keyup', function() {
		var thisInput = $(this),
			thisInputVal = thisInput.val();
			inputDropdown = '<div id="inputDropdown">';
				inputDropdown += '<ul class="inline-list result-bike-item text-ellipsis">';
					inputDropdown += '<li style="margin-right:8px;">';
						inputDropdown += '<img src="http://localhost/mtbarena/assets/images/mtb/trinx_x1_elite.png" class="image-cropped cover small">';
					inputDropdown += '</li>';
					inputDropdown += '<li>';
						inputDropdown += '<p class="zero-gap">Bike model name here</p>';
					inputDropdown += '</li>';
				inputDropdown += '</ul>';
			inputDropdown += '</div>';

		if ($.trim(thisInputVal).length > 1) {
			if ($(thisInput).parent('.modelItemLabelBox').find('#inputDropdown').length) {
				return;
			} else {
				$(inputDropdown).insertAfter(thisInput);
				$(thisInput).parent('.modelItemLabelBox').find('#inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());

				$(window).on('load resize', function() {
					$(thisInput).parent('.modelItemLabelBox').find('#inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());
				});
			}
		} else {
			$(thisInput).parent('.modelItemLabelBox').find('#inputDropdown').remove();
		}
	});
});