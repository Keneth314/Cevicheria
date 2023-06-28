<?php

class controlObtenerProductos{

    public function obtenerEstadoMesas(){

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $estadoMesas = $objPedido->estadoMesas();
        // echo "<pre>";
        // print_r($estadoMesas);
        // echo "</pre>";
        // die();

        include_once("../obtenerListaProductos/formMesas.php");
        $objtMesas = new formMesas;
        $objtMesas->formMesasShow($estadoMesas);
    }

    public function obtenerDetallesYMesa($mesa, $ambiente){
        // echo "<pre>";
        // var_dump($mesa, $ambiente);
        // echo "</pre>";
        // die();  

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $detallesMesas =  $objPedido->obtenerDetallesMesa($mesa, $ambiente);

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos =  $objProducto->obtenerProductos();

        include_once("formDetallesMesas.php");
        $objDetallesMesa = new formDetallesMesas;
        $objDetallesMesa->formDetallesMesasShow($detallesMesas, $productos, $mesa, $ambiente);

       

    }
    
    public function insertarProducto($nombreProducto, $mesa, $ambiente, $cantidad){

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $objPedido->insertarDatos($nombreProducto, $mesa, $ambiente, $cantidad);

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $detallesMesas =  $objPedido->obtenerDetallesMesa($mesa, $ambiente);

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos =  $objProducto->obtenerProductos();

        include_once("formDetallesMesas.php");
        $objDetallesMesa = new formDetallesMesas;
        $objDetallesMesa->formDetallesMesasShow($detallesMesas, $productos, $mesa, $ambiente);

    }

    public function eliminarProducto($nombreProducto, $mesa, $ambiente, $cantidad){

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $objPedido->eliminarDatos($nombreProducto, $mesa, $ambiente, $cantidad);

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $detallesMesas =  $objPedido->obtenerDetallesMesa($mesa, $ambiente);

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos =  $objProducto->obtenerProductos();

        include_once("formDetallesMesas.php");
        $objDetallesMesa = new formDetallesMesas;
        $objDetallesMesa->formDetallesMesasShow($detallesMesas, $productos, $mesa, $ambiente);
    }

    public function insertarProforma($mesa, $ambiente){

        include_once("../app/modelo/entidadProforma.php");
        $objtProforma = new entidadProforma;
        $objtProforma->insertarPedidosAProforma($mesa, $ambiente);

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $objPedido->eliminarRegistros($mesa, $ambiente);

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $detallesMesas =  $objPedido->obtenerDetallesMesa($mesa, $ambiente);

        // echo "<pre>";
        // print_r($detallesMesas);
        // echo "</pre>";
        // die();

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos =  $objProducto->obtenerProductos();

        include_once("formDetallesMesas.php");
        $objDetallesMesa = new formDetallesMesas;
        $objDetallesMesa->formDetallesMesasShow($detallesMesas, $productos, $mesa, $ambiente);
    } 

    public function eliminarRegistrosPedidos($mesa, $ambiente){

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $objPedido->eliminarRegistros($mesa, $ambiente);

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $detallesMesas =  $objPedido->obtenerDetallesMesa($mesa, $ambiente);

        // echo "<pre>";
        // print_r($detallesMesas);
        // echo "</pre>";
        // die();

        include_once("../app/modelo/entidadPedido.php");
        $objPedido = new entidadPedido;
        $estadoMesas = $objPedido->estadoMesas();
        // echo "<pre>";
        // print_r($estadoMesas);
        // echo "</pre>";
        // die();

        include_once("../obtenerListaProductos/formMesas.php");
        $objtMesas = new formMesas;
        $objtMesas->formMesasShow($estadoMesas);
        
    } 



}
