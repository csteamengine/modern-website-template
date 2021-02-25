import "./alerts";
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

            try {
                var c = $.parseJSON(json);
                var route = $('#orderRoute').val();
                var csrf_token = $('#csrfValue').val();
                $.ajax({
                    /* the route pointing to the post function */
                    url: route,
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: csrf_token, objects: json},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        successAlert(data);
                    },
                    error: function (err) {
                        failureAlert(err);
                    }
                });
            } catch (err) {
                errorAlert(err);
            }
        });

    });
} );
