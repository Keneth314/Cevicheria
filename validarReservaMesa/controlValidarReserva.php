<?php

class controlValidarReserva{


    public function buscarReservas($dni){
        include_once("../app/modelo/entidadReserva.php");
        $objtReserva = new entidadReserva;   
        $reservas = $objtReserva->obtenerReservas($dni);
        // echo "<pre>";
        // print_r($reservas);
        // echo "</pre>";
        
        if(empty($reservas) == true){
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("No tiene reservas", "../shared/formPrincipal.php?btnValidarReserva=true");    
        }
        else{
            include_once("tablaReserva.php");
            $objtTablaReserva = new tablaReserva;   
            $objtTablaReserva->tablaReservaShow($reservas, $dni);     
        }
        

    }


}

// echo "<pre>";
// print_r($_GET);
// echo "</pre>";

if(isset($_GET["btnAtender"]) == true){

    session_start();
    if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
        session_write_close();
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";

        // die();

        include_once("../app/modelo/entidadReserva.php");
        $objtReserva = new entidadReserva;   
        $reservas = $objtReserva->atenderReserva($_GET["id"]);


        $objtControl = new controlValidarReserva;   
        $objtControl->buscarReservas($_GET["dni"]);
    }
    else{
        session_write_close();
        include_once("../shared/mensajeSistema.php");
        $objmensaje = new mensajeSistema;   
        $objmensaje->mensajeSistemaShow("Error, no tiene los privilegios necesarios", "../index.php");            
    }
}
// else{
//     include_once("../shared/mensajeSistema.php");
//     $objmensaje = new mensajeSistema;   
//     $objmensaje->mensajeSistemaShow("Error, acceso no permitido", "../shared/formPrincipal.php?btnValidarReserva=true");    

// }
