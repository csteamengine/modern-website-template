$(document).ready(function() {

    $('.c-switch-input').change(function() {
        var route = $(this).data('route');
        var csrf_token = $('#csrfValue').val();
        var id = $(this).data('id');
        $.fn.ajaxCall(id, route, csrf_token, 'PATCH');
    })
});
