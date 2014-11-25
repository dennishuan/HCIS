$(function () {
	$("#profile").fileinput({
		'maxFileCount': 1,

		'allowedPreviewTypes': ['image'],
		'allowedFileTypes': ['image'],
	});

	$("#record").fileinput({
		'maxFileCount': 0,
	});


});
