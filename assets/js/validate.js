function buscar() {
    var codigo = $('#codigo').val();
    if (codigo === '') {
        alert('Ingrese su codigo de pago');
    } else {
        $.ajax({
            method: 'POST',
            url: '/proyectomejora/view/content/validate.php',
            data: {
                codigo: codigo
            },
            success: function (data) {
                var datos = JSON.parse(data);
                if (datos == null) {
                    alert('El código no se encuentra registrado');
                } else {
                    console.log(data);
                    $('#dni').val(datos.dni);
                    $('#nombre').val(datos.nombre);
                    $('#correo').val(datos.correo);
                    $('#telefono').val(datos.telefono);
                    $('#ap_paterno').val(datos.ap_paterno);
                    $('#ap_materno').val(datos.ap_materno);
                    $('#tprocedure').val(datos.id_tramite);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

}

$(document).ready(function () {
    $('#btn-buscar').click(function () {
        buscar();
    });
});