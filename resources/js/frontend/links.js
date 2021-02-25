$(document).ready(function() {
    $('.page-content').css('background-color', 'transparent');
});

$(window).ready(function(){
    $('.link-image').each(function(){
        var imageElement = $(this);
        var image = $(this).data('image');

        if(image.length != 0){
            var img = $('<img />').attr({
                'src': image,
            }).on('load', function() {
                imageElement.attr('src', image);
                // imageElement.css('background', 'url("'+image+'") center center');
                // imageElement.css('background-size', 'cover');
            });
        }
    });
    $('.link-bg-image').each(function(){
        var imageElement = $(this);
        var image = $(this).data('image');

        if(image.length != 0){
            var img = $('<img />').attr({
                'src': image,
            }).on('load', function() {
                imageElement.css('background', 'url("'+image+'") center center');
                imageElement.css('background-size', 'cover');
            });
        }
    });
});
