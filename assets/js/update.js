const buttons = document.getElementsByClassName('btn-tramite');

Array.from(buttons).forEach(button => {
    button.addEventListener('click', () => {
        const tramiteId = button.id.replace('btn-tramite-', '');
        console.log('Valor de tramiteId:', tramiteId);

        fetch('../view/content/verestado.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'tramiteId=' + tramiteId,
        })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                const resultadoDiv = document.getElementById('resultado');
                let content = '';

                // Concatenar los valores en una sola cadena
                content += '<div class="card-body">';
                content += '<div class="mb-2">';
                content += '<label>Información Básica</label>';
                content += '<div class="mb-2"><label class="text-x text-secondary mb-1"> CODIGO DE PAGO: ' + data.pago_cod + '</label></div>';
                content += '<div class="mb-2"><label class="text-x text-secondary mb-1"> NOMBRE: ' + data.nombre + '</label></div>';
                content += '<div class="mb-2"><label class="text-x text-secondary mb-1"> DESCRIPCION: ' + data.descripciont + '</label></div>';
                content += '<div class="mb-2"><label class="text-x text-secondary mb-1"> NOMBRE COMPLETO: ' + data.nombres + '</label></div>';
                content += '<div class="mb-2"><label class="text-x text-secondary mb-1"> APELLIDO PATERNO: ' + data.ap_paterno + '</label></div>';
                content += '<div class="mb-2"><label class="text-x text-secondary mb-1"> APELLIDO MATERNO: ' + data.ap_materno + '</label></div>';
                content += '</div>';
                content += '</div>';
                const observations = [data.obs1, data.obs2, data.obs3];

                content += '    <div class="mb-2">';
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
                content += '<label class="m-0">Estado</label><br>';
                switch (data.estado_id) {
                    case 4:
                        content += '<label class="text-x text-secondary mb-2">Finalizado</label>';
                        content += '<form action="./content/vercerti" method="POST">';
                        content += '  <input type="hidden" name="tramite" value="' + data.descripciont + '">';
                        content += '  <input type="hidden" name="name" value="' + data.nombres + '">';
                        content += '  <input type="hidden" name="ap" value="' + data.ap_paterno + '">';
                        content += '  <input type="hidden" name="am" value="' + data.ap_materno + '">';
                        content += '  <input type="hidden" name="idioma" value="' + data.idioma + '">';
                        content += '  <button type="submit" class="btn btn-success">Descargar Certificado</button>';
                        content += '</form>';
                        break;
                    case 1:
                        content += '<label class="text-x text-secondary mb-2">Iniciado</label>';
                        break;
                    case 2:
                        content += '<label class="text-x text-secondary mb-2">En Proceso</label>';
                        break;
                    case 3:
                        content += '<label class="text-x text-secondary mb-2">Observado "Revise las observaciones Arriba"</label>';
                        break;
                    default:
                        content += '<label class="text-x text-secondary mb-2">Rechazado</label>';
                        break;
                }
                resultadoDiv.innerHTML += content;

                const voucherContainer = document.getElementById('voucher-container');
                const copyDniContainer = document.getElementById('copydni-container');
                const showPDF = (url) => {
                    const pdfObject = document.createElement('object');
                    pdfObject.setAttribute('data', url);
                    pdfObject.setAttribute('type', 'application/pdf');
                    pdfObject.setAttribute('width', '100%');
                    pdfObject.setAttribute('height', '500px');
                    pdfObject.classList.add('mb-3');

                    const pElement = document.createElement('p');
                    pElement.innerHTML = 'No tienes un complemento de PDF instalado, pero puedes <a href="' + url + '">descargar el archivo PDF</a>.';

                    pdfObject.appendChild(pElement);
                    return pdfObject;
                };

                const showImage = (url) => {
                    const imageElement = document.createElement('img');
                    imageElement.setAttribute('src', url);
                    imageElement.setAttribute('alt', 'Archivo adjunto');
                    imageElement.style.maxWidth = '60%';
                    imageElement.classList.add('mb-3');

                    return imageElement;
                };

                // Mostrar voucher de pago
                const fileExtension = data.voucher.split('.').pop().toLowerCase();
                let voucherElement;

                if (fileExtension === 'pdf') {
                    voucherElement = showPDF(data.voucher);
                } else {
                    voucherElement = showImage(data.voucher);
                }

                voucherContainer.appendChild(voucherElement);

                // Mostrar copia de DNI
                const copyDniPDF = document.createElement('object');
                copyDniPDF.setAttribute('data', data.copia);
                copyDniPDF.setAttribute('type', 'application/pdf');
                copyDniPDF.setAttribute('width', '100%');
                copyDniPDF.setAttribute('height', '400px');
                copyDniPDF.classList.add('mb-3');

                const copyDniPEl = document.createElement('p');
                copyDniPEl.innerHTML = 'No tienes un complemento de PDF instalado, pero puedes <a href="' + data.copia + '">descargar el archivo PDF.</a>';

                copyDniPDF.appendChild(copyDniPEl);
                copyDniContainer.appendChild(copyDniPDF);

                // Agregar formulario de actualización de documentos
                const form = document.createElement('form');
                form.setAttribute('action', './content/updatedoc');
                form.setAttribute('method', 'post');
                form.setAttribute('enctype', 'multipart/form-data');

                const codInput = document.createElement('input');
                codInput.setAttribute('type', 'hidden');
                codInput.setAttribute('name', 'cod');
                codInput.setAttribute('value', tramiteId);

                const inputGroup = document.createElement('div');
                inputGroup.classList.add('input-group');

                const input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('name', 'archivo');
                input.classList.add('form-control-file');

                const inputGroupAppend = document.createElement('div');
                inputGroupAppend.classList.add('input-group-append');

                const submitButton = document.createElement('button');
                submitButton.setAttribute('type', 'submit');
                submitButton.classList.add('btn', 'btn-primary');
                submitButton.textContent = 'Subir Documento';

                inputGroupAppend.appendChild(submitButton);
                inputGroup.appendChild(input);
                inputGroup.appendChild(inputGroupAppend);
                form.appendChild(codInput);
                form.appendChild(inputGroup);

                resultadoDiv.appendChild(form);
                resultadoDiv.appendChild(copyDniContainer);
                resultadoDiv.appendChild(voucherContainer);
                resultadoDiv.scrollIntoView({ behavior: 'smooth' });

            })
            .catch(error => console.log('Error:', error));
    });
});