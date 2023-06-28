<?php

function validarCamposVacios(...$array){
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;
}

function validarDni($dni){
    if($dni > 0 && strlen($dni) == 8)
        return true;
}

// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

// btnBuscar
if(isset($_POST["btnBuscar"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";

        $dni = $_POST["dni"];

        if(validarCamposVacios($dni) == true){

            $dni = trim($dni);

            if(validarDni($dni) == true){
                include_once("controlValidarReserva.php");
                $objControl = new controlValidarReserva;   
                $objControl->buscarReservas($dni);

            }
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("El DNI es incorrecto", "../shared/formPrincipal.php?btnValidarReserva=true");
                            
            }

        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("El campo DNI está vacío", "../shared/formPrincipal.php?btnValidarReserva=true");        
        }
    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnValidarReserva=true");            
    }
}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnValidarReserva=true");    
}

?>  