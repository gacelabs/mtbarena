
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
					var inputData = $(input).data();
					var oTagsSettings = {
						whitelist : data[inputData.name].whitelist,
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
					if (data[inputData.name].max == 1) {
						oTagsSettings.maxTags = Infinity;
					}
					// var tagify = new Tagify(input, oTagsSettings);
					$(input).tagify(oTagsSettings);
					var tagify = inputData.tagify;
					arrAllTags.push(tagify);

					if (inputData.values) {
						tagify.addTags(inputData.values);
					}
				});
			}
		};
		$.ajax(oSettings);
	});
}