$(function () {
	$("#profile").fileinput({
		'maxFileCount': 1,
		'uploadClass': 'btn btn-default upload',
		'allowedPreviewTypes': ['image'],
		'allowedFileTypes': ['image'],
	});

//	$('.upload').click(function (){
//		var path = $(location).attr('pathname');
//		var path = path + '/upload';
//		var token = {
//			_token: $('#token').attr('value')
//		};
//
//
//		console.log( $('#profile').val());
//
//		$.post(path, {_token: $('#token').attr('value'), action: 'delete', input: input})
//		.done(function () {
//			$('#table').bootstrapTable('refresh', {silent: true});
//		})
//		.fail(function() {
//			alert("Fail to upload");
//		});
//
//
//
//
//	});




});


