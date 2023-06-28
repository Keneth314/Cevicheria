<?php
include_once("../shared/navbar.php");
class  formDetalleRegistro extends navbar{
    public function formDetalleRegistroShow($datos, $pedido, $tipo, $fechaIni, $fechaFin){
        $this->navbarShow();
            // echo "<pre>";
            // print_r($datos);
            // print_r($pedido);
            // echo "</pre>";
            // die();
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <title>Emitir reporte ingresos</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        </head>

        <body>
            <div class="col-md-5 container-form">

                <h1 class="titulo">Reporte ingreso</h1>
                
                <h2 class="subtitulo">
                    <?php if ($tipo == 1){ ?>
                        Boleta Venta
                    <?php } ?>
                    
                    <?php if  ($tipo == 0){ ?>
                        Boleta Reserva
                    <?php }?>
                </h2>

                <!-- ----------------------------------------------------- -->
                <!-- formulario para reporte de reservas -->
                <?php if ($tipo == 0){ ?>
                <p>Cliente: <b><?= $datos[0]["nombre"]?></b></p>
                <p>DNI: <b><?= $datos[0]["dni"]?></b></p>
                <p>Fecha de la reserva: <b><?=$datos[0]["fechaReservada"]?></b></p>
                <p>Fecha reserva deseada: <b><?=$datos[0]["fechaDeReserva"]?></b></p>
                <p>Horario de reserva: <b><?= $datos[0]["hora"]?></b></p>
                <p>Ambiente: <b><?= $datos[0]["ambiente"]?></b></p>
                <p>Cantidad mesas: <b><?= $datos[0]["cantMesas"]?></b></p>
                <p>Monto total: <b>S/<?= $datos[0]["monto"]?></b></p>
                <?php } ?>
                
                <!-- ------------------------------------------------ -->
                <!-- formulario para reporte de ventas -->
                <?php if ($tipo == 1){ ?>
                <p>Codigo de boleta: <b><?= $datos[0]["codigoBoleta"]?></b></p>
                <p>Cliente: <b><?= $datos[0]["cliente"]?></b></p>
                <p>Fecha de emision: <b><?=$datos[0]["fechaEmision"]?></b></p>
                <p>Monto total: <b>S/<?= $datos[0]["montoTotal"]?></b></p>
                <p>Codigo de Pago: <b><?= $datos[0]["codigoPago"]?></b></p>
                <p>Mesa: <b><?=$pedido[0]["mesa"]?></b></p>
                <p>Ambiente: <b><?= $pedido[0]["ambiente"]?></b></p>

                <div class="">
                <table class="table table-dark table-hover table-striped table-bordered">
                    <thead class="align-middle">
                        <tr> 
                            <th scope="col">#</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i < count($pedido); $i++) { 
                        ?>
                            <tr>
                                <th scope="row"><?=($i+1)?></th>
                                <td><?= $pedido[$i]["descripcion"]?></td>
                                <td><?= $pedido[$i]["cantidad"]?></td>
                                <td><?= $pedido[$i]["precio"]?></td>
                                <td><?= $pedido[$i]["total"]?></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                </div>

                <?php } ?>

                <div>
                <a href="../emitirReporteIngresos/getBuscarRegistro.php?btnRegresar=true&tipo=<?=$tipo?>&fechaIni=<?=$fechaIni?>&fechaFin=<?=$fechaFin?>" style="color:white" class="btn btn-info btnForm">Ir reporte general</a>
                </div>
            </div>

            <link rel="stylesheet" href="../reservarMesa/reservarMesa.css?v=<?php echo(rand()); ?>" />
        </body>

        </html>

<?php
    }
}

?>