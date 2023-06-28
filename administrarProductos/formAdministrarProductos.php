<?php
include_once("../shared/navbar.php");
class formAdministrarProductos extends navbar{

    public function formAdministrarProductosShow($registroProductos){
        $this->navbarShow();
        // echo "<pre>";
        // echo "Dsadasd";
        // print_r($registroProductos);
        // echo "</pre>";
        // die();
?>

        <!DOCTYPE html>
        <html lang="es">

        <head>
            <title>Editar Usuario</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <link rel="stylesheet" href="../administrarProductos/administrarProductos.css?v=<?php echo (rand()); ?>" />
        </head>

        <body>
            <div class="col-md-9 container-form row">

                <div class="col-md-5">
                    <h2 class="titulo">Insertar Producto</h2>

                    <form action="../administrarProductos/getAdministrarProductos.php" method="POST">

                        <!-- <div class="form-floating mb-3 col-md-6"> -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control input-container" id="nombre" placeholder="nombre" name="nombre">
                            <label for="nombre">Nombre</label>
                        </div>

                        <!-- <div class="form-floating mb-3 col-md-6"> -->
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control input-container" id="precio" placeholder="precio" name="precio">
                            <label for="precio">Precio</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="1" name="estado" value="1">
                            <label class="form-check-label" for="1">Activado</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="0" name="estado" value="0">
                            <label class="form-check-label" for="0">Desactivado</label>
                        </div>
                        <div class="d-grid gap-2">
                            <input type="submit" class="btn btn-primary btnEnviar" name="btnRegistrar" value="Registrar">
                        </div>

                    </form>
                </div>

                <div class="col-md-7">

                    <table class="table table-dark table-hover table-striped table-bordered">
                        <thead class="align-middle">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Estado</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $usuarios = array();

                            for ($i = 0; $i < count($registroProductos); $i++) {
                            ?>
                                <tr>
                                    <th scope="row"><?= ($i + 1) ?></th>
                                    <td><?= $registroProductos[$i]["descripcion"]?></td>
                                    <td><?= $registroProductos[$i]["precio"]?></td>
                                    <td><?= $registroProductos[$i]["estado"]?></td>
                                    <td><a href="../administrarProductos/getAdministrarProductos.php?btnEditar=true&nombre=<?= $registroProductos[$i]["descripcion"]?>&precio=<?= $registroProductos[$i]["precio"]?>&estado=<?= $registroProductos[$i]["estado"]?>" 
                                    class="btn btn-primary">Editar</a></td>

                                    <td><a href="../administrarProductos/getAdministrarProductos.php?btnEliminar=true&nombre=<?= $registroProductos[$i]["descripcion"]?>" 
                                    class="btn btn-primary">Eliminar</a></td>
                                    
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </body>

        </html>



<?php
    }
}

?>