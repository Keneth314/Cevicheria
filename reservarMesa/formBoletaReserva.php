<?php
include_once("../shared/navbar.php");
class formBoletaReserva extends navbar{
    public function formBoletaReservaShow($fechaDeReserva, $hora, $ambiente, $mesa, $nombre, $dni, $monto){
        $this->navbarShow();
        
?>
        <!DOCTYPE html>
        <html lang="es">

        <head>
            <title>Datos cliente</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        </head>

        <body>
            <div class="col-md-5 container-form">

                <h1 class="titulo">Boleta Reserva</h1>
                <h2 class="subtitulo">Informacion</h2>

                <p>Cliente: <b><?= $nombre?></b></p>
                <p>DNI: <b><?= $dni?></b></p>
                <p>Fecha de reserva: <b><?= $fechaDeReserva?></b></p>
                <p>Hora de reserva: <b><?= $hora?></b></p>
                <p>Ambiente: <b><?= $ambiente?></b></p>
                <p>Cantidad mesas: <b><?= $mesa?></b></p>
                <p>Monto total: <b>S/<?= $monto?></b></p>
                

                <div>
                <a href="../shared/formPrincipal.php?btnReservarMesa=true" style="color:white" class="btn btn-info btnForm">Ir al formulario</a>
                </div>
            </div>

            <link rel="stylesheet" href="../reservarMesa/reservarMesa.css?v=<?php echo(rand()); ?>" />
        </body>

        </html>

<?php
    }
}

?>