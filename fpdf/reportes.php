<?php
require('../fpdf/cabecera.php');
class reportes extends PDF{
    
    public function reporte($fechaIni, $fechaFin, $tipo, $validar){
        //----------------------------------
        //capturar datos
        $fechaIni = $_GET["fechaIni"];
        $fechaFin = $_GET["fechaFin"];
        $tipo = $_GET["tipo"];
        $fecha = date("Y-m-d");
        // echo "<pre>";
        // print_r($fechaIni);
        // print_r($fecha);
        // print_r($tipo);
        // echo "</pre>";
        // die();  

        session_start();
        $usuario = $_SESSION["usuario"];
        session_write_close();
        //----------------------------------

        // //llamado de los datos
        // if($tipo == 1) {
        //     include_once("../app/modelo/entidadBoletas.php");
        //     $objUsuario = new entidadBoletas;
        //     $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        // }
        // else if($tipo == 0) {
        //     include_once("../app/modelo/entidadReserva.php");
        //     $objUsuario = new entidadReserva;
        //     $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        // } 

        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        //---------------------------------------------------
        //Datos generales
        $pdf->SetFont('Arial','',16);
        $pdf->Cell(18,10,'Autor:',0,0,'L',0);
        $pdf->Cell(120,10,$usuario,0,1,'L',0);

        $pdf->Cell(51,10,'Fecha de creacion:',0,0,'L',0);
        //capturar fecha
        $pdf->Cell(120,10,$fecha,0,1,'L',0);

        $pdf->Cell(42,10,'Tipo de reporte:',0,0,'L',0);
        if($tipo == 1) {
            $pdf->Cell(120,10,'Ventas',0,1,'L',0);
        }
        else if($tipo == 0) {
            $pdf->Cell(120,10,'Reservas',0,1,'L',0);
        }

        $pdf->Cell(47,10,'Rango de fechas:',0,0,'L',0);
        $pdf->Cell(31,10,$fechaIni,0,0,'L',0);
        $pdf->Cell(4,10,'/',0,0,'L',0);
        $pdf->Cell(31,10,$fechaFin,0,1,'L',0);

        $pdf->Cell(50,10,'Tabla de ingresos:',0,1,'L',0);
        $pdf->Ln(5);

        //---------------------------------------------------
        //Cabecera: tabla de reporte
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(15,10,'#',1,0,'C',0);
        $pdf->Cell(95,10,'Cliente',1,0,'C',0);
        $pdf->Cell(40,10,'Fecha',1,0,'C',0);
        $pdf->Cell(40,10,'Monto Total',1,1,'C',0);

        //----------------------------------------
        //contenido real de mi reporte
        $pdf->SetFont('Arial','',16);
            for ($i=0; $i < count($validar); $i++) { 
                $pdf->Cell(15,10,$i+1,1,0,'C',0);
                $pdf->Cell(95,10,$validar[$i]['cliente'],1,0,'C',0);
                $pdf->Cell(40,10,$validar[$i]['fecha'],1,0,'C',0);
                $pdf->Cell(40,10,$validar[$i]['monto'],1,1,'C',0);
            }
            
        //----------------------------------------
        $pdf->Output();
    }

