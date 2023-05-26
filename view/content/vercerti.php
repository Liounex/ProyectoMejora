<?php
// Incluir la clase DOMPDF
require_once __DIR__ . '/../../config/config.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Obtener los datos enviados desde el formulario
$tipo = $_POST['tramite'];
$name = $_POST['name'];
$ap = $_POST['ap'];
$am = $_POST['am'];
$idioma = $_POST['idioma'];

// Leer el contenido de la plantilla del certificado desde un archivo HTML
$html = file_get_contents(__DIR__ . '/template.html');

// Reemplazar los placeholders en la plantilla con los datos específicos
$html = str_replace('{tipo}', $tipo, $html);
$html = str_replace('{nombre}', $name, $html);
$html = str_replace('{apellido}', $ap . ' ' . $am, $html);
$html = str_replace('{idioma}', $idioma, $html);

// Cargar el HTML en DOMPDF
$dompdf->loadHtml($html);

// Configurar la orientación del papel
$dompdf->setPaper('A4', 'landscape');

// Renderizar el HTML en PDF
$dompdf->render();

// Descargar el archivo PDF en lugar de mostrarlo en el navegador
$dompdf->stream('certificado.pdf', ['Attachment' => true]);

