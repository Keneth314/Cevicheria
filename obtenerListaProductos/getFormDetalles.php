<?php
// error_reporting(0);

if(isset($_POST["btnProducto"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();

        $nombreProducto = $_POST["btnProducto"];
        $mesa = $_POST["mesa"];
        $ambiente = $_POST["ambiente"];
        $cantidad = $_POST["cantidad"];

        if(empty($cantidad) || $cantidad >= 0){

            if(empty($cantidad)){
                $cantidad = 1;
            }

            // echo "<pre>";
            // var_dump($_POST);
            // echo "</pre>";
            // die(); 
            
            include_once("controlObtenerProductos.php");
            $objControlProductos = new controlObtenerProductos;     
            $objControlProductos->insertarProducto($nombreProducto, $mesa, $ambiente, $cantidad);
        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("La cantidad ingresada es incorrecta", "getFormMesas.php?btnMesa=$mesa". "_$ambiente");            
    

        }
    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnObtenerProductos=true");            
    }


}
else if(isset($_REQUEST["btnEliminar"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        $nombreProducto = $_GET["descripcion"];
        $cantidad = $_GET["cantidad"];
        $mesa = $_GET["mesa"];
        $ambiente = $_GET["ambiente"];

        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        // die(); 

        include_once("controlObtenerProductos.php");
        $objControlProductos = new controlObtenerProductos;     
        $objControlProductos->eliminarProducto($nombreProducto, $mesa, $ambiente, $cantidad);

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnObtenerProductos=true");            
    }
}
else if(isset($_REQUEST["btnRegistrar"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        $mesa = $_GET["mesa"];
        $ambiente = $_GET["ambiente"];

        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        // die(); 

        include_once("controlObtenerProductos.php");
        $objControlProductos = new controlObtenerProductos;     
        $objControlProductos->insertarProforma($mesa, $ambiente);


    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnObtenerProductos=true");            
    }
}
else if(isset($_REQUEST["btnCancelar"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        $mesa = $_GET["mesa"];
        $ambiente = $_GET["ambiente"];

        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        // die(); 

        include_once("controlObtenerProductos.php");
        $objControlProductos = new controlObtenerProductos;     
        $objControlProductos->eliminarRegistrosPedidos($mesa, $ambiente);


    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnObtenerProductos=true");            
    }
}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnObtenerProductos=true");        

}


?>
