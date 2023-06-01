<script>
    paypal.Buttons({
        style: {
            label: 'pay',
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $dolar ?>',
                        currency: 'USD'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Hacer una solicitud AJAX para generar y descargar el PDF
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= APP_URL . '/view/content/generar_pdf.php' ?>', true); // Ruta hacia el script PHP que generará el PDF
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.responseType = 'blob'; // Indicar que la respuesta será un objeto Blob (archivo)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            // Mostrar alerta exitosa con SweetAlert
                            Swal.fire({
                                title: 'Felicidades',
                                text: 'Su pago ha sido procesado',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then(function() {
                                // Descargar el PDF generado
                                var blob = new Blob([xhr.response], {
                                    type: 'application/pdf'
                                });
                                var link = document.createElement('a');
                                link.href = window.URL.createObjectURL(blob);
                                link.download = 'voucher.pdf'; // Nombre del archivo PDF
                                link.click();

                                window.location.href = 'tramiteus';
                            });
                        } else {
                            // Mostrar alerta de error con SweetAlert
                            Swal.fire({
                                title: 'Oh no!',
                                text: 'Hubo un error con su pago. Intente de nuevo más tarde.',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    }
                };
                // Obtener los datos necesarios para generar el PDF
                var idPago = '<?= $value['pago_cod'] ?>';
                var fechaActual = new Date().toISOString(); // Obtener la fecha actual en formato ISO
                var nombre = '<?= $value['nombres'] ?>';
                var dni = '<?= $value['dni_user'] ?>';
                var descripcion = '<?= $value['descripciont'] ?>';
                var precio = '<?= $value['total'] ?>';
                var dolar = '<?= $dolar ?>';

                var data = 'id_pago=' + idPago + '&fecha=' + fechaActual + '&nombre=' + nombre + '&dni=' + dni + '&descripcion=' + descripcion + '&precio=' + precio + '&dolar=' + dolar;
                xhr.send(data);


            });
        },




        onCancel: function(data) {
            alert('pago cancelado');
            console.log(data)
        }
    }).render('#paypal-button-container');
</script>