<?php

class controlAdministrarProductos{

    public function obtenerRegistroProductos(){
        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos = $objProducto->obtenerRegistro();


        include_once("../administrarProductos/formAdministrarProductos.php");
        $objtAdministrar = new formAdministrarProductos;
        $objtAdministrar->formAdministrarProductosShow($productos);
    }

    public function registrarProductos($nombre, $precio, $estado){
        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $objProducto->registrarDatos($nombre, $precio, $estado);

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos = $objProducto->obtenerRegistro();

        include_once("../administrarProductos/formAdministrarProductos.php");
        $objtAdministrar = new formAdministrarProductos;
        $objtAdministrar->formAdministrarProductosShow($productos);
    }
    
    public function eliminarProducto($nombreProducto){
        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $objProducto->eliminarDato($nombreProducto);

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos = $objProducto->obtenerRegistro();

        include_once("../administrarProductos/formAdministrarProductos.php");
        $objtAdministrar = new formAdministrarProductos;
        $objtAdministrar->formAdministrarProductosShow($productos);
    }

    public function editarProducto($nombreProducto, $precio, $estado){
        // echo "<pre>";
        // print_r($_GET);
        // echo "</pre>";
        // die(); 
        include_once("formEditarProducto.php");
        $objtFormEditar = new formEditarProducto;
        $objtFormEditar->formEditarProductoShow($nombreProducto, $precio, $estado);

    }

    public function actualizarProducto($nombre, $precio, $estado, $antiguo_nombre){
        // echo "<pre>";
        // echo "actualizar producto<br>";
        // var_dump($nombre, $precio, $estado);
        // echo "</pre>";
        // die(); 

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $objProducto->actualizarDato($nombre, $precio, $estado, $antiguo_nombre);

        include_once("../app/modelo/entidaProducto.php");
        $objProducto = new entidadProducto;
        $productos = $objProducto->obtenerRegistro();

        include_once("../administrarProductos/formAdministrarProductos.php");
        $objtAdministrar = new formAdministrarProductos;
        $objtAdministrar->formAdministrarProductosShow($productos);

    }


}
