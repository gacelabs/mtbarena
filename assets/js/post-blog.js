$(function() {
	tinymce.init({
		selector: '#textEditor',
		branding: false,
		menubar: false ,
		plugins: "image link wordcount",
		toolbar: 'h1 h2 h3 h4 h5 italic bold alignleft aligncenter alignright blockquote link image',
	});

	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('#imagePreview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$("#imageInput").change(function() {
		readURL(this);
	});
});