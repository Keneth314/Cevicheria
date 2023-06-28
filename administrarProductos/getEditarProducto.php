<?php
error_reporting(0);

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die();

function validarCamposVacios($a, $b, $c){
    $array = [];
    array_push($array, $a, $b, $c);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;
} 
function validarPrecio($precio){
    if($precio > 6){
        return true;
    }
    else{
        return false;
    }
}


if(isset($_POST["btnActualizar"]) == true){

    // echo "<pre>";
    // echo "Registrar";
    // var_dump($_POST);
    // echo "</pre>";
    // die();

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        $nombre = $_REQUEST["nombre"];
        $precio = $_REQUEST["precio"];
        $estado = $_REQUEST["estado"];
        $antiguo_nombre = $_REQUEST["antiguo_nombre"];


        if(validarCamposVacios($nombre, $precio, $estado)){

            if(validarPrecio($precio)){

                include_once("controlAdministrarProductos.php");
                $objControl = new controlAdministrarProductos;
                $objControl->actualizarProducto($nombre, $precio, $estado, $antiguo_nombre);

                

            }
            else{
                // Que regrese al formEditarProducto FALTA!!!
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("El precio debe ser mayor que 6", "../shared/formPrincipal.php?btnAdministrarProductos=true");         
            }
        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("El precio debe ser mayor que 6", "../administrarProductos/getAdministrarProductos.php?btnEditar=true&nombre=$nombre&precio=$precio&estado=$estado");     
        }
        

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnAdministrarProductos=true");            
    }


}

?>