    public function reporteVenta($datosCliente, $detallesBoleta){
        //----------------------------------
        //capturar datos
        // $fechaIni = $_GET["fechaIni"];
        // $fechaFin = $_GET["fechaFin"];
        // $tipo = $_GET["tipo"];
        // $fecha = date("Y-m-d");
        // echo "<pre>";
        // print_r($datosCliente);
        // print_r($detallesBoleta);
        // echo "</pre>";
        // die();  

        $montoTotal = 0;
        for ($i = 0; $i < count($detallesBoleta); $i++) {
            $montoTotal += $detallesBoleta[$i]["total"];
        }

        // session_start();
        // $usuario = $_SESSION["usuario"];
        // session_write_close();
        //----------------------------------

        // //llamado de los datos
        // if($tipo == 1) {
        //     include_once("../app/modelo/entidadBoletas.php");
        //     $objUsuario = new entidadBoletas;
        //     $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        // }
        // else if($tipo == 0) {
        //     include_once("../app/modelo/entidadReserva.php");
        //     $objUsuario = new entidadReserva;
        //     $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        // } 

        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();

        //---------------------------------------------------
        //Datos generales
        $pdf->SetFont('Arial','',14);
        $pdf->Cell(18,10,'Cliente:',0,0,'L',0);
        $pdf->Cell(120,10,$datosCliente[0]["cliente"],0,1,'L',0);
        $pdf->Cell(18,10,'Mesa:',0,0,'L',0);
        $pdf->Cell(120,10,$detallesBoleta[0]['mesa'],0,1,'L',0);
        $pdf->Cell(30,10,'Ambiente:',0,0,'L',0);
        $pdf->Cell(120,10,$detallesBoleta[0]['ambiente'],0,1,'L',0);
        $pdf->Cell(35,10,utf8_decode('Código pago:'),0,0,'L',0);
        $pdf->Cell(120,10,$datosCliente[0]["codigoPago"],0,1,'L',0);
        $pdf->Cell(40,10,utf8_decode('Código boleta:'),0,0,'L',0);
        $pdf->Cell(120,10,$datosCliente[0]["codigoBoleta"],0,1,'L',0);
        $pdf->Cell(30,10,'Monto total:',0,0,'L',0);
        $pdf->Cell(120,10,$montoTotal,0,1,'L',0);
        $pdf->Cell(45,10,utf8_decode('Fecha de emisión:'),0,0,'L',0);
        $pdf->Cell(120,10,$datosCliente[0]["fechaEmision"],0,1,'L',0);

        // $pdf->Cell(51,10,'Fecha de creacion:',0,0,'L',0);
        //capturar fecha
        // $pdf->Cell(120,10,$fecha,0,1,'L',0);

        // $pdf->Cell(42,10,'Tipo de reporte:',0,0,'L',0);
        // if($tipo == 1) {
        //     $pdf->Cell(120,10,'Ventas',0,1,'L',0);
        // }
        // else if($tipo == 0) {
        //     $pdf->Cell(120,10,'Reservas',0,1,'L',0);
        // }

        // $pdf->Cell(47,10,'Rango de fechas:',0,0,'L',0);
        // $pdf->Cell(31,10,$fechaIni,0,0,'L',0);
        // $pdf->Cell(4,10,'/',0,0,'L',0);
        // $pdf->Cell(31,10,$fechaFin,0,1,'L',0);
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(50,10,'Productos consumidos:',0,1,'L',0);
        $pdf->Ln(5);

        //---------------------------------------------------
        //Cabecera: tabla de reporte
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(15,10,'#',1,0,'C',0);
        $pdf->Cell(80,10,utf8_decode('Descripción'),1,0,'C',0);
        $pdf->Cell(25,10,'Cantidad',1,0,'C',0);
        $pdf->Cell(25,10,'Precio',1,0,'C',0);
        $pdf->Cell(35,10,'Total',1,1,'C',0);

        //----------------------------------------
        //contenido real de mi reporte
        // max = 180
        $pdf->SetFont('Arial','',14);
            for ($i=0; $i < count($detallesBoleta); $i++) { 
                $pdf->Cell(15,10,$i+1,1,0,'C',0);
                $pdf->Cell(80,10,$detallesBoleta[$i]['descripcion'],1,0,'C',0);
                $pdf->Cell(25,10,$detallesBoleta[$i]['cantidad'],1,0,'C',0);
                $pdf->Cell(25,10,$detallesBoleta[$i]['precio'],1,0,'C',0);
                $pdf->Cell(35,10,$detallesBoleta[$i]['total'],1,1,'C',0);
            }
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(145,10,"Monto Total",1,0,'C',0);
            $pdf->Cell(35,10,$montoTotal,1,1,'C',0);
        //----------------------------------------
        $pdf->Output();
    }

}
