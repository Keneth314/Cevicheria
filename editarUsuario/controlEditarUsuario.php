<?php

class controlEditarUsuario{
    public function buscarUsuarios($usuario){

        include_once("../app/modelo/entidadUsuario.php");
        
        $objUsuario = new entidadUsuario;
        $validar = $objUsuario->validarUsuariosAll($usuario);

        $resultado = count($validar);
        if($resultado > 0){

            // echo "<pre>";
            // var_dump($resultado);
            // var_dump($validar);
            // echo "</pre>";
            // die();
            include_once("../editarUsuario/formBuscarUsuario.php");
            $objtEditarUsuario = new formBuscarUsuario;
            $objtEditarUsuario->formBuscarUsuarioShow($validar);


        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("No existen usuarios coincidentes ", "../shared/formPrincipal.php?btnEditarUsuario=true");            
        }

    }

    public function buscarDatosUsuario($user){
            // echo "<pre>";
            // var_dump($user);
            // echo "</pre>";
        include_once("../app/modelo/entidadUsuario.php");
        $objUsuario = new entidadUsuario;
        $datos = $objUsuario->obtenerDatosUsuario($user);

        include_once("../app/modelo/entidadUsuarioPrivilegio.php");
        $objPrivilegio = new entidadUsuarioPrivilegio;
        $priviUser = $objPrivilegio->obtenerPrivilegiosUsuario($user);

        include_once("../app/modelo/entidadPrivilegio.php");
        $objAllPrivi = new entidadPrivilegio;
        $allPrivi = $objAllPrivi->obtenerAllPrivilegios();

        // echo "<pre>";
        // print_r($datos);
        // print_r($priviUser);
        // print_r($allPrivi);
        // echo "</pre>";

        // die();

        include_once("../editarUsuario/formEditarUsuario.php");
        $objtEditarUsuario = new formEditarUsuario;
        $objtEditarUsuario->formEditarUsuarioShow($datos, $priviUser, $allPrivi);


    }

    public function actualizarDatosUsuario($id, $usuario, $password, $estado, $privilegio){
        include_once("../app/modelo/entidadUsuario.php");
        // Crear un objeto de la clase "entidadUsuario"
        $objId = new entidadUsuario;
        $validar = $objId->validarIdUnico($id, $usuario);

        
        if($validar == false){
            include_once("../app/modelo/entidadUsuario.php");
            // Crear un objeto de la clase "entidadUsuario"
            $objUsuario = new entidadUsuario;
            $respuesta = $objUsuario->actualizarDatos($id, $usuario, $password, $estado, $privilegio);
            
            if($respuesta == true){
                // echo "FELICITACIONES, Actualizaste";
                header("Location: ../shared/formPrincipal.php?btnEditarUsuario=true");

            }
            else{
                // echo "ODIO A JOEL";
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("Hubo un error, no se insertó", "../shared/formPrincipal.php?btnEditarUsuario=true");          
            }
        }

        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Ya existe ese usuario registrado. Usar otro nombre usuario", "../shared/formPrincipal.php?btnEditarUsuario=true");            
        }
    }

}
