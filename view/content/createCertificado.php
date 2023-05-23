

<?php
// include_once __DIR__ . '/layout/headlogin.php';
// require_once __DIR__ . '../../Controllers/UserControllers.php';
require_once '../../Controllers/ProcedureControllers.php';

$number = $_GET['id'];
$doc = new ProcedureControllers();
$docDetail = $doc->showMoreDetails($number);

// var_dump($docDetail);

// Read the JSON file
$jsonString = file_get_contents('../notas.json');

// Decode the JSON string
$data = json_decode($jsonString, true); 


$userDni = $docDetail['dni'];
$idioma = $docDetail['idioma'];
$nivelIdioma = $docDetail['nivel'];

$dataUser = $data[$userDni];
// echo "<pre>";
// var_dump($dataUser);
// echo "</pre>";

// echo "<pre>";
// var_dump($dataUser['cursos']);
// echo "</pre>";

$courses = $dataUser['cursos'];
$detalleNota;
$detalleHora;
$detalleFecha;


foreach ($courses as $course) {
  # code...
  if (($course['idioma'] == $idioma) && ($course['nivel'] == $nivelIdioma)) {

    // echo $course['idioma'] . $course['nivel'] .$course['nota'] .$course['horas'] . "</br>";

    $detalleNota = $course['nota'];
    $detalleHora = $course['horas'];
    $detalleFecha = $course['anio'];

  }
  // print_r($course);
}
$fullname = $dataUser['nombres'] . ' ' . $dataUser['apellidos']; 
// generar certficado

require('./fpdf.php');

// $pdf = new FPDF('P','mm','A4');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

// $pdf->Cell(40,10,'Hello World!');
// $pdf->Cell(60,10,'Powered by FPDF.',0,1,'C');
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('./template_4.png', 0, 0, 297, 210);

// $pdf->AddFont('ArialUnicode', '', './font/courier.php');
// $pdf->SetFont('ArialUnicode', '', 12);

// $pdf->Cell(80);
$pdf->SetXY(0, 75 );
// $pdf->Cell(0,0,'Hello World!');
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0, 10,strtoupper($fullname), 0, 0,'C');
$pdf->SetXY(35, 85 );
$pdf->SetFont('Arial','',20);
$pdf->Cell(228, 20, "Por haber concluido satisfactoriamente sus estudios del idioma ". strtoupper($idioma) .",", 0, 0,'C');
$pdf->SetXY(40, 95 );
$pdf->SetFont('Arial','',20);
$pdf->Cell(227, 20, iconv('UTF-8', 'ISO-8859-1//TRANSLIT', "correspondiente al " . strtoupper($nivelIdioma) ." con una calificación de (". $detalleNota ."), cursado en el año ") , 0, 0,'C');
$pdf->SetXY(13, 105 );
$pdf->SetFont('Arial','',20);
$pdf->Cell(217, 20, $detalleFecha . ", habiendo acumulado " . $detalleHora . " horas de aprendizaje." , 0, 0,'C');



// Insert a dynamic image from a URL
// $pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World', 0, 0, 0, 0, 'PNG');
$pdf->Output();






