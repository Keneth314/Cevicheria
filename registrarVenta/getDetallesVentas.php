<?php
// error_reporting(0);

// Validamos que los dos no estén vacíos
function validarCamposCodigo($codigoYape, $codigoTarjeta){
    $p = empty(trim($codigoYape));
    $q = empty(trim($codigoTarjeta));

    // Disyuncion exclusiva (△): Solo permito que uno de ellos tenga contenido
    if( ($p || $q) && (!$p || !$q) ){
        return true;
    }
    else{
        return false;
    }
} 

function valdiarCodigoPago($codigoPago){
    if(strlen($codigoPago) >= 9){
        return true;
    }
    else{
        return false;
    }
}

if(isset($_POST["btnCobrar"]) == true){
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    // die();   

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        
        // echo "<pre>";
        // var_dump($_REQUEST);
        // echo "</pre>";
        // die();   

        $codigoYape = $_POST["codigoYape"];
        $codigoTarjeta = $_POST["codigoTarjeta"];
        $nombreCliente = $_POST["nombreCliente"];

        $mesa = $_GET["mesa"];
        $ambiente = $_GET["ambiente"];
        $montoTotal = $_GET["montoTotal"];

        // Validamos que los dos no estén vacíos
        if(validarCamposCodigo($codigoYape, $codigoTarjeta) == true){

            if(!empty(trim($codigoYape))){
                $codigoPago = $codigoYape;
            }
            if(!empty(trim($codigoTarjeta))){
                $codigoPago = $codigoTarjeta;
            }

            // echo "SOLO HAY UN CODIGO";
            // echo "<pre>";
            // var_dump($codigoYape, $codigoTarjeta, $codigoPago);
            // echo "</pre>";
            // die();   
            
            if(valdiarCodigoPago($codigoPago)){

                if(empty(trim($nombreCliente))){
                    $nombreCliente = "No específico";
                }
                else{
                    $nombreCliente = trim($nombreCliente);
                    $nombreCliente = preg_replace('([^A-Za-z|\ssáéíóúÁÉÍÓÚ])', '', $nombreCliente);
                }

                // echo "TODO OK";
                date_default_timezone_set('America/Lima');
                $hor_min_seg_venta = date("His");
                // var_dump($hora);
                $codigoBoleta = trim($hor_min_seg_venta.$codigoPago);

                $fechaEmision = date("Y-m-d");

                // echo "<pre>";
                // var_dump($hor_min_seg_venta, $codigoPago, $codigoBoleta, $fechaEmision);
                // echo "</pre>";
                // die(); 

                include_once("controlRegistrarVenta.php");
                $objControlVenta = new controlRegistrarVenta;     
                $objControlVenta->registrarBoleta($nombreCliente, $montoTotal, $codigoBoleta, $codigoPago, $mesa, $ambiente, $fechaEmision);
            }
            else{
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("El código debe tener 9 caracteres como mínimo", "../shared/formPrincipal.php?btnRegistrarVenta=true");            

            }

        }
        else{
            // echo "HAY DOS CÓDIGOS O NINGUNO";
            // echo "<pre>";
            // var_dump($codigoYape, $codigoTarjeta);
            // echo "</pre>";
            // die();  
            
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Error, digito dos códigos o ninguno", "getFormMesas.php?btnMesa=$mesa"."_$ambiente");            
        }

    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../shared/formPrincipal.php?btnRegistrarVenta=true");            
    }


}
else{
    include_once("../shared/mensajeSistema.php");
    $objmensaje = new mensajeSistema;   
    $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnRegistrarVenta=true");        

}


?>
