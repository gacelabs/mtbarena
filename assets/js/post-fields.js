$(document).ready(function() {
	addFields();
	$('.add_mainset').on('click', function() {
		var uiTemplate = $('#main_template').clone(),
		iKey = $('.mainset').length;
		uiTemplate.removeClass('hide').removeAttr('id');
		var newUI = uiTemplate.html().replace(new RegExp('MAINCHANGEKEY', 'g'), (iKey-1));
		newUI = newUI.replace(new RegExp('CHANGEKEY', 'g'), (iKey-1));
		newUI = newUI.replace(new RegExp('id="field_template"', 'g'), '');
		newUI = newUI.replace(new RegExp('CHANGECOL', 'g'), 0);
		$(this).attr('data-key', (iKey-1));
		$(newUI).insertBefore($(this));
		addFields();
	});
});

function addFields() {
	$('.add_fieldset').on('click', function() {
		var uiTemplate = $('#field_template').clone();
		uiTemplate.removeClass('hide').removeAttr('id');
		var newUI = uiTemplate.get(0).outerHTML.replace(new RegExp('CHANGEKEY', 'g'), $(this).data('key'));
		// console.log($(this).parents('.mainset').find('.fieldset').length)
		var iCol = $(this).parents('.mainset').find('.fieldset').length;
		newUI = newUI.replace(new RegExp('CHANGECOL', 'g'), iCol);
		$(newUI).insertBefore($(this));
	});
}