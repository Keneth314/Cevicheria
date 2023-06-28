<?php

function validarCamposVacios($fechaIni, $fechaFin, $tipo){
    $array = [];
    array_push($array, $fechaIni, $fechaFin, $tipo);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;

} 

function validarFechaActual($fechaFin , $fechaIni){
    $fechaActual = date("Y-m-d");
    if($fechaFin > $fechaActual || $fechaIni > $fechaActual){
        return false;
    }
    else
        return true;
}

function validarFechas($fechaFin, $fechaIni){
    if($fechaIni > $fechaFin){
        return false;
    }
    else
        return true;
}

// function validarHora($hora){
//     $horaIni = ("10:00");
//     $horaFin = ("22:00");
//     if($hora<$horaIni || $hora>$horaFin){
//         return false;
//     }
//     else
//         return true;
// }


if(isset($_POST["btnBuscar"]) == true){
    
    session_start();
    
    $fechaIni = $_POST["fechaIni"];
    $fechaFin = $_POST["fechaFin"];
    $tipo = $_POST["tipo"];

    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        
        if(validarCamposVacios($fechaIni, $fechaFin, $tipo) == true){
        
            if(validarFechaActual($fechaFin , $fechaIni) == true) {
                
                if(validarFechas($fechaFin, $fechaIni)== true) {
                        // echo($tipo);
                        // die();
                        include_once("../emitirReporteIngresos/controlEmitirReporteIngresos.php");
                        $objControlReporte = new controlEmitirReporteIngresos;     
                        $objControlReporte->buscarRegistros($fechaIni, $fechaFin, $tipo);
                }
    
                else{
                    include_once("../shared/mensajeSistema.php");
                    $objmensaje = new mensajeSistema;   
                    $objmensaje->mensajeSistemaShow("Rango de fecha erróneo, la fecha inicial debe ser menor a la fecha final", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");    
                } 
    
            }
    
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Fechas no disponibles", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");    
            } 
    
        }
    
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");    
        }
    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnEmitirReporteIngresos=true");
    }

     

}

//----------------------------------------------
else if(isset($_GET["btnRegresar"]) == true){
    session_start();

    $fechaIni = $_GET["fechaIni"];
    $fechaFin = $_GET["fechaFin"];
    $tipo = $_GET["tipo"];

    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        include_once("../emitirReporteIngresos/controlEmitirReporteIngresos.php");
        $objControlReporte = new controlEmitirReporteIngresos;     
        $objControlReporte->buscarRegistros($fechaIni, $fechaFin, $tipo);
        // include_once("controlEditarUsuario.php");
        // $objEditar = new controlEditarUsuario;     
        // $objEditar -> buscarDatosUsuario($user);

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