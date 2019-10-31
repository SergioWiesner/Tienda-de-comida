$(document).ready(function () {
    $('input[type="submit"]').click(function () {
        // sleep(2000)
        // $(this).attr("disabled", true);
    });
    $('#clientescedula').keydown(function (e) {
        if (e.keyCode == 13) {
            $.ajax({
                url: '/api/clientesApi/' + $(this).val(),
                success: function (respuesta) {
                    if (respuesta['idcliente'] != undefined) {
                        $('#idlciente').attr('value', respuesta['idcliente']);
                        $('#clientesnombre').attr('value', respuesta['nombre']);
                        $('#clientesciudad').attr('value', respuesta['ciudad']);
                    } else {
                        alert('No se encontro cliente');
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


