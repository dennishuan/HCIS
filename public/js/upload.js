$(function () {
	$("#profile").fileinput({
		maxFileCount: 1,
		maxFileSize: 50,
		allowedPreviewTypes: ['image'],
		allowedFileTypes: ['image'],
		browseLabel: 'Pick Image',
		browseIcon: '<i class="glyphicon glyphicon-picture"></i>',
		removeClass: 'btn btn-danger',
		removeLabel: 'Delete',
		removeIcon: '<i class="glyphicon glyphicon-trash"></i>',
		uploadClass: 'btn btn-info',
		uploadLabel: 'Upload',
		uploadIcon: '<i class="glyphicon glyphicon-upload"></i>',

	});

	$("#recordFile").fileinput({
		maxFileCount: 0,
		maxFileSize: 2000,
	});

	  $('#confirm_Delete').on('show.bs.modal', function (e) {
	     $message = $(e.relatedTarget).attr('data-message');
	     $(this).find('.modal-body p').text($message);
	     $title = $(e.relatedTarget).attr('data-title');
	     $(this).find('.modal-title').text($title);
	     var form = $(e.relatedTarget).closest('form');
	     $(this).find('.modal-footer #confirm').data('form', form);
	   });

         $('#confirm_Delete').find('.modal-footer #confirm').on('click', function(){
             $(this).data('form').submit();
           });


});
