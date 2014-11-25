$(function () {
  $("#profile").fileinput({
    'maxFileCount': 1,
    'uploadClass': 'btn btn-default upload',
    'allowedPreviewTypes': ['image'],
    'allowedFileTypes': ['image'],
  });
});
