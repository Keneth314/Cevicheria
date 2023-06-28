<?php

class controlActualizarPassword{
    public function validarPassword($usuario, $oldpass, $newpass){

        include_once("../app/modelo/entidadUsuario.php");
        
        $objUsuario = new entidadUsuario;
        $validar = $objUsuario->verificarPassword($usuario, $oldpass);

        if($validar == true){

            include_once("../app/modelo/entidadUsuario.php");
            // Crear un objeto de la clase "entidadUsuario"
            $objUsuario = new entidadUsuario;
            $respuesta = $objUsuario->actualizarPassword($usuario, $newpass);
            if($respuesta == true){
                echo "FELICITACIONES, ACTUALIZASTE";

                // die();
                session_start();
                $_SESSION["usuario"] = NULL;
                $_SESSION["privilegios"] = NULL;
                session_destroy();
                session_write_close();
                

                header('Location: ../index.php');
                
                // include_once("../index.php");
                // $objetoBoletaReserva = new formBoletaReserva;
                // $objetoBoletaReserva->formBoletaReservaShow();
            }
            else{
                
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Error, no pudo realizar la actualizacion de Password", "../shared/formPrincipal.php?btnActualizarPassword=true");
            }

        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("La contraseña no es la correcta", "../shared/formPrincipal.php?btnActualizarPassword=true");            
        }

    }

}


?>