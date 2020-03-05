
var recentAjax = false;
$(document).ready(function() {
	$('.changeBikeInput').on('keyup', function(event) {
		var thisInput = $(this), thisInputVal = thisInput.val(), isEmpty = true;

		if ($.trim(thisInputVal).length > 1) {
			var inputDropdown = '<div class="inputDropdown">';
			var excludedIds = thisInput.data('ids'), currentID = thisInput.data('id');
			var isRightSide = excludedIds.indexOf(currentID.toString());
			var oSettings = {
				url: 'dashboard/search',
				dataType: 'json',
				data: {'keyword':event.target.value, 'id:notin':excludedIds},
				beforeSend: function() {
					$('.inputDropdown').remove();
					var spinner = '<i class="fa fa-spinner fa-pulse fa-fw"></i>';
					if ($(thisInput).parent('.modelItemLabelBox').find('.fa-spinner').length != 1) {
						$(spinner).insertAfter(thisInput);
					}
				},
				success: function(res) {
					if (Object.keys(res).length) {
						isEmpty = false;
						$.each(res, function(x, oItem) {
							if (excludedIds.length == 2) { /*is in compare page*/
								if (isRightSide) {
									var stayID = excludedIds[0];
									inputDropdown += '<a href="compare/check/?id_1='+stayID+'&id_2='+oItem.id+'">';
								} else {
									var stayID = excludedIds[1];
									inputDropdown += '<a href="compare/check/?id_1='+oItem.id+'&id_2='+stayID+'">';
								}
							} else { /*in single bike page*/
								inputDropdown += '<a href="compare/check/?id_1='+currentID+'&id_2='+oItem.id+'">';
							}
								inputDropdown += '<div class="media result-bike-item">';
									inputDropdown += '<div class="media-left">';
										inputDropdown += '<img src="'+oItem.feat_photo+'" class="image-cropped cover media-object" alt="'+oItem.bike_model+'">';
										inputDropdown += '</div>';
										inputDropdown += '<div class="media-body">';
										inputDropdown += '<p class="media-heading zero-gap">'+oItem.bike_model+'</p>';
										inputDropdown += '<small class="color-lightgray zero-gap">'+oItem.store_name+'</small>';
									inputDropdown += '</div>';
								inputDropdown += '</div>';
							inputDropdown += '</a>';
						});
					}
				},
				complete: function() {
					if (isEmpty == false) {
						inputDropdown += '</div>';
						$(inputDropdown).insertAfter(thisInput);
						$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());
					}
					$(window).bind('resize', function() {
						$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').css('width', $(thisInput).parent('.modelItemLabelBox').width());
					});
					$(thisInput).parent('.modelItemLabelBox').find('.fa-spinner').remove();
				}
			};
			if (recentAjax != false) recentAjax.abort();
			recentAjax = $.ajax(oSettings);
		} else {
			$(thisInput).parent('.modelItemLabelBox').find('.inputDropdown').remove();
			$(thisInput).parent('.modelItemLabelBox').find('.fa-spinner').remove();
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

function RemoveVal(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
        what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
}