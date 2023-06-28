<?php
include_once("../shared/navbar.php");
class formBuscarRegistro extends navbar{

    public function formBuscarRegistroShow(){

    $this->navbarShow();
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
        <div class="background-container">
            <div class="col-md-5 container-form ">
                <h1 class="titulo">Reporte de Ingresos</h1>
                <h2 class="subtitulo">Buscar registro</h2>

                <form action="../emitirReporteIngresos/getBuscarRegistro.php" method="POST" class="row g-2">

                    <div class="form-floating mb-3">
                        <input type="date" class="form-control size-form" id="fechaIni" placeholder="fechaIni" name="fechaIni">
                        <label for="fechaIni">Fecha inicio</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control size-form" id="fechaFin" placeholder="fechaFin" name="fechaFin">
                        <label for="fechaFin">Fecha final</label>
                    </div>
                    <!-- Tipo de ingreso -->
                    <div class="row g-1 privilegio-container">
                        <span class="title-privilegios">Tipo de ingreso:</span>
                        
                        <div class="form-check col-md-6">
                            <input checked class="form-check-input" type="radio" name="tipo" id="tipo0" value="0">
                            <label class="form-check-label" for="tipo0">
                                Reservas
                            </label>
                        </div>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="radio" name="tipo" id="tipo1" value="1">
                            <label class="form-check-label" for="tipo1">
                                Ventas
                            </label>
                        </div>
                        
                    </div>

                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btnEnviar" name="btnBuscar" value="Buscar">
                    </div>

                    <link rel="stylesheet" href="../emitirReporteIngresos/emitirReporteIngresos.css?v=<?php echo(rand()); ?>" />

                </form>
            </div>
        </div>
        
    </body>

    </html>

<?php
    }
}
?>


