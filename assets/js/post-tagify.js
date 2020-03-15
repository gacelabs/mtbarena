
var arrAllTags = [];
$(document).ready(function() {
	runTagsInput();
});

function runTagsInput(uiFieldData) {
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
					// var tagify = new Tagify(input, oTagsSettings);
					$(input).tagify(oTagsSettings);
					var tagify = $(input).data('tagify');
					arrAllTags.push(tagify);

					if ($(input).data('values')) {
						tagify.addTags($(input).data('values'));
					}
				});
			}
		};
		$.ajax(oSettings);
	});
}