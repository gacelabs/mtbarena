$(document).ready(function() {
	
	$('.selectpicker').selectpicker();

	var recentAjax = false;
	$('.selectpicker').on('loaded.bs.select', function(e) {
		$(e.target).parent('.dropdown').find('.bs-searchbox input').bind('keyup', function(event) {
			const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			var oSettings = {
				url: '/dashboard/search',
				dataType: 'json',
				data: {'keyword':event.target.value},
				beforeSend: function() {
					$(e.target).html('');
				},
				success: function(res) {
					if (Object.keys(res).length) {
						for(x in res) {
							var oItem = res[x];
							var d = new Date(oItem.updated), monthYear = monthNames[d.getMonth()]+' '+d.getFullYear();
							var jsonString = JSON.stringify(oItem).replace(/[']/g, "");
							$(e.target).append("<option data-tokens='"+oItem.bike_model.toLowerCase()+"' data-subtext='"+oItem.store_name+" (Updated: "+monthYear+")' data-id='' data-json='"+jsonString+"'>"+oItem.bike_model+"</option>");
							$(e.target).selectpicker('refresh');
						}
					}
				}
			};
			if (recentAjax != false) recentAjax.abort();
			recentAjax = $.ajax(oSettings);
		});
	});

	var clickOnce = false;
	$('.selectpicker').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
		var data = $(e.target).find('option:eq('+clickedIndex+')').data();
		// console.log(data.json);
		if (Object.keys(data.json).length) {
			if (clickOnce == false) {
				$('.panel-heading[data-toggle]:not(:first):not(.collapsed)').click();
				clickOnce = true;
			}
			for(var field in data.json) {
				var sVal = data.json[field];
				if ($('#postBikeForm [name='+field+']:not(:file)').attr('type') == 'radio') {
					$('#postBikeForm [name='+field+'][value='+sVal+']').prop('checked', true);
				} else {
					$('#postBikeForm [name='+field+']:not(:file)').val(sVal);
				}
			}
		}
	});

});