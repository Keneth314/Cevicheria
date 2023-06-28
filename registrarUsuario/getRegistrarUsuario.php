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


if(isset($_POST["btnEnviar"]) == true){


    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        // die();   

        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $repassword = $_POST["repassword"];
        $privilegio = $_POST["privilegio"]; // array
        // echo $usuario;

        if(validarCamposVacios($usuario, $password, $repassword) == true){

            if(isset($privilegio) && validarCantPrivilegios($privilegio) == true){
                // echo "<pre>";
                // var_dump($_POST);
                // echo "</pre>";


                // die();

                $usuario = trim($usuario);
                $password = trim($password);
                $repassword = trim($repassword);
                
                if(validarDatos($usuario, $password, $repassword) == true){

                    //     echo "<pre>";
                    // print_r($_POST);
                    // echo "</pre>";


                    // die();

                    if(validarPasswordIguales($password, $repassword) == true){
                        include_once("controlRegistrarUsuario.php");
                        $objControlRegistrar = new controlRegistrarUsuario;     
                        $objControlRegistrar->comprobarUsuarioUnico($usuario, $password, $privilegio);

                    }
                    else{
                        include_once("../shared/mensajeSistema.php");
                        $objmensaje = new mensajeSistema;   
                        $objmensaje->mensajeSistemaShow("Las contraseñas deben ser iguales", "../shared/formPrincipal.php?btnRegistrarUsuario=true");  
                    }

                }
                else{
                    // echo "<pre>";
                    // var_dump(validarDatos($usuario, $password, $repassword));
                    // echo "</pre>";

                    include_once("../shared/mensajeSistema.php");
                    $objmensaje = new mensajeSistema;   
                    $objmensaje->mensajeSistemaShow("Los campos deben de tener entre 6 y 15 caracteres", "../shared/formPrincipal.php?btnRegistrarUsuario=true");    
                }

            }
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("No ha seleccionado ningún privilegio", "../shared/formPrincipal.php?btnRegistrarUsuario=true");    
            }

        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../shared/formPrincipal.php?btnRegistrarUsuario=true");    
        }

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnRegistrarUsuario=true");            
    }


}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnRegistrarUsuario=true");        

}


?>
