<?php
include_once("../shared/navbar.php");
class formValidarReserva extends navbar{

    public function formValidarReservaShow(){
        $this->navbarShow();
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Buscar reserva</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <div class="col-md-5 container-form">

            <h1 class="titulo">Buscar Reserva</h1>

            <form action="../validarReservaMesa/getValidarReserva.php" method="POST" class="row g-2">

                <div class="form-floating mb-3 col-md-4 centrar">
                    <input type="number" class="form-control input-container" id="dni" placeholder="dni" name="dni">
                    <label for="dni">DNI</label>
                </div>

                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary btnEnviar" name="btnBuscar" value="Buscar">
                </div>
            </form>
        </div>

        <link rel="stylesheet" href="../validarReservaMesa/validarReservaMesa.css?v=<?php echo(rand()); ?>" />
    </body>

    </html>

<?php
    }
}

?>