<?php

function validarCamposVacios($usuario){
    $array = [];
    array_push($array, $usuario);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;

} 

function validarDatos($usuario){
    
    if((strlen($usuario) >=  6 &&  strlen($usuario) <= 40)){
        return true;
    }    
    else    
        return false;
}

//primer boton: busqueda
if(isset($_POST["btnBuscar"]) == true){
    
    //sesion iniciada y recopilacion del valor de 'usuario'
    session_start();
    $usuario = $_POST["nameUsuario"];

    
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        
        //sesion cerrada temporalmente
        session_write_close();

        if(validarCamposVacios($usuario) == true){
        
            $usuario = trim($usuario);
    
            if(validarDatos($usuario) == true){
                include_once("controlEditarUsuario.php");
                $objEditarUsu = new controlEditarUsuario;     
                $objEditarUsu->buscarUsuarios($usuario);
            }
            
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Los campos deben de tener entre 6 y 40 caracteres", "../shared/formPrincipal.php?btnEditarUsuario=true");    
            } 
    
        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../shared/formPrincipal.php?btnEditarUsuario=true");  
        }

    }
    
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnEditarUsuario=true");
    }

    
}

//segundo boton: editar el usuario seleccionado
else if(isset($_GET["btnEditar"]) == true){
    session_start();


    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        $user = $_GET["usuario"];
        include_once("controlEditarUsuario.php");
        $objEditar = new controlEditarUsuario;     
        $objEditar -> buscarDatosUsuario($user);

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