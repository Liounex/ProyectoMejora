const infoContainer = document.querySelector(".infoBox");

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
                    $('#tprocedure').val(datos.tipotramite);
                    $('#cantidad').val(datos.cantidad);

                    let cantidad = datos.cantidad;
                    let tipoTramite = datos.tipotramite;

                    if (tipoTramite == 'Certificado de Estudios' || tipoTramite == 'Constancia de Estudios') {
                        // repetir
                      for (let index = 1; index <= cantidad; index++) {
                        // const element = array[index];
                        // console.log(cantidad);

                        let tempBox = '';
                        tempBox = document.createElement("div");
                        
                        // tempBox.innerHTML = "<input type='text' name='doc" + index + "'>"; 

                        let inputOne = "<input type='text' placeholder='Ingrese Nivel' name='doc" + index + "'>";
                        let inputTwo = "<input type='text' placeholder='Ingrese Año' name='doci" + index + "'>";
                        tempBox.innerHTML = inputOne + inputTwo;

                        infoContainer.appendChild(tempBox);
                      }
                    }
                    else if (tipoTramite == "Examen de Suficiencia") {
                      let tempBox = '';
                      tempBox = document.createElement("div");
                      
                      // tempBox.innerHTML = "<input type='text' name='doc" + index + "'>"; 

                      let inputOne = "<input type='text' placeholder='Ingrese Nivel' name='doc1'>";

                      tempBox.innerHTML = inputOne;
                      infoContainer.appendChild(tempBox);
                    }

                    
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