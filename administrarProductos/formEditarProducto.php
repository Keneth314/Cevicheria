<?php
include_once("../shared/navbar.php");
class formEditarProducto extends navbar{

    public function formEditarProductoShow($nombreProducto, $precio, $estado){
        $this->navbarShow();

        // echo "<pre>";
        // var_dump($nombreProducto, $precio, $estado);
        // echo "</pre>";
        // die(); 
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Editar Producto</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="administrarProductos.css?v=<?php echo(rand()); ?>" />
    </head>

    <body>

        <div class="col-md-5 container-form">

            <h1 class="titulo">Editar Producto</h1>

            <form action="getEditarProducto.php?antiguo_nombre=<?= $nombreProducto?>" method="POST" class="row g-2">

                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control input-container" id="nombre" placeholder="nombre" name="nombre" value="<?= $nombreProducto?>">
                    <label for="nombre">Nombre: <?= $nombreProducto?></label>
                </div>

                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <div class="form-floating mb-3">
                    <input type="number" class="form-control input-container" id="precio" placeholder="precio" name="precio" value="<?= $precio?>">
                    <label for="precio">Precio: <?= $precio?></label>
                </div>
                <div>

                    <?php if($estado == '1'): ?>
                        <input type="radio" name="estado" id="activado" class="radio-button" value="1" checked>
                        <label for="activado">Activado</label>
                    <?php else: ?>
                        <input type="radio" name="estado" id="activado" class="radio-button" value="1">
                        <label for="activado" >Activado</label>
                    <?php endif; ?>

                    <?php if($estado == '0'): ?>
                        <input type="radio" name="estado" id="desactivado" class="radio-button" value="0" checked>
                        <label for="desactivado">Desactivado</label>
                    <?php else: ?>
                        <input type="radio" name="estado" id="desactivado" class="radio-button" value="0">
                        <label for="desactivado">Desactivado</label>
                    <?php endif; ?>

                </div>


                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary btnEnviar" name="btnActualizar" value="Actualizar">
                </div>

            </form>
        </div>

    </body>

    </html>



<?php
    }
}

?>