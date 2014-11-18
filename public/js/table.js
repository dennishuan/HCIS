$(function () {
  console.log( "loaded" );

  var $table = $('#table');



  $('#edit').click(function () {

  });

  $('#delete').click(function () {
    var path = $(location).attr('pathname');
    $.ajax({
      type: 'post',
      data: .serialize(),
      success: function () {
        $('#table').bootstrapTable('refresh', {silent: true});
      },
      error: function(){
        $('.alert-danger').text('An error occurred');
      }
    });
  });
});
