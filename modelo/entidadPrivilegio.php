<?php

include_once("../app/modelo/conexionSingleton.php");

// Heredamos la clase conexion
class entidadPrivilegio{


    public function obtenerAllPrivilegios(){

        // Usamos el método "conectar" de conexion
        // $con = conexion::getConexion();
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        // Consulta
        $sql = "SELECT nombrePrivilegios AS privilegio
        FROM privilegios";


        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $resultados y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $resultados
        }
        
        // $this->desconectar();

        // echo "<pre>";
        // print_r($resultados);
        // echo "</pre>";

        // die();

        if($query){
            return $resultados;
        }

        // $resultados = ["Privilegio A", "Privilegio B", "Privilegio C", "Privilegio D", "Privilegio F", "Privilegio G", "Privilegio H", "Privilegio ijuepta"];

        // return $resultados;
    }

    //---------------------------------------------------------------------
    //Funciones de Angel

    
    
}
