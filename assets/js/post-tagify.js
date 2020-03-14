var arrALlTags = []
$('input.typeAheadInput').each(function(i, elem){
	var oSettings = {
		url: $(elem).data('url'),
		success: function(data) {
			// console.log(data)
			var input = elem,
			tagify = new Tagify(input, {
				whitelist : data.whitelist,
				dropdown: {
					position: "manual",
					maxItems: 3,
					enabled: 0,
					classname: "customSuggestionsList",
				},
				editTags: false,
				maxTags: data.max,
			});

			arrALlTags.push(tagify);

			tagify
				.on("dropdown:show", function (e){
					console.log("dropdown:show", e.detail);
				})
				.on("dropdown:hide", function (e){
					console.log("dropdown:hide", e.detail);
				})
				.on('dropdown:scroll', function (e){
					console.log('dropdown:scroll', e.detail);
				})
				.on('keydown', function(e) {
					console.log('keydown', e.detail);
					if (e.detail.originalEvent.code == 'Backspace') {
						tagify.removeTag();
					}
				})
				.on('add', function (e){
					console.log('add', e.detail);
				})
				.on('blur', function(e) {
					console.log('blur', e.detail);
					$(e.detail.tagify.DOM.dropdown).hide()
				})

			tagify.dropdown.show.call(tagify);
			tagify.DOM.scope.parentNode.appendChild(tagify.DOM.dropdown);

			$(elem).parents('.form-step-body').find('.form-step-block-values').click(function(e) {
				if ($(tagify.DOM.dropdown).is(':visible')) {
					$(tagify.DOM.dropdown).hide();
					$(this).find('i').removeClass('fa fa-angle-up').addClass('fa fa-angle-down');
				} else {
					tagify.dropdown.show.call(tagify);
					$(this).find('i').removeClass('fa fa-angle-down').addClass('fa fa-angle-up');
				}
			});
			/*now hide the tag list*/
			$(tagify.DOM.dropdown).hide();
		}
	};
	$.ajax(oSettings);
});