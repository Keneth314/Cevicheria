<?php

function validarCamposVacios($fechaDeReserva, $hora, $ambiente, $mesa){
    $array = [];
    array_push($array, $fechaDeReserva, $hora, $ambiente, $mesa);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;

} 

function validarFechaActual($fechaDeReserva){
    $fechaReservada = date("Y-m-d");
    if($fechaDeReserva<=$fechaReservada){
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


if(isset($_POST["btnVerificar"]) == true){
    
    session_start();
    
    $fechaDeReserva = $_POST["fechaDeReserva"];
    $hora = $_POST["hora"];
    $ambiente = $_POST["ambiente"];
    $mesa = $_POST["mesa"];

    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        
        if(validarCamposVacios($fechaDeReserva, $hora, $ambiente, $mesa) == true){
        
            if(validarFechaActual($fechaDeReserva) == true) {
                
                // if(validarHora($hora)== true) {
                    include_once("controlReservarMesa.php");
                        $objControlReservar = new controlReservarMesa;     
                        $objControlReservar->validarReserva($fechaDeReserva, $hora, $ambiente, $mesa);
                // }
    
                // else{
                //     include_once("../shared/mensajeSistema.php");
                //     $objmensaje = new mensajeSistema;   
                //     $objmensaje->mensajeSistemaShow("Horario fuera de atencion", "../shared/formPrincipal.php?btnReservarMesa=true");    
                // } 
    
            }
    
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("La fecha seleccionada no está disponible", "../shared/formPrincipal.php?btnReservarMesa=true");    
            } 
    
        }
    
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../shared/formPrincipal.php?btnReservarMesa=true");    
        }
    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnReservarMesa=true");
    }

     

}

else if (isset($_GET["btnDatos"]) == true){
    $fechaDeReserva = $_GET["fechaDeReserva"];
    $hora = $_GET["hora"];
    $ambiente = $_GET["ambiente"];
    $mesa = $_GET["mesa"];
    
    include_once("controlReservarMesa.php");
    $objControlReservar = new controlReservarMesa;     
    $objControlReservar->validarReserva($fechaDeReserva, $hora, $ambiente, $mesa);
}

else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnReservarMesa=true");    
} 


?>