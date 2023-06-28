<?php

include_once("../app/modelo/conexionSingleton.php");
class entidadBoleta{

    public function insertarBoleta($nombreCliente, $montoTotal, $codigoBoleta, $codigoPago, $fechaEmision){
        // echo "<pre>";
        // var_dump($nombreCliente, $montoTotal, $codigoBoleta, $codigoPago, $fechaEmision);
        // echo "</pre>";
        // die();  

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        
        $sql="INSERT INTO boletas (cliente, montoTotal, codigoPago, codigoBoleta, fechaEmision) 
        VALUES ('$nombreCliente', '$montoTotal', '$codigoPago','$codigoBoleta','$fechaEmision')";
        $query = mysqli_query($con,$sql);
        
        // $this->desconectar();

        // if($query){
        //     echo "SE INSERTO!!";
        // }
        // else{
        //     echo "NO SE INSERTO!!";

        // }
        // die();

    }

    public function obtenerDatosCliente($codigoBoleta){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "SELECT cliente, montoTotal, codigoPago, codigoBoleta, fechaEmision
        FROM boletas 
        WHERE codigoBoleta = '$codigoBoleta'";

        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $resultados y se le asigna un array vacío

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $resultados
        }

        // $this->desconectar();

        // echo "<pre>";
        // print_r($resultados);
        // echo "</pre>";
        // die();

        return $resultados;
    } 


    // ------------------------------------------------------
    // Nuevas funciones
    public function obtenerRegistrosAll ($fechaIni, $fechaFin) {
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        // $con = conexion::getConexion();

        $sql="SELECT `idBoleta` AS id, `cliente` AS cliente, `montoTotal` AS monto, `fechaEmision` AS fecha FROM `boletas` WHERE `fechaEmision` BETWEEN '$fechaIni' AND '$fechaFin'";
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

    public function obtenerDatosVenta($id){
        
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        $sql = "SELECT * FROM boletas WHERE idBoleta = $id";

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

    public function obtenerDetalleReporteVenta($id){
        
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        $sql = "SELECT * FROM detallesboleta WHERE idBoleta = $id";

        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $filas
        }
        
        // $this->desconectar();
        return $resultados;

    }
}
