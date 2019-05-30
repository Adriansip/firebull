var backgroundOriginal;

$(document).ready(function() {
    console.log("Cargado");
});

$('.img-clientes').hover(function() {
    backgroundOriginal = $(this).parent('.alert').css('background');
    $(this).css('opacity', '1');
    $(this).parent('.alert').css('background', 'rgba(0,0,0,0.8)');
    $(this).siblings().css('color', '#FFF');
}, function() {
    $(this).siblings().css('color', '#000');
    $(this).css('opacity', '0.7');
    $(this).parent('.alert').css('background', backgroundOriginal);
});