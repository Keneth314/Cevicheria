<?php
include_once("../shared/navbar.php");
class formReporteIngresos extends navbar{

    public function formReporteIngresosShow($validar,$tipo, $fechaIni, $fechaFin){
        $datos = array();
        $datos = $validar;
        $this->navbarShow();
        // echo "<pre>";
        // print_r($datos);
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
        <div class="col-md-10 container-form">

            <h1 class="titulo">Reporte de ingresos</h1>

            <div class="">
                <table class="table table-dark table-hover table-striped table-bordered">
                    <thead class="align-middle">
                        <tr> 
                            <th scope="col">#</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Monto</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Tipo ingreso</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i < count($validar); $i++) { 
                        ?>
                            <tr>
                                <th scope="row"><?=($i+1)?></th>
                                <td><?= $validar[$i]["cliente"]?></td>
                                <td><?= $validar[$i]["monto"]?></td>
                                <td><?= $validar[$i]["fecha"]?></td>
                                <td>
                                <?php if($tipo == "1") echo "Ventas"?>
                                <?php if($tipo == "0") echo "Reservas"?>
                                </td>
                                <td><a href="getReporteIngresos.php?btnDetalles=true&id=<?=$validar[$i]["id"]?>&tipo=<?=$tipo?>&fechaIni=<?=$fechaIni?>&fechaFin=<?=$fechaFin?>" class="btn btn-info">
                                <img src="../img/detalle.png" class="logo-img" alt="detalle">
                            </a></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <!-- <a href="../fpdf/hola.php?tipo=<?=$tipo?>&fechaIni=<?=$fechaIni?>&fechaFin=<?=$fechaFin?>" style="color:white" class="btn btn-info btnForm">Descargar</a> -->
                        <a href="../emitirReporteIngresos/getReporteIngresos.php?btnDescargar=true&tipo=<?=$tipo?>&fechaIni=<?=$fechaIni?>&fechaFin=<?=$fechaFin?>" style="color:white" class="btn btn-info btnForm">Descargar</a>
                    </div>
                </div>
                
            </div>

        </div>
        <link rel="stylesheet" href="../emitirReporteIngresos/emitirReporteIngresos.css?v=<?php echo(rand()); ?>" />

    </body>

    </html>

<?php
    }
}

?>