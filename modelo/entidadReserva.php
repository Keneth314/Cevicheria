<?php

include_once("../app/modelo/conexionSingleton.php");


class entidadReserva{

    //---------------------------------------------------------------------
    //Funciones de Keneth
    public function obtenerReservas($dni){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        $sql = "SELECT nombre, fechaReservada, fechaDeReserva, ambiente, cantMesas, monto, hora, atendido, idReserva
        FROM reservas WHERE dni = $dni";

        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $filas
        }
        
        // $this->desconectar();

        // echo "<pre>";
        // print_r($resultados);
        // echo "</pre>";

        // die();

        return $resultados;

    }

    public function atenderReserva($id){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "UPDATE reservas
        SET atendido = '1' WHERE idReserva = '$id'";
        
        $query= mysqli_query($con,$sql);
        
        // $this->desconectar();
    }

    //---------------------------------------------------------------------
    //Funciones de Joel
    public function ConsultarReserva($fechaDeReserva, $hora, $ambiente){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection();   
        
        $sql = "SELECT  cantMesas FROM reservas WHERE fechaDeReserva = '$fechaDeReserva' && hora = '$hora' && ambiente = '$ambiente'";
        $query = mysqli_query($con, $sql);
        
        $suma = 0; // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            // echo "<pre>";
            // var_dump($fila);
            // echo "</pre>";
            $suma += $fila["cantMesas"]; // Añade el array $fila al final de $filas
        }
        // $this->desconectar();
        // echo "<pre>";
        // var_dump($suma);
        // echo "</pre>";
        return $suma;
    }

    public function registrarReserva($fechaDeReserva, $hora, $ambiente, $mesa, $nombre, $dni, $monto, $fechaReservada){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql="INSERT INTO reservas ( nombre, dni, monto, fechaReservada, fechaDeReserva, hora, ambiente, cantMesas, atendido) VALUES ('$nombre','$dni','$monto',' $fechaReservada','$fechaDeReserva','$hora','$ambiente','$mesa','0')";
        $query= mysqli_query($con,$sql);
        
        // $this->desconectar();

        return $query;

    }


    // ------------------------------------------------------
    // Nuevas funciones
    public function obtenerRegistrosAll ($fechaIni, $fechaFin) {
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql="SELECT `idReserva` AS id, `nombre` AS cliente, `monto` AS monto, `fechaReservada` AS fecha FROM `reservas` WHERE `fechaReservada` BETWEEN '$fechaIni' AND '$fechaFin'";
        $query= mysqli_query($con,$sql);
        
        $resultados = array(); // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $filas
        }

        // $this->desconectar();
        // echo "<pre>";
        // print_r($resultados);
        // echo "</pre>";

        // die();
        return $resultados;
    }

    public function obtenerDatosReserva($id){
        
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        
        $sql = "SELECT nombre, dni, fechaReservada, fechaDeReserva, ambiente, cantMesas, monto, hora, atendido, idReserva FROM reservas WHERE idReserva = $id";

        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $filas
        }
        
        // $this->desconectar();

        // echo "<pre>";
        // print_r($resultados);
        // echo "</pre>";

        // die();

        return $resultados;

    }

}
