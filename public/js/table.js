$(function () {
  console.log( "Table loaded" );

  $('#table').bootstrapTable()
  .on('all.bs.table', function (e, name, args) {
    console.log('Event:', name, ', data:', args);
  })
  .on('dbl-click-row.bs.table', function (e, row, $element) {
    var path = $(location).attr('pathname');

    window.open(path + '/' + row.id);
  });

  $('#create').click(function () {
    var path = $(location).attr('pathname') + '/create';

    window.open(path);
  });

  $('#show').click(function (){
    var path = $(location).attr('pathname');

    var input = $('#table').bootstrapTable('getSelections');

    for(i in input){
      window.open(path + '/' + input[i].id);
    }
  });

  $('#edit').click(function (){
    var path = $(location).attr('pathname');

    var input = $('#table').bootstrapTable('getSelections');

    for(i in input){
      window.open(path + '/' + input[i].id + '/edit');
    }
  });

  $('#upload').click(function () {
    var path = $(location).attr('pathname') + '/upload';
    window.open(path);
  });

  $('#delete').click(function () {
    var path = $(location).attr('pathname');
    var path = path + '/ajax';
    var token = {
      _token: $('#token').attr('value')
    };

    var input = $('#table').bootstrapTable('getSelections');

    console.log( input );

    $.post(path, {_token: $('#token').attr('value'), action: 'delete', input: input})
    .done(function () {
      $('#table').bootstrapTable('refresh', {silent: true});
    })
    .fail(function() {
      alert("Fail to Delete");
    });
  });
});
