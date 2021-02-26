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
                    $.fn.successAlert(data);
                },
                error: function (err) {
                    $.fn.failureAlert(err);
                }
            });
        } catch (err) {
            $.fn.errorAlert(err);
        }
    })
});
