<?php
error_reporting(0);

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

function validarDatos($usuario, $password, $repassword){

    if((strlen($usuario) > 4 &&  (strlen($usuario) <= 25)) && 
       (strlen($password) > 4 &&  (strlen($password) <= 15)) && 
       (strlen($repassword) > 4 &&  (strlen($repassword) <= 15)) ){
        return true;
    }
    else{
        return false;
    }
}

function validarPasswordIguales($password, $repassword){
    if($password == $repassword)
        return true;
    else
        return false;
}


if(isset($_POST["btnGuardar"]) == true){


    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // die();

        $id = $_GET["id"];
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $estado = $_POST["estado"];
        $privilegio = $_POST["privilegio"]; // array
        // echo $usuario;

        if(validarCamposVacios($usuario, $password, $repassword, $estado) == true){

            if(isset($privilegio) && validarCantPrivilegios($privilegio) == true){
                // echo "<pre>";
                // var_dump($_POST);
                // echo "</pre>";
                // die();

                $usuario = trim($usuario);
                $password = trim($password);
                $repassword = trim($repassword);
                
                if(validarDatos($usuario, $password, $repassword) == true){

                    // echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";
                    // die();

                    if(validarPasswordIguales($password, $repassword) == true){
                        include_once("controlEditarUsuario.php");
                        $objEditar = new controlEditarUsuario;     
                        $objEditar ->actualizarDatosUsuario($id, $usuario, $password, $estado, $privilegio);
                        
                        // include_once("controlRegistrarUsuario.php");
                        // $objControlRegistrar = new controlRegistrarUsuario;     
                        // $objControlRegistrar->comprobarUsuarioUnico($usuario, $password,$estado, $privilegio);

                    }
                    else{
                        include_once("../shared/mensajeSistema.php");
                        $objmensaje = new mensajeSistema;   
                        $objmensaje->mensajeSistemaShow("Las contraseñas deben ser iguales", "../editarUsuario/getBuscarUsuario.php?btnEditar=true&usuario=$usuario");  
                    }

                }
                else{
                    // echo "<pre>";
                    // var_dump(validarDatos($usuario, $password, $repassword));
                    // echo "</pre>";

                    include_once("../shared/mensajeSistema.php");
                    $objmensaje = new mensajeSistema;   
                    $objmensaje->mensajeSistemaShow("Los campos deben de tener entre 6 y 15 caracteres", "../editarUsuario/getBuscarUsuario.php?btnEditar=true&usuario=$usuario");    
                }

            }
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("No ha seleccionado ningún privilegio", "../editarUsuario/getBuscarUsuario.php?btnEditar=true&usuario=$usuario");    
            }

        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../editarUsuario/getBuscarUsuario.php?btnEditar=true&usuario=$usuario");    
        }

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnEditarUsuario=true");            
    }


}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnEditarUsuario=true");        

}


?>
