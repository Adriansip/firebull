$(document).ready(function() {
    var elementoActual;

    $('.verdescripcion').on('click', function() {
        elementoActual = $(this).attr("value");

        $("#descripcion" + elementoActual).toggle(500);
        for (var i = 0; i < 4; i++) {
            if (i != elementoActual) {
                $("#descripcion" + i).css("display", "none");
                $(".verdescripcion").attr("src", "../../imagenes/bajar.png");
                $(this).attr("src", "../../imagenes/next.png");
            }
        }
    });
});