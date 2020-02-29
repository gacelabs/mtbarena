// input dropdown for changeBikeInput
/*$(function() {
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
*/
var recentAjax = false;
$(document).ready(function() {
	$('.changeBikeInput').on('keyup', function(event) {
		var thisInput = $(this), thisInputVal = thisInput.val(), isEmpty = true;

		if ($.trim(thisInputVal).length > 1) {
			if ($(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').length) {
				return;
			} else {
				var inputDropdown = '<div class="inputDropdown">';
				var oSettings = {
					url: '/dashboard/search',
					dataType: 'json',
					data: {'keyword':event.target.value, 'id:not':thisInput.data('id')},
					beforeSend: function() {

					},
					success: function(res) {
						if (Object.keys(res).length) {
							isEmpty = false;
							for(x in res) {
								var oItem = res[x];
								inputDropdown += '<div class="media result-bike-item">';
									inputDropdown += '<div class="media-left">';
										inputDropdown += '<a href="/compare/check/?id_1='+thisInput.data('id')+'&id_2='+oItem.id+'">';
											inputDropdown += '<img src="'+oItem.feat_photo+'" class="image-cropped cover media-object" alt="'+oItem.bike_model+'">';
										inputDropdown += '</div>';
										inputDropdown += '<div class="media-body">';
											inputDropdown += '<p class="media-heading zero-gap">'+oItem.bike_model+'</p>';
											inputDropdown += '<small class="color-lightgray zero-gap">'+oItem.store_name+'</small>';
										inputDropdown += '</a>';
									inputDropdown += '</div>';
								inputDropdown += '</div>';
							}
						}
					},
					complete: function() {
						if (isEmpty == false) {
							inputDropdown += '</div>';
							$(inputDropdown).insertAfter(thisInput);
							$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());
						}
						$(window).on('resize', function() {
							$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());
						});
					}
				};
				if (recentAjax != false) recentAjax.abort();
				recentAjax = $.ajax(oSettings);
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
		$(this).parent().find('.changeBikeInput').trigger('keyup');
	});
});