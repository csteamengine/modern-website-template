$(document).ready(function() {
    $('.status-input').change(function() {
        $(this).parents('form:first').submit();
    })
} );
