<?php

include_once("../app/modelo/conexionSingleton.php");

// Heredamos la clase conexion
class entidadUsuario{
    
    //---------------------------------------------------------------------
    //Funciones de keneth
    public function validarUsuarioUnico($usuario){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        // Consulta
        $sql = "SELECT usuario
        FROM usuarios WHERE usuario = '$usuario'";

        $query = mysqli_query($con, $sql);
        
        $resultado = mysqli_num_rows($query);

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";

        // die();

        // $this->desconectar();
        
        // Si hay más de un registrado true
        if($resultado >= 1)
            return true;
        else
            return false;
    }

    public function insertarRegistro($usuario, $password, $privilegios){

        // echo "<pre>";
        // var_dump($usuario, $password, $privilegios);
        // echo "</pre>";
        // die();

        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        // ---- Registrar usuario
        $sql="INSERT INTO usuarios (usuario, password, estado)
        VALUES('$usuario','$password', 1)";
        
        $query= mysqli_query($con,$sql);


        // ---- Registrar privilegios 
        // Obtenemos el id del usuario registrado
        $sql = "SELECT idUsuario
        FROM usuarios WHERE usuario = '$usuario'";

        $query = mysqli_query($con, $sql);
        $resultado = array(); // Crea la variable $filas y se le asigna un array vacío
        // (Si la consulta no devuelve ningún resultado, la función por lo menos va a retornar un array vacío)

        $resultado = mysqli_fetch_array($query, MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        // die();

        $idUsuario = $resultado["idUsuario"];

        
        // Insertamos los privilegios

        foreach ($privilegios as $i => $valor) {
            $idprivilegio = $i+1;

            $sql="INSERT INTO usuario_privilegio (idUsuario, idPrivilegio)
            VALUES('$idUsuario','$idprivilegio')";
            $query= mysqli_query($con,$sql);

        }


        // $this->desconectar();

        return $query;
    }

    
    //---------------------------------------------------------------------
    //Funciones de Joel
    public function verificarPassword($usuario, $oldpass){
        
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
      
        $sql = "SELECT usuario FROM usuarios WHERE usuario = '$usuario' && password = '$oldpass'";
        
        $query = mysqli_query($con, $sql);
        
        $resultado = mysqli_num_rows($query);

        // $this->desconectar();
        
        if($resultado == 1)
            return true;
        else
            return false;
    }


    public function actualizarPassword($usuario, $newpass){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 

        $sql="UPDATE `usuarios` SET `password` ='$newpass' WHERE usuario='$usuario'";
        $query= mysqli_query($con,$sql);
        
        // $this->desconectar();

        return $query;

    }

    //---------------------------------------------------------------------
    //Funciones de Angel
    public function validarLogin($usuario){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        // Consulta
        $sql = "SELECT usuario
        FROM usuarios WHERE usuario = '$usuario'";

        $query = mysqli_query($con, $sql);
        
        $resultado = mysqli_num_rows($query);

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        // die();

        // $this->desconectar();
        

        if($resultado >= 1)
            return true;
        else
            return false;
    }


    public function validarPasswordUsuario($usuario, $password){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        // Consulta
        $sql = "SELECT usuario
        FROM usuarios WHERE usuario = '$usuario'&& password = '$password'";
        

        $query = mysqli_query($con, $sql);
        
        $resultado = mysqli_num_rows($query);

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        // die();

        // $this->desconectar();
        

        if($resultado == 1)
            return true;
        else
            return false;
    }

    public function validarEstadoUsuario($usuario){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        // Consulta
        $sql = "SELECT estado
        FROM usuarios WHERE usuario = '$usuario' AND estado = '1'";
        

        $query = mysqli_query($con, $sql);
        $resultado = mysqli_num_rows($query);

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";
        // die();
        // $this->desconectar();
        

        if($resultado == 1)
            return true;
        else
            return false;
    }



    //--------------------------------------------------
    //Nuevas funciones JOEL

    public function validarUsuariosAll($usuario){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        $sql = "SELECT idUsuario, usuario FROM usuarios WHERE usuario LIKE '%$usuario%'";

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

    public function obtenerDatosUsuario($user){
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        $sql = "SELECT * FROM usuarios WHERE usuario LIKE '$user'";

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

    public function validarIdUnico($id, $usuario){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
            
        // Consulta
        $sql = "SELECT * FROM usuarios WHERE idUsuario != $id AND usuario = '$usuario'";

        $query = mysqli_query($con, $sql);
        
        $resultado = mysqli_num_rows($query);

        // echo "<pre>";
        // var_dump($resultado);
        // echo "</pre>";

        // die();

        // $this->desconectar();
        
        // Si hay más de un registrado true
        if($resultado >= 1)
            return true;
        else
            return false;
    }

    public function actualizarDatos($id, $usuario, $password, $estado, $privilegio){
        // Usamos el método "conectar" de conexion
        // $con = $this->conectar();
        $connection = conexionSingleton::getInstance();
        $con = $connection->getConnection(); 
        // $con = conexion::getConexion();

        // ---- Actualizar usuario
        $sql="UPDATE usuarios SET usuario = '$usuario', password = '$password', estado = '$estado' WHERE usuarios.idUsuario = $id";
        $query= mysqli_query($con,$sql);

        // // ---- Eliminar Privilegios Previos
        $sql2="DELETE FROM usuario_privilegio WHERE usuario_privilegio.idUsuario = $id";
        $query= mysqli_query($con,$sql2);
        
        // Insertamos los privilegios

        foreach ($privilegio as $i => $valor) {
            $idprivilegio = $i+1;

            $sql="INSERT INTO usuario_privilegio (idUsuario, idPrivilegio)
            VALUES('$id','$idprivilegio')";
            $query= mysqli_query($con,$sql);

        }


        // $this->desconectar();

        return $query;
    }

}
