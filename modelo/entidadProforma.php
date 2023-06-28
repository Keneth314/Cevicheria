<?php

include_once("../app/modelo/conexionSingleton.php");

class entidadProforma{

    public function insertarPedidosAProforma($mesa, $ambiente){
        // echo "LLEGO!!! A PROFORMA";
        // die(); 

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "SELECT * FROM pedidos 
        WHERE mesa = '$mesa' AND ambiente = '$ambiente'";

        $query = mysqli_query($con, $sql);
        $pedidos = array(); // Crea la variable $pedidos y se le asigna un array vacío
        $montoTotal = 0;
        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $pedidos[] = $fila; // Añade el array $fila al final de $pedidos
            $montoTotal += $fila["total"];
        }

        // $this->desconectar();

        // echo "<pre>";
        // print_r($pedidos);
        // print_r($montoTotal);
        // echo "</pre>";
        // die();

        for ($i = 0; $i < count($pedidos) ; $i++) { 
            $nombreProducto = $pedidos[$i]["descripcion"];
            $cantidad = $pedidos[$i]["cantidad"];
            $precio = $pedidos[$i]["precio"];
            $total = $pedidos[$i]["total"];
            $mesa = $pedidos[$i]["mesa"];
            $ambiente = $pedidos[$i]["ambiente"];

            // echo "<pre>";
            // var_dump($nombreProducto, $cantidad, $precio, $total, $mesa, $ambiente);
            // echo "</pre>";
            // die();

            $sql="INSERT INTO proformas (descripcion, cantidad, precio, total, mesa, ambiente, montoTotal) 
            VALUES ('$nombreProducto', '$cantidad', '$precio',' $total','$mesa','$ambiente', '$montoTotal')";
            $query = mysqli_query($con,$sql);
        }

        // $this->desconectar();
        // echo "FELICITACIONES, SE INSERTO!!!!";
        // die();
        
    }

    public function estadoMesas(){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $resultado_final = array();

        for ($i = 1; $i <= 3 ; $i++) { 
            for ($j = 1; $j <= 3 ; $j++) { 

                $sql = "SELECT descripcion AS name_pedido, mesa, ambiente
                FROM proformas 
                WHERE mesa = '$i' AND ambiente = '$j' LIMIT 1";

                $query = mysqli_query($con, $sql);
                $resultados = array(); // Crea la variable $resultados y se le asigna un array vacío
                // echo "Mesa: $i - Ambiente: $j<br>";
                while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    $resultados[] = $fila; // Añade el array $fila al final de $resultados
                }
                array_push($resultado_final, $resultados);
            }

        }

        // $this->desconectar();
        
        // echo "<pre>";
        // print_r($resultado_final);
        // echo "</pre>";
        // die();
        return $resultado_final;



    }

    public function obtenerDetallesMesa($mesa, $ambiente){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "SELECT descripcion, cantidad, precio, total, montoTotal
        FROM proformas 
        WHERE mesa = '$mesa' AND ambiente = '$ambiente'";

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

    

}
