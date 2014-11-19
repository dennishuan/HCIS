$(function () {
    console.log( "loaded" );

    $('#table').bootstrapTable()
//      .on('all.bs.table', function (e, name, args) {
//        console.log('Event:', name, ', data:', args);
//      })
//    .on('click-row.bs.table', function (e, row, $element) {
//        var path = $(location).attr('pathname');
//
//        window.location.href = path + '/' + row.id;
//    });

    $('#create').click(function () {
        var path = $(location).attr('pathname') + '/create';

        window.location.href = path;
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

    $('#delete').click(function () {
        var path = $(location).attr('pathname');
        var path = path + '/ajax';

        var input = $('#table').bootstrapTable('getSelections');

        $.post(path, { action: 'delete', input: input}, function (data) {
            $('#table').bootstrapTable('refresh', {silent: true});
        });
    });
});
