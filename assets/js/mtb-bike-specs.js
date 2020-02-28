$(window).on('load resize change', function() {

	// shrinks model image on scroll
	$(function() {
		var	scrollPosition = 100;

		window.onscroll = function() {

			if (window.pageYOffset > scrollPosition) {
				$('.mtb-item-image').addClass('mtbImageShrinker');
				$('.bikeStickyName').css('box-shadow', '0px 2px 4px 0px rgba(0,0,0,0.1)');
				$('.changeBikeInput').val('').blur();
				$('.inputDropdown').remove();
			} else if (window.pageYOffset < 30) {
				$('.changeBikeInput').val('').blur();
				$('.inputDropdown').remove();
				$('.bikeStickyName').css('box-shadow', '');
			}


			if (window.pageYOffset == 0) {
				$(document).click($('.mtbImageShrinker'), function() {
					$('.mtb-item-image').removeClass('mtbImageShrinker');
				});
			}
		};
	});

});

// input dropdown for changeBikeInput
$(function() {
	$('.changeBikeInput').on('keyup', function() {
		var thisInput = $(this),
			thisInputVal = thisInput.val();
			inputDropdown = '<div class="inputDropdown">';
				inputDropdown += '<div class="media result-bike-item">';
					inputDropdown += '<div class="media-left">';
						inputDropdown += '<img src="http://localhost/mtbarena/assets/images/mtb/trinx_x1_elite.png" class="image-cropped cover media-object">';
					inputDropdown += '</div>';
					inputDropdown += '<div class="media-body">';
						inputDropdown += '<p class="media-heading zero-gap">Bike model name here</p>';
						inputDropdown += '<small class="color-lightgray zero-gap">Bike Shop Dealer Name</small>';
					inputDropdown += '</div>';
				inputDropdown += '</div>';
			inputDropdown += '</div>';

		if ($.trim(thisInputVal).length > 1) {
			if ($(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').length) {
				return;
			} else {
				$(inputDropdown).insertAfter(thisInput);
				$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());

				$(window).on('resize', function() {
					$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());
				});
			}
		} else {
			$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').remove();
		}
	});

	$(document).click( function(event) {
		if ($('.inputDropdown').length) {
			if($(event.target).closest('.inputDropdown').length == 0 && $(event.target).closest('.changeBikeInput').length == 0) {
				$('.changeBikeInput').val('').blur();
				$('.inputDropdown').remove();
			}
		}
	});

	$('.compare-search-icon').click(function() {
		$(this).parent().find('.changeBikeInput').select();
	});
});