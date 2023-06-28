<?php

class controlReservarMesa{
    public function validarReserva($fechaDeReserva, $hora, $ambiente, $mesa){

        include_once("../app/modelo/entidadReserva.php");
        
        $objReserva = new entidadReserva;
        $suma = $objReserva->ConsultarReserva($fechaDeReserva, $hora, $ambiente);

        $totalMesa = "5";
        $estimado = $mesa * 30;
        if($suma >= 1){
            // echo "FELICITACIONES, no puede continuar";
            $sobrante = $totalMesa - $suma;
            
            // echo ($sobrante);
            if($mesa <= $sobrante){
                // echo "Puede reservar";
                include_once("formDatosCliente.php");
                $objetoDatos = new formDatosClientes;
                $objetoDatos->formDatosClientesShow($fechaDeReserva, $hora, $ambiente, $mesa, $estimado);
            }

            else {
                include_once("../shared/mensajeSistema.php");
                $objmensaje = new mensajeSistema;   
                $objmensaje->mensajeSistemaShow("No hay suficiente mesas. Hay $sobrante mesa(s) sobrante(s).", "../shared/formPrincipal.php?btnReservarMesa=true");
            }

        }
        else{
            include_once("formDatosCliente.php");
            $objetoDatos = new formDatosClientes;
            $objetoDatos->formDatosClientesShow($fechaDeReserva, $hora, $ambiente, $mesa, $estimado);           
        }
        
    }


    public function guardarReserva($fechaDeReserva, $hora, $ambiente, $mesa, $nombre, $dni, $monto) {

        //Fecha actual
        $fechaReservada = date("Y-m-d");

        include_once("../app/modelo/entidadReserva.php");
        // Crear un objeto de la clase "entidadUsuario"
        $objReserva = new entidadReserva;
        $respuesta = $objReserva->registrarReserva($fechaDeReserva, $hora, $ambiente, $mesa, $nombre, $dni, $monto, $fechaReservada);
        
        if($respuesta == true){
            // echo "FELICITACIONES, ACTUALIZASTE";
            include_once("formBoletaReserva.php");
            $objetoBoletaReserva = new formBoletaReserva;
            $objetoBoletaReserva->formBoletaReservaShow($fechaDeReserva, $hora, $ambiente, $mesa, $nombre, $dni, $monto);
        }
        else{
            include_once("../shared/mensajeSistema.php");
            $objmensaje = new mensajeSistema;   
            $objmensaje->mensajeSistemaShow("Error, no se pudo realizar el registro", "../shared/formPrincipal.php?btnReservarMesa=true");
        }

    }

}
