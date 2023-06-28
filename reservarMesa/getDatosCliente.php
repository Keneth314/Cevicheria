<?php

function validarCamposVacios($nombre, $dni){
    $array = [];
    array_push($array, $nombre, $dni);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;   
} 

function validarDatos($nombre){
    
    if(strlen($nombre) >= 6 && strlen($nombre) <= 40)
        return true;
    else    
        return false;
}

function validarDni($dni){
    if(strlen(trim($dni)) == 8)
        return true;
    else    
        return false;
}

// function validarMonto($estimado, $monto){
//     if($estimado == $monto){
//         return true;
//     }
        
//     else{
//         return false;
//     }          
// }

if(isset($_REQUEST["btnReservar"]) == true){

    // echo "POST\n";
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    // echo "GET\n";
    // echo "<pre>";
    // var_dump($_GET);
    // var_dump($_REQUEST);
    // echo "</pre>";
    session_start();

    $fechaDeReserva = $_REQUEST["fechaDeReserva"];
    $hora = $_REQUEST["hora"];
    $ambiente = $_REQUEST["ambiente"];
    $mesa = $_REQUEST["mesa"];
    $monto = $_REQUEST["estimado"];
    
    $nombre = $_REQUEST["nombre"];
    $dni = $_REQUEST["dni"];
    // $monto = $_REQUEST["monto"];

    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        if(validarCamposVacios($nombre, $dni) == true){
        
            $nombre = trim($nombre);
            $dni = trim($dni);
            // $monto = trim($monto);
    
            if (validarDatos($nombre) == true){
    
                if (validarDni($dni) == true){
    
                    // if (validarMonto($estimado, $monto) == true){
    
                        include_once("controlReservarMesa.php");
                        $objControlReservar = new controlReservarMesa;     
                        $objControlReservar->guardarReserva($fechaDeReserva, $hora, $ambiente, $mesa, $nombre, $dni, $monto);
    
                    // }
                    // else {
                    //     include_once("../shared/mensajeSistema.php");
                    //     $objmensaje = new mensajeSistema;   
                    //     $objmensaje->mensajeSistemaShow("El monto no es el correspondiente", "../reservarMesa/getReservarMesa.php?btnDatos=true&fechaDeReserva=$fechaDeReserva&hora=$hora&ambiente=$ambiente&mesa=$mesa&estimado=$estimado");
                    // }
                        
                }
        
                else{
                    include_once("../shared/mensajeSistema.php");
                    $objmensaje = new mensajeSistema;   
                    $objmensaje->mensajeSistemaShow("El DNI no tiene 8 caracteres.", "../reservarMesa/getReservarMesa.php?btnDatos=true&fechaDeReserva=$fechaDeReserva&hora=$hora&ambiente=$ambiente&mesa=$mesa&estimado=$estimado");  
                    // include_once("../reservarMesa/formDatosCliente.php");
                    // $objDatos = new formDatosClientes;
                    // $objDatos->formDatosClientesShow($fechaDeReserva, $hora, $ambiente, $mesa);
                }
                
            }
    
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Los campos deben tener minimo 6 caracteres y maximo 40", "../reservarMesa/getReservarMesa.php?btnDatos=true&fechaDeReserva=$fechaDeReserva&hora=$hora&ambiente=$ambiente&mesa=$mesa&estimado=$estimado");    
            }
    
        }
    
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../reservarMesa/getReservarMesa.php?btnDatos=true&fechaDeReserva=$fechaDeReserva&hora=$hora&ambiente=$ambiente&mesa=$mesa&estimado=$estimado");    
        }

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnReservarMesa=true");
    }



    

}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnReservarMesa=true");    
} 

?>