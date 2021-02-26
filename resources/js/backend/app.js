// import 'alpinejs' // Not sure what this is used for but it gives an annoying warning.

window.$ = window.jQuery = require('jquery');
window.Swal = require('sweetalert2');

// require('datatables.net-bs4');
require('datatables.net-rowreorder-bs4');

// CoreUI
require('@coreui/coreui');

// Boilerplate
require('../plugins');

import "chart.js";

$.fn.successAlert = function (data){
    let html = '<div class="alert alert-success" role="alert">' +
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

$.fn.failureAlert = function (err){
    let html = '<div class="alert alert-danger" role="alert">' +
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

$.fn.errorAlert = function (err){
    let html = '<div class="alert alert-danger" role="alert">' +
        '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
        '            <span aria-hidden="true">&times;</span>' +
        '        </button>' +
        ' Oops! Something went wrong on our end.' +
        '    </div>';
    $('#mainContainer').prepend(html);
}
