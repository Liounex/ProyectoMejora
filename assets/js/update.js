const buttons = document.getElementsByClassName('btn-tramite');
Array.from(buttons).forEach(button => {
    button.addEventListener('click', () => {
        const tramiteId = button.id.replace('btn-tramite-', '');
        /* console.log('Valor de tramiteId:', tramiteId); */
        fetch('../view/content/verestado.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'tramiteId=' + tramiteId,
        })
            .then(response => response.json())
            .then(data => {
                /* console.log(data); */
                const resultadoDiv = document.getElementById('resultado');
                let content = '';
                // Concatenar los valores en una sola cadena
                content += '<div class="card-body">';
                content += '<div class="mb-2 text-start">';
                content += '<label class="">Información Básica</label>';
                content += '<div class="mb-2 text-start"><label class="text-x text-secondary mb-1"> CODIGO DE PAGO: ' + data.pago_cod + '</label></div>';
                content += '<div class="mb-2 text-start"><label class="text-x text-secondary mb-1"> NOMBRE: ' + data.nombre + '</label></div>';
                content += '<div class="mb-2 text-start"><label class="text-x text-secondary mb-1"> DESCRIPCION: ' + data.descripciont + '</label></div>';
                content += '<div class="mb-2 text-start"><label class="text-x text-secondary mb-1"> NOMBRE COMPLETO: ' + data.nombres + '</label></div>';
                content += '<div class="mb-2 text-start"><label class="text-x text-secondary mb-1"> APELLIDO PATERNO: ' + data.ap_paterno + '</label></div>';
                content += '<div class="mb-2 text-start"><label class="text-x text-secondary mb-1"> APELLIDO MATERNO: ' + data.ap_materno + '</label></div>';
                content += '</div>';
                content += '</div>';
                const observations = [data.obs1, data.obs2, data.obs3];
                content += '    <div class="mb-2 text-start">';
                if (observations.filter(obs => obs).length === 0) {
                    content += '      <label class="text-x text-secondary mb-2">Sin Observaciones</label>';
                } else {
                    content += '      <label class="text-x text-secondary mb-2">Observaciones<br>';
                    observations.forEach((obs, obsIndex) => {
                        if (obs) {
                            content += '        ' + (obsIndex + 1) + '. ' + obs + '<br>';
                        }
                    });
                    content += '      </label>';
                }
                content += '    </div>';
                content += '<div class="text-start"><label>Estado</label></div>';
                switch (data.estado_id) {
                    case 4:
                        content += '<div class="text-start"><label class="text-x text-secondary">Finalizado</label>';
                        content += '<form action="./content/vercerti" method="POST">';
                        content += '  <input type="hidden" name="tramite" value="' + data.descripciont + '">';
                        content += '  <input type="hidden" name="name" value="' + data.nombres + '">';
                        content += '  <input type="hidden" name="ap" value="' + data.ap_paterno + '">';
                        content += '  <input type="hidden" name="am" value="' + data.ap_materno + '">';
                        content += '  <input type="hidden" name="idioma" value="' + data.idioma + '">';
                        content += '  <button type="submit" class="btn btn-success">Descargar Certificado</button>';
                        content += '</form></div>';
                        break;
                    case 1:
                        content += '<div class="text-start"><label class="text-x text-secondary">Iniciado</label></div>';
                        break;
                    case 2:
                        content += '<div class="text-start"><label class="text-x text-secondary">En Proceso</label></div>';
                        break;
                    case 3:
                        content += '<div class="text-start"><label class="text-x text-secondary">Observado "Revise las observaciones arriba"</label></div>';
                        break;
                    default:
                        content += '<div class="text-start"><label class="text-x text-secondary">Rechazado</label></div>';
                        break;
                }
                // Obtén los datos del archivo devueltos por PHP
                const vaucher = data.voucher;
                /* console.log(vaucher); */
                content += '<form action="./content/updatedoc" method="POST" enctype="multipart/form-data">';
                content += '<div class="text-start"><label>Voucher de Pago</label></div>';
                var fileExtension = vaucher.split('.').pop().toLowerCase();
                if (fileExtension === 'pdf') {
                    var pdfContent = '<div class="text-start"><object data="' + data.voucher + '" type="application/pdf" width="50%" height="500px" class="mb-3"><p>No tienes un complemento de PDF instalado, pero puedes <a href="' + data.vaucher + '">descargar el archivo PDF</a>.</p></object></div>';
                    content += pdfContent;
                } else {
                    var imgContent = '<div class="text-start"><img class="mb-3" src="' + data.voucher + '" alt="Archivo adjunto" style="max-width:50%;"></div>';
                    content += imgContent;
                }
                content += '<input type="hidden" name="cod" id="cod" value="' + data.pago_cod + '">';
                content += '<div class="mb-3">';
                content += '    <input type="file" name="vaucher" id="vaucher" class="w-50 form-control form-control-lg" aria-label="vaucher" accept=".jpg, .jpeg, .png, .pdf">';
                content += '</div>';
                content += '<div class="text-start"><label>Copia de Dni</label></div>';
                content += '<div class="text-start"><object data="' + data.copia + '" type="application/pdf" width="50%" height="500px" class="mb-3"><p>No tienes un complemento de PDF instalado, pero puedes <a href="' + data.vaucher + '">descargar el archivo PDF</a>.</p></object></div>';
                /*content += '<input type="hidden" name="cod" id="cod" value="' + data.voucher + '">'; */
                content += '<div class="mb-3">';
                content += '    <input type="file" name="copydni" id="copydni" class="w-50 form-control form-control-lg" aria-label="copydni" accept=".pdf">';
                content += '</div>';
                content += '<div class="text-start"><button class="btn btn-lg btn-primary btn-lg w-50 mt-4 mb-0">Realizar Cambios</button></div>';
                content += '</form>';
                resultadoDiv.innerHTML = content;
            })
            .catch(error => console.log('Error:', error));
    });
});