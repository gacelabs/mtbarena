
var arrAllTags = [];
$(document).ready(function() {
	/*var clickOnce = false;
	if ($('#edit-json-data').length) {
		var oJson = $('#edit-json-data').data('json');
		if (Object.keys(oJson[0]).length) {
			// console.log(oJson);
			if (clickOnce == false) {
				$('.panel-heading[data-toggle]:not(:first):not(.collapsed)').click();
				clickOnce = true;
			}
			for(var field in oJson[0]) {
				var sVal = oJson[0][field];
				if ($('#postBikeForm [name='+field+']:not(:file)').attr('type') == 'radio') {
					$('#postBikeForm [name='+field+'][value='+sVal+']').prop('checked', true).attr('data-values', sVal);
				} else {
					$('#postBikeForm [name='+field+']:not(:file)').attr('data-values', sVal);
				}
			}
		}
	} else {
	}*/
		runTagsInput();
});
var bFirstLoad = true;
function runTagsInput(uiFieldData) {
	bFirstLoad = false;
	if (uiFieldData == undefined) uiFieldData = $('.field-data');
	uiFieldData.each(function(i, elem){
		var sSelector = $(elem).data('selector'), uiInput = $(elem).find(sSelector);
		var oSettings = {
			url: $(elem).data('url'),
			success: function(data) {
				// console.log(data, uiInput);
				uiInput.each(function(x, input) {
					var oTagsSettings = {
						whitelist : data[input.name].whitelist,
						dropdown: {
							maxItems: Infinity,
							enabled: 0,
							classname: "suggestion-list"
						},
						enforceWhitelist: true,
						editTags: false,
						maxTags: 1
					};

					// console.log(data[input.name]);
					if (data[input.name].max == 1) {
						oTagsSettings.maxTags = Infinity;
					}

					var tagify = new Tagify(input, oTagsSettings);
					/*tagify
						.on("focus", function (e){
							// console.log(e.type, e.detail);
							$(tagify.DOM.dropdown).show();
						})
						.on("dropdown:show", function (e){
							// console.log(e.type, e.detail);
						})
						.on("dropdown:hide", function (e){
							console.log(e.type, e.detail);
						})
						.on('dropdown:scroll', function (e){
							// console.log(e.type, e.detail);
						})
						.on('keydown', function(e) {
							console.log(e.type, e.detail, e.detail.originalEvent);
							if (e.detail.originalEvent.code == 'Backspace') {
								tagify.removeTag();
							}
							if (e.detail.originalEvent.code == 'Escape') {
								tagify.trigger('blur');
							}
						})
						.on('dropdown:select', function (e){
							// console.log(e.type, e.detail);
						})
						.on('add', function (e){
							// console.log(e.type, e.detail);
						})
						.on('remove', function (e){
							// console.log(e.type, e.detail);
						})
						.on('blur', function(e) {
							// console.log(e.type, e.detail);
							$(tagify.DOM.dropdown).hide();
						});

					tagify.dropdown.show.call(tagify);
					tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown);
					// tagify.dropdown.hide.call(tagify);
					$(tagify.DOM.dropdown).hide();*/

					arrAllTags.push(tagify);
					// tagify.addTags('Trinx,Cannondale,Giant,Foxter,Pinewood')
				});
			}
		};
		$.ajax(oSettings);
	});
}