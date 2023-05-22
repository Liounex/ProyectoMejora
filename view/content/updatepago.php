<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Obtén los datos necesarios para generar el voucher (puedes obtenerlos de la base de datos o de los datos de la solicitud)
$idPago = $_POST['id_pago']; // Ejemplo: ID del pago
$fechaActual = $_POST['fecha']; // Ejemplo: Fecha actual

// Crea el contenido HTML del voucher
$html = '<html>
<head>
<title>Voucher de Pago</title>
</head>
<body>
<h1>Voucher de Pago</h1>
<p>ID Pago: ' . $idPago . '</p>
<p>Fecha: ' . $fechaActual . '</p>
<!-- Agrega más detalles según tus necesidades -->
</body>
</html>';

// Crea una instancia de Dompdf y carga el contenido HTML
$dompdf->loadHtml($html);

// Renderiza el contenido HTML en PDF
$dompdf->render();

// Genera el archivo PDF
$nombreArchivo = uniqid('voucher_') . '.pdf'; // Nombre del archivo PDF generado


// Actualiza los datos en tu tabla, como se muestra en tu código existente
require_once __DIR__ . '/../../config/config.php';
require_once(APP_ROOT . '/../Controllers/PayControllers.php');
$pago = new PayControllers();
$actualizar = $pago->actualizar($idPago, 1, $fechaActual);

// Guarda el archivo en el servidor
$output = $dompdf->output();
$file = __DIR__ . '/../uploads/' . $nombreArchivo;
file_put_contents($file, $output);
