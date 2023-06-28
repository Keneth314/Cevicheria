<?php

include_once("../app/modelo/conexionSingleton.php");
class entidadPedido{

    public function estadoMesas(){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $resultado_final = array();

        for ($i = 1; $i <= 3 ; $i++) { 
            for ($j = 1; $j <= 3 ; $j++) { 

                $sql = "SELECT descripcion AS name_pedido, mesa, ambiente
                FROM pedidos 
                WHERE mesa = '$i' AND ambiente = '$j'
                LIMIT 1";

                $query = mysqli_query($con, $sql);
                $resultados = array(); // Crea la variable $resultados y se le asigna un array vacío

                while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    $resultados[] = $fila; // Añade el array $fila al final de $resultados
                }
                array_push($resultado_final, $resultados);
            }

        }

        // echo "<pre>";
        // print_r($resultado_final);
        // echo "</pre>";
        // die();
        
        // $this->desconectar();

        return $resultado_final;



    }

    public function obtenerDetallesMesa($mesa, $ambiente){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "SELECT descripcion, cantidad, precio, total
        FROM pedidos 
        WHERE mesa = '$mesa' AND ambiente = '$ambiente'";

        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $resultados y se le asigna un array vacío

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $resultados
        }

        // $this->desconectar();

        return $resultados;
    } 

    public function insertarDatos($nombreProducto, $mesa, $ambiente, $cantidad){

        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        // $con = conexion::getConexion();

        $sql = "SELECT precio
        FROM productos WHERE descripcion = '$nombreProducto' AND estado = 1 LIMIT 1";
        $query= mysqli_query($con,$sql);

        $producto = array();
        $producto = mysqli_fetch_array($query, MYSQLI_ASSOC);
        $precio = $producto["precio"];
        // $cantidad = $producto["cantidad"];
        $total = (int)$cantidad * (float)$precio;

        // echo "<pre>";
        // print_r($producto);
        // echo "</pre>";
        // die();
        
        $sql="INSERT INTO pedidos (descripcion, cantidad, precio, total, mesa, ambiente) 
        VALUES ('$nombreProducto', '$cantidad', '$precio',' $total','$mesa','$ambiente')";
        $query = mysqli_query($con,$sql);
        
        // $this->desconectar();

        // echo "SE INSERTO!!";
        // die();
    }

    public function eliminarDatos($nombreProducto, $mesa, $ambiente, $cantidad){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
                
        $sql = "DELETE FROM pedidos  
        WHERE descripcion = '$nombreProducto' AND cantidad = '$cantidad' AND mesa = '$mesa' AND ambiente = '$ambiente' ";
        $query = mysqli_query($con,$sql);
        // $this->desconectar();
    }

    public function eliminarRegistros($mesa, $ambiente){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        
        $sql = "DELETE FROM pedidos  
        WHERE mesa = '$mesa' AND ambiente = '$ambiente' ";
        $query = mysqli_query($con,$sql);
        // $this->desconectar();
        // echo "FELICITACIONES, SE ELIMINO!!!!";
        // die();
    }


    
}
