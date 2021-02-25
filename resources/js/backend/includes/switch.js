import "./alerts";
$(document).ready(function() {
    $('.c-switch-input').change(function() {
        try {
            var route = $(this).data('route');
            var csrf_token = $('#csrfValue').val();
            $.ajax({
                /* the route pointing to the post function */
                url: route,
                type: 'PATCH',
                /* send the csrf-token and the input to the controller */
                data: {_token: csrf_token, projects: $(this).data('id')},
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
    })
});

function successAlert(data){
    var html = '<div class="alert alert-success" role="alert">' +
        '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '            <span aria-hidden="true">&times;</span>' +
        '        </button>' +
        '' + data['message'] +
        '    </div>';

    $('#mainContainer').prepend(html);

    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
}

function failureAlert(err){
    var html = '<div class="alert alert-danger" role="alert">' +
        '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '            <span aria-hidden="true">&times;</span>' +
        '        </button>' +
        '' + err['responseJSON']['message'] +
        '    </div>';
    $('#mainContainer').prepend(html);

    window.setTimeout(function () {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 4000);
}

function errorAlert(err){
    var html = '<div class="alert alert-danger" role="alert">' +
        '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '            <span aria-hidden="true">&times;</span>' +
        '        </button>' +
        ' Oops! Something went wrong on our end.' +
        '    </div>';
    $('#mainContainer').prepend(html);
}
