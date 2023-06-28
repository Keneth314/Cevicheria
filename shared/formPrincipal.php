<?php

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die();

class formPrincipal{
    
    public function formPrincipalShow(){

        
    }
}

// ----------------------------------------------------------------
// botones de Keneth


if(isset($_REQUEST["btnRegistrarUsuario"]) == true){

    // Llamamos al "controlRegistrarUsuario"
    include_once("../registrarUsuario/controlRegistrarUsuario.php");

    // Crear un objeto de la clase "controlRegistrarUsuario"
    $objControlRegistrar = new controlRegistrarUsuario;
    // Usar el método de la clase "controlRegistrarUsuario"
    $privilegios = $objControlRegistrar->listarPrivilegio();
} 
if(isset($_REQUEST["btnValidarReserva"]) == true){
    include_once("../validarReservaMesa/formValidarReserva.php");
    $objtFormValidar = new formValidarReserva;
    $objtFormValidar->formValidarReservaShow();
}
if(isset($_REQUEST["btnObtenerProductos"]) == true){
    include_once("../obtenerListaProductos/controlObtenerProductos.php");
    $objtControlProductos = new controlObtenerProductos;
    $objtControlProductos->obtenerEstadoMesas();
}
if(isset($_REQUEST["btnRegistrarVenta"]) == true){
    include_once("../registrarVenta/controlRegistrarVenta.php");
    $objtControlVenta = new controlRegistrarVenta;
    $objtControlVenta->obtenerEstadoMesas();
}
// ----------------------------------------------------------------
// botones de Joel

if(isset($_REQUEST["btnReservarMesa"]) == true){
    include_once("../reservarMesa/formReservarMesa.php");
    $objtFormReservar = new formReservarMesa;
    $objtFormReservar->formReservarMesaShow();
}

if(isset($_REQUEST["btnActualizarPassword"]) == true){
    include_once("../actualizarPassword/formActualizarPassword.php");
    $objtFormActualizar = new formActualizarPassword;
    $objtFormActualizar->formActualizarPasswordShow();
}

//botones nuevos Joel
if(isset($_REQUEST["btnEditarUsuario"]) == true){
    $usuarios = array();
    include_once("../editarUsuario/formBuscarUsuario.php");
    $objtEditarUsuario = new formBuscarUsuario;
    $objtEditarUsuario->formBuscarUsuarioShow($usuarios);
}

if(isset($_REQUEST["btnEmitirReporteIngresos"]) == true){
    include_once("../emitirReporteIngresos/formBuscarRegistro.php");
    $objtFormEmitirReporte = new formBuscarRegistro;
    $objtFormEmitirReporte->formBuscarRegistroShow();
}

// ----------------------------------------------------------------
// botones de Angel
if(isset($_REQUEST["btnIngresar"]) == true){
    include_once("../AutenticarUsuario/formAutenticarUsuario.php");
    $objt = new formAutenticarUsuario;
    $objt->formAutenticarUsuarioShow();
} 
if(isset($_REQUEST["btnAdministrarProductos"]) == true){
    include_once("../administrarProductos/controlAdministrarProductos.php");
    $objtControl = new controlAdministrarProductos;
    $objtControl->obtenerRegistroProductos();

    // echo "<pre>";
    // echo "ENTRO!!";
    // echo "</pre>";
    // die();
} 




?>


<?php
if(isset($_REQUEST["btnLogout"]) == true){

    session_start();
    $_SESSION["usuario"] = NULL;
    $_SESSION["privilegios"] = NULL;
    session_destroy();
    session_write_close();

    header('Location: ../index.php');
} 
?>


<?php if(isset($_REQUEST["validarReserva"]) == true){?>
    <link rel="stylesheet" href="../validarReservaMesa/validarReservaMesa.css?v=<?php echo(rand()); ?>" />
<?php }?>

