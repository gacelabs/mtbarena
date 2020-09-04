
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
					var inputData = $(input).data(),
					oData = data[inputData.name];
					// console.log(oData);
					if (oData.whitelist != undefined) {
						var oTagsSettings = {
							whitelist : oData.whitelist,
							dropdown: {
								maxItems: Infinity,
								enabled: 0,
								classname: "suggestion-list"
							},
							enforceWhitelist: false,
							editTags: true,
							maxTags: 1
						};

						if (oData.max == 1) {
							oTagsSettings.maxTags = Infinity;
						}
						if (!user.is_admin) { /*if not admin*/
							oTagsSettings.enforceWhitelist = true;
							oTagsSettings.editTags = false;
						}

						// var tagify = new Tagify(input, oTagsSettings);
						$(input).tagify(oTagsSettings);

						var tagify = inputData.tagify;
						arrAllTags.push(tagify);

						if (inputData.values) {
							tagify.addTags(inputData.values);
						}
					}
					$(input).bind('paste', function(e) {
						$(e.target).trigger('keypress');
					});
				});
			}
		};
		$.ajax(oSettings);
	});
}