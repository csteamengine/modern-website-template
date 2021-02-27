$(document).ready(function() {
    var table = $('#mediaTable').DataTable( {
        rowReorder: {
            selector: 'td:first-child'
        },
        columnDefs: [
            { targets: 1, visible: false }
        ]
    } );
    $('.media-delete-button').on('click',function(){
        var route = $(this).data('action');
        var csrf_token = $('#csrfValue').val();
        var button = $(this);
        var id = $(this).data('id');

        function deleteRow(){
            table.row(button.parents('tr') ).remove().draw()
        }

        success = $.fn.ajaxCall(id, route, csrf_token, 'DELETE',deleteRow);
    })



    table.on('row-reordered', function (e, diff, edit) {
        table.one('draw', function () {
            var json = '[';
            var length = table.rows().data().length;

            table.rows().data().each(function (element, index) {
                json += element[1];
                if (index !== (length - 1)) {
                    json += ",";
                }
            });
            json += ']';

            var route = $('#orderRoute').val();
            var csrf_token = $('#csrfValue').val();
            var id = $(this).data('id');
            $.fn.ajaxCall(id, route, csrf_token, 'PATCH');
        });

    });
} );


