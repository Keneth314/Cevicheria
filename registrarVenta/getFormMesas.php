<?php
error_reporting(0);

if(isset($_REQUEST["btnMesa"]) == true){


    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close(); 

        $btnMesa = explode("_", $_REQUEST["btnMesa"]);

        // echo "<pre>";
        // var_dump($_POST, $btnMesa);
        // echo "</pre>";
        // die();   

        $mesa = $btnMesa[0];
        $ambiente = $btnMesa[1];
        $cobrado = $btnMesa[2]; // si: cobrado - no: falta cobrar
        // CAMBIAR A si
        
        include_once("controlRegistrarVenta.php");
        $objControlVenta = new controlRegistrarVenta;     
        $objControlVenta->obtenerDetallesYMontoTotal($mesa, $ambiente);


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
