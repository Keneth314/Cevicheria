<?php
include_once("../shared/navbar.php");
class formDatosClientes extends navbar{
    public function formDatosClientesShow($fechaDeReserva, $hora, $ambiente, $mesa, $estimado){
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

                <h1 class="titulo">Reservar Mesa</h1>
                <h2 class="subtitulo">Datos cliente</h2>

                <p>Fecha de reserva: <b><?= $fechaDeReserva?></b></p>
                <p>Hora de reserva: <b><?= $hora?></b></p>
                <p>Ambiente: <b><?= $ambiente?></b></p>
                <p>Cantidad mesas: <b><?= $mesa?></b></p>
                <p>Monto estimado: <b>S/<?= $estimado?></b></p>

                <form action="getDatosCliente.php?fechaDeReserva=<?=$fechaDeReserva?>&hora=<?=$hora?>&ambiente=<?=$ambiente?>&mesa=<?=$mesa?>&estimado=<?=$estimado?>" method="POST">

                    <!-- <div class="form-floating mb-3 col-md-6"> -->
                    
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control size-form" id="nombre" placeholder="nombre" name="nombre">
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control size-form" id="dni" placeholder="dni" name="dni">
                        <label for="dni">DNI</label>
                    </div>
                    
                    <!-- <div class="form-floating mb-3">
                        <input type="number" class="form-control size-form" id="monto" placeholder="monto" name="monto">
                        <label for="monto">Monto</label>
                    </div> -->

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btnEnviar" name="btnReservar" value="Reservar">
                    </div>
                </form>
            </div>

            <link rel="stylesheet" href="../reservarMesa/reservarMesa.css?v=<?php echo(rand()); ?>" />
        </body>

        </html>

<?php
    }
}

?>