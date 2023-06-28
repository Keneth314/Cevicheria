<?php
error_reporting(0);

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
// die();

function validarCamposVacios($a, $b, $c){
    $array = [];
    array_push($array, $a, $b, $c);
    $vacio = false;
    foreach($array as $valor){
        if(empty(trim($valor)) == true && (trim($valor) != 0))
            $vacio = true;
    }
    return !$vacio;
} 
function validarPrecio($precio){
    if($precio > 6){
        return true;
    }
    else{
        return false;
    }
}


if(isset($_POST["btnRegistrar"]) == true){

    // echo "<pre>";
    // echo "Registrar";
    // var_dump($_POST);
    // echo "</pre>";
    // die();

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $estado = $_POST["estado"];

        if(validarCamposVacios($nombre, $precio, $estado)){

            if(validarPrecio($precio)){

                include_once("controlAdministrarProductos.php");
                $objControl = new controlAdministrarProductos;
                $objControl->registrarProductos($nombre, $precio, $estado);

            }
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("El precio debe ser mayor que 6", "../shared/formPrincipal.php?btnAdministrarProductos=true");         
            }
        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Hay campos vacios", "../shared/formPrincipal.php?btnAdministrarProductos=true");     
        }
        

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnAdministrarProductos=true");            
    }


}
else if(isset($_GET["btnEliminar"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        $nombreProducto = $_GET["nombre"];

        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        // die(); 

        include_once("controlAdministrarProductos.php");
        $objControlProductos = new controlAdministrarProductos;     
        $objControlProductos->eliminarProducto($nombreProducto);

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnAdministrarProductos=true");            
    }
}
else if(isset($_GET["btnEditar"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        // die(); 

        $nombreProducto = $_GET["nombre"];
        $precio = $_GET["precio"];
        $estado = $_GET["estado"];


        include_once("controlAdministrarProductos.php");
        $objControlProductos = new controlAdministrarProductos;     
        $objControlProductos->editarProducto($nombreProducto, $precio, $estado);

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnAdministrarProductos=true");            
    }
}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnAdministrarProductos=true");        

}


?>
