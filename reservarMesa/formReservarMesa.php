<?php
include_once("../shared/navbar.php");
class formReservarMesa  extends navbar{

    public function formReservarMesaShow(){
        
        $this->navbarShow();
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Reservar Mesa</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>

    <body>
        <div class="col-md-5 container-form">

            <h1 class="titulo">Reservar Mesa</h1>
            <h2 class="subtitulo">Buscar reserva</h2>

            <p><b>*Máximo 5 personas por mesa.</b></p>
            <p><b>*Costo de alquiler por mesa: S/30</b></p>

            <form action="../reservarMesa/getReservarMesa.php" method="POST">

                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <div class="form-floating mb-3">
                    <input type="date" class="form-control size-form" id="fecha" placeholder="fechaDeReserva" name="fechaDeReserva">
                    <label for="fechaDeReserva">Fecha</label>
                </div>
                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <!-- <div class="form-floating mb-3">
                    <input type="time" class="form-control size-form" id="hora" placeholder="hora" name="hora">
                    <label for="hora">Hora</label>
                </div> -->
                
                <div class="form-floating  mb-3">
                    <select class="form-select" id="hora" name="hora" aria-label="Floating label select example">
                        <option selected>choose</option>
                        <!-- <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option> -->
                        <option value="10:00 - 11:00">10:00 - 11:00</option>
                        <option value="11:00 - 12:00">11:00 - 12:00</option>
                        <option value="12:00 - 13:00">12:00 - 13:00</option>
                        <option value="13:00 - 14:00">13:00 - 14:00</option>
                        <option value="14:00 - 15:00">14:00 - 15:00</option>
                        <option value="15:00 - 16:00">15:00 - 16:00</option>
                        <option value="16:00 - 17:00">16:00 - 17:00</option>
                        <option value="17:00 - 18:00">17:00 - 18:00</option>
                        <option value="18:00 - 19:00">18:00 - 19:00</option>                        
                        <option value="19:00 - 20:00">19:00 - 20:00</option>
                        <option value="20:00 - 21:00">20:00 - 21:00</option>
                        <option value="21:00 - 22:00">21:00 - 22:00</option>
                        <option value="22:00 - 23:00">22:00 - 23:00</option>
                    </select>
                    <label for="hora">Hora</label>
                </div>

                <div class="form-floating  mb-3">
                    <select class="form-select" id="ambiente" name="ambiente" aria-label="Floating label select example">
                        <option selected>choose</option>
                        <option value="1">Piso 1</option>
                        <option value="2">Piso 2</option>
                        <option value="3">Piso 3</option>
                    </select>
                    <label for="ambiente">Ambiente</label>
                </div>
                
                <!-- <p><b>*Maximo 5 personas por mesa.</b></p>
                <p><b>*Costo de alquiler por mesa: S/30</b></p> -->
                <div class="form-floating  mb-3">
                    <select class="form-select" id="mesa" name="mesa" aria-label="Floating label select example">
                        <option selected>choose</option>
                        <option value="1">1 mesa</option>
                        <option value="2">2 mesas</option>
                        <option value="3">3 mesas</option>
                        <option value="4">4 mesas</option>
                        <option value="5">5 mesas</option>
                    </select>
                    <label for="mesa">Mesas</label>
                </div>


                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary btnEnviar" name="btnVerificar" value="Verificar Reserva">
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