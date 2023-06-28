<?php

function validarCamposVacios($oldpass, $newpass, $newpass2){
    $array = [];
    array_push($array, $oldpass, $newpass, $newpass2);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;

} 

function validarDatos($oldpass, $newpass, $newpass2){
    
    if((strlen($oldpass) >=  6 &&  strlen($oldpass) <= 15) && 
       (strlen($newpass) >= 6 && strlen($newpass) <= 15) && 
       (strlen($newpass2) >= 6 && strlen($newpass2) <= 15) ){
        return true;
    }    
    else    
        return false;
}

function validarOldPassword($oldpass, $newpass){
    if($oldpass != $newpass)
        return true;
    else
        return false;
}

function validarPasswordIguales($newpass, $newpass2){
    if($newpass == $newpass2)
        return true;
    else
        return false;
}




if(isset($_POST["btnActualizar"]) == true){
    
    //sesion iniciada y recopilacion del valor de 'usuario'
    session_start();
    $usuario = $_SESSION["usuario"];

    // session_start();

    //         echo "<pre>";
    //         var_dump($_SESSION);
    //         echo "</pre>";

    //         session_write_close();
    //         die();


    $oldpass = $_POST["oldpass"];
    $newpass = $_POST["newpass"];
    $newpass2 = $_POST["newpass2"];
    
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        
        //sesion cerrada temporalmente
        session_write_close();

        if(validarCamposVacios($oldpass, $newpass, $newpass2) == true){
        
            $usuario = trim($usuario);
            $oldpass = trim($oldpass);
            $newpass = trim($newpass);
            $newpass2 = trim($newpass2);
    
            if(validarDatos($oldpass, $newpass, $newpass2) == true){
    
                if(validarOldPassword($oldpass,$newpass) == true){
                    
                    if(validarPasswordIguales($newpass, $newpass2)== true){
                        include_once("controlActualizarPassword.php");
                        $objControlActualizar = new controlActualizarPassword;     
                        $objControlActualizar->validarPassword($usuario, $oldpass, $newpass);
                    }
                    
                    else{
                        include_once("../shared/mensajeSistema.php");
                        $objmensaje = new mensajeSistema;   
                        $objmensaje->mensajeSistemaShow("Su contraseña nueva no coincide en la verificacion", "../shared/formPrincipal.php?btnActualizarPassword=true");    
                    }
                
                }
    
                else{
                    include_once("../shared/mensajeSistema.php");
                    $objmensaje = new mensajeSistema;   
                    $objmensaje->mensajeSistemaShow("Su contraseña nueva es igual a la antigua", "../shared/formPrincipal.php?btnActualizarPassword=true");    
                }
    
            }
            
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Los campos deben de tener entre 6 y 15 caracteres", "../shared/formPrincipal.php?btnActualizarPassword=true");    
            } 
    
        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay al menos un campo vacío", "../shared/formPrincipal.php?btnActualizarPassword=true");  
        }

    }
    
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnActualizarPassword=true");
    }

    
}

else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnActualizarPassword=true");    
   
} 

?>