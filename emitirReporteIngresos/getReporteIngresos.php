<?php

// function validarCamposVacios($fechaIni, $fechaFin, $tipo){
//     $array = [];
//     array_push($array, $fechaIni, $fechaFin, $tipo);
//     $vacio = false;
//     foreach($array as $valor){
//         if(empty(trim($valor)) == true && (trim($valor) != 0))
//             $vacio = true;
//     }
//     return !$vacio;
// } 


// function validarHora($hora){
//     $horaIni = ("10:00");
//     $horaFin = ("22:00");
//     if($hora<$horaIni || $hora>$horaFin){
//         return false;
//     }
//     else
//         return true;
// }


if(isset($_GET["btnDetalles"]) == true){
    
    session_start();
    
    $id = $_GET["id"];
    $tipo = $_GET["tipo"];
    $fechaIni = $_GET["fechaIni"];
    $fechaFin = $_GET["fechaFin"];

    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        // echo($fechaIni);
        // die();
        include_once("../emitirReporteIngresos/controlEmitirReporteIngresos.php");
        $objBuscar = new controlEmitirReporteIngresos;     
        $objBuscar ->buscarDatosRegistro($id, $tipo, $fechaIni, $fechaFin);    
    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");
    }  
}


//----------------------------------------------
else if(isset($_GET["btnDescargar"]) == true){
    session_start();

    $fechaIni = $_GET["fechaIni"];
    $fechaFin = $_GET["fechaFin"];
    $tipo = $_GET["tipo"];
    // $validar = $_GET["validar"];
        // echo($fechaIni);
        // echo($fechaFin);
        // echo($tipo);
        // die();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        // echo("hola");
        include_once("../emitirReporteIngresos/controlEmitirReporteIngresos.php");
        $objreporte = new controlEmitirReporteIngresos;    
        $objreporte -> generarReporte($fechaIni, $fechaFin, $tipo);
        // include_once("../fpdf/reporte.php") ;
        // $objtReporte = new reportes;
        // $objtReporte->reporte($fechaIni, $fechaFin, $tipo);

    }

    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");
    }
}
//----------------------------------------------

else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");    
} 


?>