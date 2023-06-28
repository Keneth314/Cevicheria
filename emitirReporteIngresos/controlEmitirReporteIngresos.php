<?php

class controlEmitirReporteIngresos{
    public function buscarRegistros($fechaIni, $fechaFin, $tipo){

        if($tipo == 1) {
            include_once("../app/modelo/entidadBoleta.php");
            $objUsuario = new entidadBoleta;
            $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
            // include_once("../app/modelo/entidadReserva.php");
            // $objUsuario = new entidadReserva;
            // $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        }
        else if($tipo == 0) {
            include_once("../app/modelo/entidadReserva.php");
            $objUsuario = new entidadReserva;
            $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        }

        if($validar == null){
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("No existe ningun registro en ese rango de dias", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");  
        }
        else{
            include_once("../emitirReporteIngresos/formReporteIngresos.php");
            $objtReporte = new formReporteIngresos;
            $objtReporte->formReporteIngresosShow($validar,$tipo, $fechaIni, $fechaFin);
        }
        // echo "<pre>";
        // print_r($validar);
        // echo "</pre>";
        // die();
    }

    public function buscarDatosRegistro($id, $tipo, $fechaIni, $fechaFin){
        if($tipo == 1) {
            //datos generales del pedido
            include_once("../app/modelo/entidadBoleta.php");
            $objVenta = new entidadBoleta;
            $datos = $objVenta->obtenerDatosVenta($id);
            //datos espeficos del pedido
            include_once("../app/modelo/entidadBoleta.php");
            $objDetalle = new entidadBoleta;
            $pedido = $objDetalle->obtenerDetalleReporteVenta($id);

            // echo "<pre>";
            // print_r($datos);
            // print_r($pedido);
            // echo "</pre>";
            // die();
        }
        else if($tipo == 0) {
            include_once("../app/modelo/entidadReserva.php");
            $objReserva = new entidadReserva;
            $datos = $objReserva->obtenerDatosReserva($id);
            $pedido = array();
        }

        include_once("../emitirReporteIngresos/formDetalleRegistro.php");
        $objtReporte2 = new formDetalleRegistro;
        $objtReporte2->formDetalleRegistroShow($datos,$pedido, $tipo, $fechaIni, $fechaFin);

    }

    public function generarReporte($fechaIni, $fechaFin, $tipo){

        //llamado de los datos
        if($tipo == 1) {
            include_once("../app/modelo/entidadBoleta.php");
            $objUsuario = new entidadBoleta;
            $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        }
        else if($tipo == 0) {
            include_once("../app/modelo/entidadReserva.php");
            $objUsuario = new entidadReserva;
            $validar = $objUsuario->obtenerRegistrosAll($fechaIni, $fechaFin);
        } 

        include_once("../fpdf/reportes.php") ;
        $objtReporte = new reportes;
        $objtReporte->reporte($fechaIni, $fechaFin, $tipo, $validar);
    }
}
