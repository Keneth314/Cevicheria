<?php

class controlRegistrarVenta{

    public function obtenerEstadoMesas(){

        include_once("../app/modelo/entidadProforma.php");
        $objProforma = new entidadProforma;
        $estadoMesas = $objProforma->estadoMesas();
        // echo "<pre>";
        // print_r($estadoMesas);
        // echo "</pre>";
        // die();

        include_once("../registrarVenta/formMesas.php");
        $objtMesas = new formMesas;
        $objtMesas->formMesasShow($estadoMesas);
    }

    public function obtenerDetallesYMontoTotal($mesa, $ambiente){
        // echo "<pre>";
        // var_dump($mesa, $ambiente);
        // echo "</pre>";
        // die();  

        include_once("../app/modelo/entidadProforma.php");
        $objProforma = new entidadProforma;
        $detallesVenta =  $objProforma->obtenerDetallesMesa($mesa, $ambiente);

        include_once("formDetallesVentas.php");
        $objDetallesMesa = new formDetallesVentas;
        $objDetallesMesa->formDetallesVentasShow($detallesVenta, $mesa, $ambiente);
        
    }

    public function registrarBoleta($nombreCliente, $montoTotal, $codigoBoleta, $codigoPago, $mesa, $ambiente, $fechaEmision){
        // echo "<pre>";
        // var_dump($nombreCliente, $montoTotal, $codigoBoleta, $codigoPago, $mesa, $ambiente, $fechaEmision);
        // echo "</pre>";
        // die();  

        include_once("../app/modelo/entidadBoleta.php");
        $objProforma = new entidadBoleta;
        $objProforma->insertarBoleta($nombreCliente, $montoTotal, $codigoBoleta, $codigoPago, $fechaEmision);

        include_once("../app/modelo/entidadDetallesBoleta.php");
        $objProforma = new entidadDetallesBoleta;
        $objProforma->insertarDetallesBoleta($mesa, $ambiente, $codigoBoleta);

        // $codigoBoleta = 212620939887984;
        include_once("../app/modelo/entidadBoleta.php");
        $objBoleta = new entidadBoleta;
        $datosCliente =  $objBoleta->obtenerDatosCliente($codigoBoleta);
        // echo "<pre>";
        // print_r($datosCliente);
        // echo "</pre>";
        // die();
        
        include_once("../app/modelo/entidadDetallesBoleta.php");
        $objtDetallesBoleta = new entidadDetallesBoleta;
        $detallesBoleta=  $objtDetallesBoleta->obtenerDetallesBoleta($codigoBoleta);
        

        include_once("formDescargarBoleta.php");
        $objFormDescargar = new formDescargarBoleta;
        $objFormDescargar->formDescargarBoletaShow($datosCliente, $detallesBoleta, $codigoBoleta);
        // die();

    }

    public function descargarBoleta($codigoBoleta){

        include_once("../app/modelo/entidadBoleta.php");
        $objBoleta = new entidadBoleta;
        $datosCliente =  $objBoleta->obtenerDatosCliente($codigoBoleta);

        include_once("../app/modelo/entidadDetallesBoleta.php");
        $objtDetallesBoleta = new entidadDetallesBoleta;
        $detallesBoleta=  $objtDetallesBoleta->obtenerDetallesBoleta($codigoBoleta);

        include_once("../fpdf/reportes.php") ;
        $objtReporte = new reportes;
        $objtReporte->reporteVenta($datosCliente, $detallesBoleta);

    }
}
