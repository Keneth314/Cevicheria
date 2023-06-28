<?php

include_once("../shared/navbar.php");
class formDetallesMesas extends navbar{

    public function formDetallesMesasShow($detallesMesas, $productos, $mesa, $ambiente){
        $this->navbarShow();
    
        // echo "<pre>";
        // print_r($productos);
        // echo "</pre>";
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles de la Mesa</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="obtenerListaProductos.css?v=<?php echo (rand()); ?>" />
    </head>

    <body>

        <div class="container container-main col-md-12">
            <h1 class="titulo">Mesa <?= $mesa?> - Ambiente <?= $ambiente?></h1>
            <div class="row">

                <div class="col-md-8">
                    <table class="table table-dark table-hover table-striped table-bordered">
                        <thead class="align-middle">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // $reservas = array();
                                $montoTotal = 0;
                            for ($i = 0; $i < count($detallesMesas); $i++) {
                                ?>
                                    <tr>
                                        <th scope="row"><?= ($i + 1) ?></th>
                                        <td><?= $detallesMesas[$i]["descripcion"] ?></td>
                                        <td><?= $detallesMesas[$i]["cantidad"] ?></td>
                                        <td><?= $detallesMesas[$i]["precio"] ?></td>
                                        <td><?= $detallesMesas[$i]["cantidad"]*$detallesMesas[$i]["precio"] ?></td>
                                        <td><a 
                                        href="getFormDetalles.php?descripcion=<?= $detallesMesas[$i]["descripcion"]?>&cantidad=<?= $detallesMesas[$i]["cantidad"]?>&btnEliminar=true&mesa=<?= $mesa?>&ambiente=<?= $ambiente?>"
                                        class="btn btn-primary">Eliminar</a></td>
                                    </tr>
                                <?php
                                $montoTotal += $detallesMesas[$i]["total"];
                            }
                                ?>
                            <!-- <tr>
                                <td>3</td>
                                <td>dsd</td>
                                <td>2</td>
                                <td>32</td>
                                <td>64</td>
                                <td><a href="#" class="btn btn-primary">Eliminar</a></td>
                            </tr> -->
                            <tr>
                                <td colspan="4" style="height: 30px;">Monto total</td>
                                <td><?= $montoTotal?></td>
                                <td></td>
                            </tr>
                        </tbody>


                    </table>

                    <div class="container-button">
                        <a href="getFormDetalles.php?mesa=<?= $mesa?>&ambiente=<?= $ambiente?>&btnRegistrar=true" style="color:white" class="btn btn-info btnForm">Registrar</a>
                        <a href="getFormDetalles.php?mesa=<?= $mesa?>&ambiente=<?= $ambiente?>&btnCancelar=true" style="color:white" class="btn btn-info btnForm">Cancelar</a>
                    </div>
                </div>

                <div class="col-md-4">
                    <form action="getFormDetalles.php" method="POST">

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control input-container" id="cantidad" placeholder="cantidad" name="cantidad">
                            <label for="usuario">Cantidad</label>
                        </div>
                        <input type="number" name="mesa" value="<?= $mesa?>" hidden>
                        <input type="number" name="ambiente" value="<?= $ambiente?>" hidden>
                        <table class="table table-borderless">
                            <tbody>
                                <tr class="container-td">
                                <?php
                                
                                    for ($i = 0; $i < count($productos) ; $i++) { 
                                ?>
                                    
                                    <td class="td-boton">
                                        <button class="btn btn-primary btnProducto" name="btnProducto" value="<?= $productos[$i]["descripcion"]?>">
                                            <?= $productos[$i]["descripcion"]?>
                                        </button>
                                    </td>
                                <?php
                                    }
                                ?>
                                </tr>
                                
                            </tbody>
                        </table>
                    </form>
                    
                </div>

            </div>


        </div>

    </body>

    </html>
<?php
    }

}   

?>

