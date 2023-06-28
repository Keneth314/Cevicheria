<?php
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

class controlRegistrarUsuario{

    public function listarPrivilegio(){

        // Llamamos a la "entidadPrivilegio"
        include_once("../app/modelo/entidadPrivilegio.php");
        
        // Crear un objeto de la clase "entidadUsuario"
        $objUsuario = new entidadPrivilegio;
        $privilegios = $objUsuario->obtenerAllPrivilegios();

        // echo "<pre>";
        // var_dump($privilegios);
        // echo "</pre>";

        // die();

        include_once("../registrarUsuario/formRegistrarUsuario.php");
        // include_once("../registrarUsuario/getRegistrarUsuario.php");
        $obj = new formRegistrarUsuario;

        $obj->formRegistrarUsuarioShow($privilegios);
    }


    public function comprobarUsuarioUnico($usuario, $password, $privilegios){

        // Llamamos a la "entidadUsuario"
        include_once("../app/modelo/entidadUsuario.php");
        // Crear un objeto de la clase "entidadUsuario"
        $objUsuario = new entidadUsuario;
        $registrado = $objUsuario->validarUsuarioUnico($usuario);
        
        // echo "<pre>";
        // var_dump($registrado);
        // echo "</pre>";

        // die();

        // $usuario = "Randomdasdasdasd";
        // echo "<pre>";
        // var_dump($usuario, $password, $privilegios);
        // echo "</pre>";
        // die();

        if($registrado == false){

            

            // Sanitizacion de datos
            // acepta solo letras, tildes y espacios
            $usuario = preg_replace('([^A-Za-z|\ssáéíóúÁÉÍÓÚ])', '', $usuario);

            // echo "<pre>";
            // var_dump($usuario, $password, $privilegios);
            // echo "</pre>";
            // die();
            
            include_once("../app/modelo/entidadUsuario.php");
            // Crear un objeto de la clase "entidadUsuario"
            $objUsuario = new entidadUsuario;
            $respuesta = $objUsuario->insertarRegistro($usuario, $password, $privilegios);
            if($respuesta == true){
                echo "FELICITACIONES, REGISTRASTE";
                header("Location: ../shared/formPrincipal.php?btnRegistrarUsuario=true");

            }
            else{
                // echo "ODIO A JOEL";
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Hubo un error, no se insertó", "../shared/formPrincipal.php?btnRegistrarUsuario=true");          
            }

        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Ya existe ese usuario", "../shared/formPrincipal.php?btnRegistrarUsuario=true");            
        }
    }


}
