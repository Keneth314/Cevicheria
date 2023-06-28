<?php

include_once("../shared/navbar.php");
class formDescargarBoleta extends navbar{

    public function formDescargarBoletaShow($datosCliente, $detallesBoleta, $codigoBoleta){
        $this->navbarShow();
        // $montoTotal = 0;
        // for ($i = 0; $i < count($datosCliente); $i++) {
        //     $montoTotal += $datosCliente[$i]["total"];
        // }
        // echo "<pre>";
        // print_r($datosCliente);
        // print_r($detallesBoleta);
        // echo "</pre>";
        // die();
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

        <div class="container container-main col-md-6">
            <h1 class="titulo">Boleta</h1>
            <div class="row">
                

                <form action="getDescargarBoleta.php?codigoBoleta=<?= $codigoBoleta?>" class="row" method="POST">
                
                    <div class="col-md-11 centrar">
                        <!-- <h2 class="titulo" style="font-size: 20px ">Informacion del cliente: </h2> -->

                        <p>Cliente: <b><?= $datosCliente[0]["cliente"]?></b></p>
                        <p>Mesa: <b><?= $detallesBoleta[0]["mesa"]?></b></p>
                        <p>Ambiente: <b><?= $detallesBoleta[0]["ambiente"]?></b></p>
                        <p>Código de pago: <b><?= $datosCliente[0]["codigoPago"]?></b></p>
                        <p>Código boleta: <b><?= $datosCliente[0]["codigoBoleta"]?></b></p>
                        <p>Monto total: <b>S/<?= $datosCliente[0]["montoTotal"]?></b></p>
                        <p>Fecha de emisión: <b><?= $datosCliente[0]["fechaEmision"]?></b></p>
                
                    </div>
                    <div class="col-md-11 centrar">
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
                                for ($i = 0; $i < count($detallesBoleta); $i++) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?= ($i + 1) ?></th>
                                            <td><?= $detallesBoleta[$i]["descripcion"] ?></td>
                                            <td><?= $detallesBoleta[$i]["cantidad"] ?></td>
                                            <td><?= $detallesBoleta[$i]["precio"] ?></td>
                                            <td><?= $detallesBoleta[$i]["total"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                
                                <tr>
                                    <td colspan="4">Monto Total</td>
                                    <td><?= $datosCliente[0]["montoTotal"]?></td>
                                </tr>
                            </tbody>
    
    
                        </table>
                    </div>
    
            
                    <div class="container-button col-md-8 centrar">
                        <div>
                            <input type="submit" class="btn btn-info btnForm btnCobrar" style="color:white" name="btnDescargar" value="Descargar"></input>
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