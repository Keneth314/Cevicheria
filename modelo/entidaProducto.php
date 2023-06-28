<?php

include_once("../app/modelo/conexionSingleton.php");

class entidadProducto{
    // Funciones de Keneth
    public function obtenerProductos(){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 


        $sql = "SELECT descripcion
        FROM productos WHERE estado = 1";

        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $resultados y se le asigna un array vacío

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $resultados
        }

        // $this->desconectar();

        return $resultados;
    } 

    // Funciones de Angel
    public function obtenerRegistro(){

        //   echo "<pre>";
        // echo "ENTRO!!";
        // echo "</pre>";
        // die();

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 


        $sql = "SELECT descripcion, precio, estado
        FROM productos";

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

    public function registrarDatos($nombre, $precio, $estado){
    
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql="INSERT INTO productos (descripcion, precio, estado) 
        VALUES ('$nombre', '$precio', '$estado')";
        $query = mysqli_query($con,$sql);
        
        // $this->desconectar();
    }

    public function eliminarDato($nombreProducto){
    
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 


        $sql = "UPDATE productos
        SET estado = '0' WHERE descripcion = '$nombreProducto'";
        
        $query= mysqli_query($con,$sql);
        
        // $this->desconectar();
    }

    public function actualizarDato($nombreProducto, $precio, $estado, $antiguo_nombre){
        // echo "<pre>";
        // echo "actualizar producto<br>";
        // var_dump($nombreProducto, $precio, $estado);
        // echo "</pre>";
        // die(); 
    
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 


        $sql = "UPDATE productos
        SET descripcion = '$nombreProducto', precio = '$precio', estado = '$estado'
        WHERE descripcion = '$antiguo_nombre'";

        $query= mysqli_query($con,$sql);

        // $this->desconectar();
    }



}
