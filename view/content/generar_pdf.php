<?php
require_once __DIR__ . '/../../config/config.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Obtener los datos enviados por AJAX
$idPago = $_POST['id_pago'];
$fecha = $_POST['fecha'];
$nombre = $_POST['nombre'];
$dni = $_POST['dni'];
$descrip = $_POST['descripcion'];
$precio = $_POST['precio'];
$dolar = $_POST['dolar'];

// Leer el contenido de la plantilla del voucher desde un archivo HTML
$html = file_get_contents('./voucher.html');

// Reemplazar los placeholders en la plantilla con los datos específicos
$html = str_replace('{id_pago}', $idPago, $html);
$html = str_replace('{fecha}', $fecha, $html);
$html = str_replace('{nombre}', $nombre, $html);
$html = str_replace('{dni}', $dni, $html);
$html = str_replace('{descripcion}', $descrip, $html);
$html = str_replace('{precio}', $precio, $html);
$html = str_replace('{dolar}', $dolar, $html);

// Cargar el HTML en DOMPDF
$dompdf->loadHtml($html);

// Configurar opciones adicionales de DOMPDF según tus necesidades
// ...

// Renderizar el HTML en PDF
$dompdf->render();

// Obtener el contenido del PDF generado
$output = $dompdf->output();

// Guardar el archivo en el servidor
$file = __DIR__ . '/../uploads/voucher.pdf';
file_put_contents($file, $output);

// Actualizar los datos en tu tabla
require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/../Controllers/PayControllers.php';
$pago = new PayControllers();
$actualizar = $pago->actualizar($idPago, 1, $fecha);

// Enviar el PDF al navegador
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="voucher.pdf"');
header('Content-Length: ' . strlen($output));
echo $output;
exit;
