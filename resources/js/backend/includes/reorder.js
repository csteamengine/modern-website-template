$(document).ready(function() {
    var table = $('.reorder-table').DataTable( {
        rowReorder: {
            selector: 'td:first-child'
        },
        columnDefs: [
            { targets: 1, visible: false }
        ]
    } );

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

            var c = $.parseJSON(json);
            var route = $('#orderRoute').val();
            var csrf_token = $('#csrfValue').val();

            $.fn.ajaxCall(json, route, csrf_token, 'POST');
        });

    });
} );
