<?php

include_once("../app/modelo/conexionSingleton.php");
class entidadDetallesBoleta{

    public function insertarDetallesBoleta($mesa, $ambiente, $codigoBoleta){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        // $con = conexion::getConexion();

        // Obtener los detalles de Mesa de proformas
        $sql = "SELECT descripcion, cantidad, precio, total, mesa, ambiente
        FROM proformas WHERE mesa = '$mesa' AND ambiente = '$ambiente'";

        $query = mysqli_query($con, $sql);
        $proformas = array(); // Crea la variable $proformas y se le asigna un array vacío

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $proformas[] = $fila; // Añade el array $fila al final de $proformas
        }

        // echo "<pre>";
        // print_r($proformas);
        // echo "</pre>";
        // die();



        // Eliminar de la tabla proformas los datos obtenidos
        $sql = "DELETE FROM proformas  
        WHERE mesa = '$mesa' AND ambiente = '$ambiente' ";
        $query = mysqli_query($con,$sql);
        

        // Obtener el id del usuario registrado en la Boleta
        $sql = "SELECT idBoleta
        FROM boletas WHERE codigoBoleta = '$codigoBoleta'";
        $query = mysqli_query($con, $sql);

        $usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);

        // echo "<pre>";
        // print_r($usuario);
        // echo "</pre>";
        // die();


        // Insertar en detallesBoleta
        for ($i = 0; $i < count($proformas); $i++) { 

            $nombreProducto = $proformas[$i]["descripcion"];
            $cantidad = $proformas[$i]["cantidad"];
            $precio = $proformas[$i]["precio"];
            $total = $proformas[$i]["total"];
            $mesa = $proformas[$i]["mesa"];
            $ambiente = $proformas[$i]["ambiente"];
            $idUsuario = $usuario["idBoleta"];
            
            $sql="INSERT INTO detallesBoleta (descripcion, cantidad, precio, total, mesa, ambiente, idBoleta) 
            VALUES ('$nombreProducto', '$cantidad', '$precio',' $total','$mesa','$ambiente', '$idUsuario')";
            $query = mysqli_query($con,$sql);
        }

        
        // $this->desconectar();

        // if($query){
        //     echo "SE INSERTO detallesBoleta !!";
        // }
        // else{
        //     echo "NO SE INSERTO detallesBoleta !!";

        // }
        // die();
    }


    public function obtenerDatos(){
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        // $con = conexion::getConexion();

        // Obtener los detalles de Mesa de detallesBoleta
        $sql = "SELECT mesa, ambiente, descripcion, cantidad, precio, total
        FROM detallesboleta WHERE mesa = '1' AND ambiente = '1'";

        $query = mysqli_query($con, $sql);
        $detallesBoleta = array(); // Crea la variable $detallesBoleta y se le asigna un array vacío

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $detallesBoleta[] = $fila; // Añade el array $fila al final de $detallesBoleta
        }

        

        return $detallesBoleta;

    }

    public function obtenerDetallesBoleta($codigoBoleta){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "SELECT idBoleta
        FROM boletas 
        WHERE codigoBoleta = '$codigoBoleta'";

        $query = mysqli_query($con, $sql);

        $boleta = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $idBoleta = $boleta["idBoleta"];


        // echo "<pre>";
        // print_r($boleta);
        // print_r($idBoleta);
        // echo "</pre>";
        // die();




        $sql = "SELECT descripcion, cantidad, mesa, ambiente, precio, total, total
        FROM detallesboleta 
        WHERE idBoleta = '$idBoleta'";

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
