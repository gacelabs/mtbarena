$(function() {
	tinymce.init({
		selector: '#textEditor',
		branding: false,
		height: 300,
		menubar: false ,
		plugins: "image code link wordcount",
		toolbar: 'h1 h2 h3 italic bold alignleft aligncenter alignright blockquote link image',
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#imagePreview').attr('src', e.target.result);
				$('#blog_feat_photo').val(e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imageInput").change(function() {
		readURL(this);
	});

	$("#blog_title").keyup(function() {
		var sTitle = $(this).val();
		sTitle = cleanTitle(sTitle);
		$('#basic-url').val(sTitle);
	}).blur(function() {
		var sTitle = $(this).val();
		$(this).val($.trim(sTitle)).trigger('keyup');
	});

	var baseUrl = $('base').attr('href');

	if ($('#edit-json-data').length) {
		var oJson = $('#edit-json-data').data('json');
		if (Object.keys(oJson[0]).length) {
			// console.log(oJson);
			const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
			for(var field in oJson[0]) {
				var sVal = oJson[0][field];
				if ($('#post-blog-form [name='+field+']:not(:file)').attr('type') == 'radio') {
					$('#post-blog-form [name='+field+'][value='+sVal+']').prop('checked', true);
				} else {
					$('#post-blog-form [name='+field+']:not(:file)').val(sVal);
				}
				if (field == 'blog_feat_photo') {
					$('#imagePreview').attr('src', sVal);
					$('#blog_feat_photo').val('');
				}
				if ($.inArray(field, ['added', 'updated']) >= 0) {
					$('#blog-'+field).text(formatDatetime(sVal));
				}
				if (field == 'blog_url') {
					$('#blog_url-link').text(baseUrl+sVal);
					$('#blog_url-href').attr('href', baseUrl+sVal);
				}
			}
		}
	}
});

function cleanTitle(string) {
	string = string.replace(new RegExp(/\s/, 'g'), '-');
	string = string.replace(new RegExp(/[^a-z0-9\._-]/, 'g'), '');
	string = string.replace(new RegExp(/[()]/, 'g'), '');
	string = string.replace(new RegExp(/[+]/, 'g'), '');
	return string.toLowerCase();
}

function formatDatetime(sDate) {
	var options = {month: 'short', day: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'};
	var date  = new Date(sDate);
	return date.toLocaleDateString("en-US", options);
}