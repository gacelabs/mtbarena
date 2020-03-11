$(function() {
	tinymce.init({
		selector: '#textEditor',
		branding: false,
		height: 300,
		menubar: false ,
		plugins: "image link wordcount",
		toolbar: 'undo redo | h1 h2 h3 h4 h5 | italic bold alignleft aligncenter alignright blockquote link image',
		// without images_upload_url set, Upload tab won't show up
		images_upload_url: 'ajax/upload_image',
		// override default upload handler to simulate successful upload
		images_upload_handler: function (blobInfo, success, failure) {
			// console.log(blobInfo.blob())
			// success("data:image/png;base64," + blobInfo.base64());
			var xhr, formData;
			xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			xhr.open('POST', 'ajax/upload_image');
			xhr.onload = function() {
				var json;
				if (xhr.status != 200) {
					failure('HTTP Error: ' + xhr.status);
					return;
				}
				// console.log(xhr.responseText)
				json = $.parseJSON(xhr.responseText);
				if (!json || typeof json.location != 'string') {
					failure('Invalid JSON: ' + xhr.responseText);
					return;
				}
				success(json.location);
			};
			formData = new FormData();
			formData.append('file', blobInfo.blob(), blobInfo.filename());
			xhr.send(formData);
		},
		image_advtab: true/*,
		file_picker_types: 'file image media',
		file_picker_callback: function(callback, value, meta) {
			// Provide file and text for the link dialog
			if (meta.filetype == 'file') {
				callback('mypage.html', {text: 'My text'});
			}

			// Provide image and alt text for the image dialog
			if (meta.filetype == 'image') {
				callback('myimage.jpg', {alt: 'My alt text'});
			}

			// Provide alternative source and posted for the media dialog
			if (meta.filetype == 'media') {
				callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
			}
		}*/
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
		sTitle = cleanString(sTitle);
		$('#basic-url').val(sTitle);
	}).blur(function() {
		var sTitle = $(this).val();
		sTitle = sTitle.replace(new RegExp(/  +/, 'g'), ' ');
		sTitle = sTitle.replace(new RegExp(/__+/, 'g'), '_');
		$(this).val($.trim(sTitle)).trigger('keyup');
	});

	if ($('#edit-json-data').length) {
		var oJson = $('#edit-json-data').data('json');
		populateData(oJson[0]);
	}

	$('#reset-blogpost').click(function() {
		if (confirm('Sure want to reset all changes?')) {
			if ($('#edit-json-data').length) {
				var oJson = $('#edit-json-data').data('json');
				populateData(oJson[0], true);
			}
		}
	});
});

var baseUrl = $('base').attr('href');

function populateData(oJson, isUpdate) {
	if (isUpdate == undefined) isUpdate = false;
	if (Object.keys(oJson).length) {
		// console.log(oJson);
		for(var field in oJson) {
			var sVal = oJson[field];
			if ($('#post-blog-form [name='+field+']:not(:file)').attr('type') == 'radio') {
				$('#post-blog-form [name='+field+'][value='+sVal+']').prop('checked', true);
			} else {
				$('#post-blog-form [name='+field+']:not(:file)').val(sVal);
			}
			if (field == 'blog_feat_photo') {
				$('#imagePreview').attr('src', sVal);
				$('#blog_feat_photo').val('');
				if (isUpdate) {
					$('#imageInput').val('');
				}
			}
			if ($.inArray(field, ['added', 'updated']) >= 0) {
				$('#blog-'+field).text(formatDatetime(sVal));
			}
			if (field == 'blog_url') {
				$('#blog_url-link').text(baseUrl+sVal);
				$('#blog_url-href').attr('href', baseUrl+sVal);
			}
			if (isUpdate && field == 'blog_content') {
				var editor = tinymce.get('textEditor');
				editor.setContent(sVal);
			}
		}
	}
}

function cleanString(string) {
	string = string.replace(new RegExp(/\s/, 'g'), '-');
	string = string.replace(new RegExp(/[^a-z0-9\._-]/, 'g'), '');
	string = string.replace(new RegExp(/[()]/, 'g'), '');
	string = string.replace(new RegExp(/[+]/, 'g'), '');
	return string.toLowerCase();
}

function formatDatetime(sDate, options) {
	if (options == undefined) {
		options = {month: 'short', day: 'numeric', year: 'numeric', hour: 'numeric', minute: '2-digit'};
	}
	var date  = new Date(sDate);
	return date.toLocaleDateString("en-US", options);
}