import "bootstrap";
import "popper.js";
import "summernote";
$(document).ready(function(){
    $('#page_content').summernote();

    $('.square').on('click', function(){
        console.log($(this).data('trigger'));
        $($(this).data('trigger')).click();
    })
})
