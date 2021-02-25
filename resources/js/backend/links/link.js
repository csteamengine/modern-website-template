import "summernote";
import "bootstrap";
import "jquery";


$(document).ready(function() {

});

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$('#about_image_file').on('change', function(){
    if ($(this)[0].files && $(this)[0].files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#about-image-preview').attr('src', e.target.result);
        };
        reader.readAsDataURL($(this)[0].files[0]);
        $('#about-image-preview').attr('hidden', false);
    }
});
