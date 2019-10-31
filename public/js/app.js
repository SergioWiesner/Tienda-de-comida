$(document).ready(function () {
    $('input[type="submit"]').click(function () {
        // sleep(2000)
        // $(this).attr("disabled", true);
    });
    $('#clientescedula').keydown(function () {
        console.log($(this).val().length);
        if ($(this).val().length > 7) {
            $.ajax({
                url: '/api/clientesApi/' + $(this).val(),
                success: function (respuesta) {
                    console.log(JSON.parse(respuesta));
                    if (respuesta.length == 1) {
                        console.log("lo encontro ->" + respuesta);
                        // $('#clientesnombre').attr('', );
                    } else {
                        console.log("no lo ha encontrado hay " + respuesta.length + " registros");
                    }
                },
                error: function () {
                    console.log("No se ha podido obtener la información");
                }
            });
        }
    });

});

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
        if ((new Date().getTime() - start) > milliseconds) {
            break;
        }
    }
}


