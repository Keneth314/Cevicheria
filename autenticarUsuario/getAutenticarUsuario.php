<?php
// error_reporting(0);

function validarCamposVacios(...$array){
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;
}

function validarCantPrivilegios($array){
    if(count($array) > 0)
        return true;
    else
        return false;
}

function validarDatos($usuario, $password){
    if(strlen($usuario) >= 6 && strlen($password) >= 6)
        return true;
    else    
        return false;
}



if(isset($_POST["btnEnviar"]) == true){

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die();

    $usuario = $_POST["usuario"];
    $password = $_POST["password"];


    // echo $usuario;

    if(validarCamposVacios($usuario, $password) == true){

        $usuario = trim($usuario);
        $password = trim($password);

        if(validarDatos($usuario, $password) == true){
            include_once("controlAutenticarUsuario.php");
            $objControlAutenticar = new controlAutenticarUsuario;     
            $objControlAutenticar->verificarUsuario($usuario, $password);
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";


        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Caracteres deben ser mayor o igual 6", "../index.php");    
        }

    }
    else{
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../index.php");    
    }



}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../index.php");    
    // $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?validarReserva=true");    

}


?>