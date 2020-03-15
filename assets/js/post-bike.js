$(document).ready(function() {

	$('.capsule-checkbox [type="checkbox"]').on('change', function() {

		if ($(this).hasClass('check-one')) {
			$('.capsule-checkbox [type="checkbox"].check-one').not(this).prop('checked', false);
			
			$(this).parent().parent().find('.capsule-checkbox').removeClass('checked');
			if ($(this).prop('checked') == true) {
				$(this).parent('.capsule-checkbox').addClass('checked');
			}
		} else {
			$(this).parent('.capsule-checkbox').toggleClass('checked');
		}

	});

	$('.selectpicker').selectpicker();

	var recentAjax = false;
	$('.selectpicker').on('loaded.bs.select', function(e) {
		$(e.target).parent('.dropdown').find('.bs-searchbox input').bind('keyup', function(event) {
			const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			var oSettings = {
				url: 'dashboard/search',
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
							$(e.target).append("<option data-tokens='"+oItem.bike_model.toLowerCase()+"' data-subtext='"+oItem.store_name+" (Updated: "+monthYear+")' data-id='' data-selector='input.typeAheadInput' data-json='"+jsonString+"'>"+oItem.bike_model+"</option>");
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
		// console.log(data);
		if (Object.keys(data.json).length) {
			if (clickOnce == false) {
				$('.panel-heading[data-toggle]:not(:first):not(.collapsed)').click();
				clickOnce = true;
			}
			$('#postBikeForm '+data.selector).each(function(i, elem) {
				$(elem).data('tagify').removeAllTags();
			});
			for(var field in data.json) {
				var skip = false;
				if ($('body').hasClass('edit-bike') && field == 'bike_model') {
					skip = true;
				}
				if (skip == false) {
					var oVal = data.json[field];
					if ($('#postBikeForm [name='+field+']:not(:file)').attr('type') == 'radio') {
						$('#postBikeForm [name='+field+'][value='+oVal+']').prop('checked', true);
					} else {
						$('#postBikeForm [name='+field+']:not(:file)').val(oVal);
					}
				}
			}
			if (data.json.fields_data != undefined) {
				var oItems = data.json.fields_data;
				if (typeof oItems == 'string') {
					oItems = $.parseJSON(oItems);
				}
				for (var name in oItems) {
					var oTags = oItems[name];
					if (typeof oTags == 'string') {
						oTags = $.parseJSON(oTags);
					}
					var arr = [];
					$.each(oTags, function(i, obj){
						arr.push(obj.value);
					});
					// console.log(name, arr.toString());
					$('#postBikeForm [name='+name+']:not(:file)').data('tagify').addTags(arr.toString());
				}
			}
		}
	});

	if ($('#edit-json-data').length) {
		var oJson = $('#edit-json-data').data('json');
		if (Object.keys(oJson).length) {
			// console.log(oJson);
			if (clickOnce == false) {
				$('.panel-heading[data-toggle]:not(:first):not(.collapsed)').click();
				clickOnce = true;
			}
			for(var field in oJson) {
				var sVal = oJson[field];
				if ($('#postBikeForm [name='+field+']:not(:file)').attr('type') == 'radio') {
					$('#postBikeForm [name='+field+'][value='+sVal+']').prop('checked', true);
				} else {
					$('#postBikeForm [name='+field+']:not(:file)').val(sVal);
				}
			}
		}
	}
});
