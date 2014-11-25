$(function () {
  $("#profile").fileinput({
    maxFileCount: 1,
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

  $("#record").fileinput({
    maxFileCount: 0,
  });


});
