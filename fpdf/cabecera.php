<?php
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'Reporte de ingresos',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    
}
}

// //----------------------------------
// //capturar datos
// $fechaIni = $_GET["fechaIni"];
// $fechaFin = $_GET["fechaFin"];
// $tipo = $_GET["tipo"];
// // echo "<pre>";
// // print_r($fechaIni);
// // print_r($fechaFin);
// // print_r($tipo);
// // echo "</pre>";
// // die();  

// session_start();
// $usuario = $_SESSION["usuario"];
// session_write_close();
// //----------------------------------

// //llamado de los datos
// if($tipo == 1) {
//     include_once("../app/modelo/entidadBoletas.php");
//     $objUsuario = new entidadBoletas;
//     $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
//     // include_once("../app/modelo/entidadReserva.php");
//     // $objUsuario = new entidadReserva;
//     // $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
// }
// else if($tipo == 0) {
//     include_once("../app/modelo/entidadReserva.php");
//     $objUsuario = new entidadReserva;
//     $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
// } 

// // Creación del objeto de la clase heredada
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();

// //---------------------------------------------------
// //Datos generales
// $pdf->SetFont('Arial','',16);
// $pdf->Cell(18,10,'Autor:',0,0,'L',0);
// $pdf->Cell(120,10,$usuario,0,1,'L',0);

// $pdf->Cell(51,10,'Fecha de creacion:',0,0,'L',0);
// $pdf->Cell(120,10,'Tipo de reporte:',0,1,'L',0);

// $pdf->Cell(42,10,'Tipo de reporte:',0,0,'L',0);
// if($tipo == 1) {
//     $pdf->Cell(120,10,'Tipo de reporte:',0,1,'L',0);
// }
// else if($tipo == 0) {
//     $pdf->Cell(120,10,'Reservas',0,1,'L',0);
// }

// $pdf->Cell(47,10,'Rango de fechas:',0,0,'L',0);
// $pdf->Cell(31,10,$fechaIni,0,0,'L',0);
// $pdf->Cell(4,10,'/',0,0,'L',0);
// $pdf->Cell(31,10,$fechaFin,0,1,'L',0);

// $pdf->Cell(50,10,'Tabla de ingresos:',0,1,'L',0);
// $pdf->Ln(5);

// //---------------------------------------------------
// //Cabecera: tabla de reporte
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell(15,10,'#',1,0,'C',0);
// $pdf->Cell(95,10,'Cliente',1,0,'C',0);
// $pdf->Cell(40,10,'Fecha',1,0,'C',0);
// $pdf->Cell(40,10,'Monto Total',1,1,'C',0);

// //----------------------------------------
// //contenido real de mi reporte
// $pdf->SetFont('Arial','',16);
//     for ($i=0; $i < count($validar); $i++) { 
//         $pdf->Cell(15,10,$i+1,1,0,'C',0);
//         $pdf->Cell(95,10,$validar[$i]['cliente'],1,0,'C',0);
//         $pdf->Cell(40,10,$validar[$i]['fecha'],1,0,'C',0);
//         $pdf->Cell(40,10,$validar[$i]['monto'],1,1,'C',0);
//     }
    
// //----------------------------------------
// $pdf->Output();
