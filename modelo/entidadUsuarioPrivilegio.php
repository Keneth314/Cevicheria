<?php

include_once("../app/modelo/conexionSingleton.php");

// Heredamos la clase conexion
class entidadUsuarioPrivilegio{


    public function obtenerPrivilegiosUsuario($usuario){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql = "SELECT P.nombrePrivilegios AS privilegio FROM usuarios U, privilegios P, usuario_privilegio UP WHERE
         U.usuario = '$usuario' AND U.idUsuario = UP.idUsuario AND P.idPrivilegio = UP.idPrivilegio";
        
        $query = mysqli_query($con, $sql);
        $resultados = array(); // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        while ($fila=mysqli_fetch_array($query, MYSQLI_ASSOC)) {

            $resultados[] = $fila; // Añade el array $fila al final de $filas
        }
        
        // $this->desconectar();


        // echo "<pre>";
        // var_dump($resultados);
        // echo "</pre>";
        // echo "Privilegios";
        // die();

        // die();

        if($query){
            return $resultados;
        }
    }

}
