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
                    //Agregar mas detalle
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Hacer una solicitud AJAX para actualizar los datos en tu tabla
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= APP_URL . '/view/content/updatepago.php' ?>', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText); // Verificar la respuesta del servidor
                            Swal.fire({
                                title: 'Felicidades',
                                text: 'Su pago a sido procesado',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then(() => {
                                window.location.href = '../view/detalle';
                            });
                        } else {
                            Swal.fire({
                                title: 'Oh no!',
                                text: 'Hubo un error con su pago intente mas tarde',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            })
                        }
                    }
                };
                var idPago = '<?= $id ?>';
                var fechaActual = new Date().toISOString(); // Obtiene la fecha actual en formato ISO
                console.log(idPago, fechaActual);
                xhr.send('id_pago=' + idPago + '&fecha=' + fechaActual);
                /* console.log(idPago)
                xhr.send('id_pago=' + idPago); */

            });
        },


        onCancel: function(data) {
            alert('pago cancelado');
            console.log(data)
        }
    }).render('#paypal-button-container');
</script>