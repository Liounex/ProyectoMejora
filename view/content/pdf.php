<script>
    // Agrega este código JavaScript para descargar automáticamente el voucher después de que se haya capturado el pago
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOMContentLoaded event fired');
        var downloadButton = document.createElement('a');
        downloadButton.setAttribute('href', '../uploads/<?= $nombreArchivo ?>');
        downloadButton.setAttribute('download', 'voucher_pago.pdf');
        downloadButton.innerText = 'Descargar Voucher';

        // Simula un clic en el enlace de descarga para iniciar la descarga automáticamente
        downloadButton.click();
    });
</script>