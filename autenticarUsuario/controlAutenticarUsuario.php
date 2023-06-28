    <?php
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // die();

    class controlAutenticarUsuario
    {

        public function verificarUsuario($usuario, $password)
        {

            include_once("../app/modelo/entidadUsuario.php");
            // Crear un objeto de la clase "entidadUsuario"
            $objUsuario = new entidadUsuario;
            $registrado = $objUsuario->validarLogin($usuario);

            if ($registrado == true) {


                include_once("../app/modelo/entidadUsuario.php");
                // Crear un objeto de la clase "entidadUsuario"
                $objUsuario = new entidadUsuario;
                $respuesta = $objUsuario->validarPasswordUsuario($usuario, $password);

                if ($respuesta == true) {


                    include_once("../app/modelo/entidadUsuario.php");
                    // Crear un objeto de la clase "entidadUsuario"
                    $objUsuario = new entidadUsuario;
                    $respuesta = $objUsuario->validarEstadoUsuario($usuario);

                    // echo "<pre>";
                    // var_dump($respuesta);
                    // echo "</pre>";
                    // echo "Contra correcta";
                    // die();


                    if ($respuesta == true) {
                        // echo "<pre>";
                        // var_dump($usuario, $password, $respuesta);
                        // echo "</pre>";
                        // die();
                        include_once("../app/modelo/entidadUsuarioPrivilegio.php");
                        // Crear un objeto de la clase "entidadUsuario"
                        $objUsuario = new entidadUsuarioPrivilegio;
                        $listaPrivilegios = $objUsuario->obtenerPrivilegiosUsuario($usuario);

                        session_start();
                        $_SESSION['usuario'] = $usuario;
                        $_SESSION['privilegios'] = $listaPrivilegios;
                        // echo "<pre>";
                        // print_r($_SESSION);
                        // print_r($listaPrivilegios);
                        // echo "</pre>";
                        session_write_close();
                        // die();



                        include_once("../shared/privilegios.php");
                        $objFormPrincipal = new Privilegios;
                        $objFormPrincipal->privilegiosShow();
                    } else {
                        include_once("../shared/mensajeSistema.php");
                        $objmensaje = new mensajeSistema;
                        $objmensaje->mensajeSistemaShow("Usuario inactivo", "../index.php");
                    }
                } else {
                    include_once("../shared/mensajeSistema.php");
                    $objmensaje = new mensajeSistema;
                    $objmensaje->mensajeSistemaShow("No coincide la contraseña", "../index.php");
                }
            } else {
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;
                $objmensaje->mensajeSistemaShow("No existe ese usuario", "../index.php");
            }
        }
    }


    ?>