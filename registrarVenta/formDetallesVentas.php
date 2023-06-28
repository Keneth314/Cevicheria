<?php

include_once("../shared/navbar.php");
class formDetallesVentas extends navbar{

    public function formDetallesVentasShow($detallesVenta, $mesa, $ambiente){
        $this->navbarShow();
        $montoTotal = 0;
        for ($i = 0; $i < count($detallesVenta); $i++) {
            $montoTotal += $detallesVenta[$i]["total"];
        }
        // echo "<pre>";
        // print_r($detallesVenta);
        // var_dump($mesa, $ambiente);
        // echo "</pre>";
?>
    <?php

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles de la venta</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="random.css?v=<?php echo (rand()); ?>" />
    </head>

    <body>

        <div class="container container-main col-md-12">
            <h1 class="titulo">Mesa <?= $mesa?> - Ambiente <?= $ambiente?></h1>
            <div class="row">
                

                <form action="getDetallesVentas.php?mesa=<?= $mesa?>&ambiente=<?= $ambiente?>&montoTotal=<?= $montoTotal?>" class="row" method="POST">
                    <div class="col-md-8">
                        <table class="table table-dark table-hover table-striped table-bordered">
                            <thead class="align-middle">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < count($detallesVenta); $i++) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= ($i + 1) ?></th>
                                            <td><?= $detallesVenta[$i]["descripcion"] ?></td>
                                            <td><?= $detallesVenta[$i]["cantidad"] ?></td>
                                            <td><?= $detallesVenta[$i]["precio"] ?></td>
                                            <td><?= $detallesVenta[$i]["total"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                
                                <tr>
                                    <td colspan="4">Monto Total</td>
                                    <td><?= $montoTotal?></td>
                                </tr>
                            </tbody>
    
    
                        </table>
                    </div>
    
                    <div class="col-md">
                        <table class="table table-dark table-hover table-striped table-bordered">
                            <thead class="align-middle">
                                <tr>
                                    <th scope="col"></th>
                                    <!-- <th scope="col">Monto</th> -->
                                    <th scope="col">Código de pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Efectivo</th>
                                    <!-- <td><?= $montoTotal?></td> -->
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Yape</th>
                                    <!-- <td><?= $montoTotal?></td> -->
                                    <td>
                                        <div class="mb-2">
                                            <input type="number" class="form-control input-codigo" name="codigoYape" placeholder="912345678">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tarjeta</th>
                                    <!-- <td><?= $montoTotal?></td> -->
                                    <td>
                                        <!-- <div class="form-floating mb-0 col-md  name-input" style="color: #212529;">
                                            <input type="text" class="form-control input-container" id="cliente" placeholder="cliente" name="cliente">
                                            <label for="cliente">Código</label>
                                        </div> -->
                                        <div class="mb-2">
                                            <input type="number" class="form-control input-codigo" name="codigoTarjeta" placeholder="00123456789876">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
    
    
                        </table>
                    </div>
                    <div class="container-button col-md-8">
                        <div class="form-floating mb-1 col-md-6  name-input">
                            <input type="text" class="form-control input-container" id="cliente" placeholder="cliente" name="nombreCliente">  
                            <label for="cliente">Nombre del cliente</label>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-info btnForm btnCobrar" style="color:white" name="btnCobrar" value="Cobrar"></input>
                        </div>
                    </div>
                </form>



            </div>


        </div>

    </body>

</html>

<?php
    }
}
?>