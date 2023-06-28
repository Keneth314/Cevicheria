<?php
// error_reporting(0);

if(isset($_REQUEST["btnDescargar"]) == true){


    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close(); 

        $codigoBoleta = $_GET["codigoBoleta"];

        // echo "<pre>";
        // print_r($_POST);
        // print_r($_GET);
        // echo "</pre>";
        // die();
        
        include_once("controlRegistrarVenta.php");
        $objControlVenta = new controlRegistrarVenta;     
        $objControlVenta->descargarBoleta($codigoBoleta);


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
