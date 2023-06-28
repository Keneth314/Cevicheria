<?php
include_once("../shared/navbar.php");
class tablaReserva extends navbar{

    public function tablaReservaShow($reservas, $dni){
        $this->navbarShow();
    // echo "<pre>";
    // print_r($reservas);
    // echo "</pre>";

    // die();

?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Reservas encontradas</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>

        <div class="col-md-9 container-form">

            <h1 class="titulo">Reservas encontradas</h1>

            <!-- <p>Cliente: <i><b>Keneth Lopez Izaguirre Keneth Kerk</b></i></p> -->
            <p>Cliente: <b><?= $reservas[0]["nombre"]?></b></p>
            <p>Dni: <b><?= $dni?></b></p>
            <table class="table table-dark table-hover table-striped table-bordered">
                <thead class="align-middle">
                    <tr> 
                        <th scope="col">#</th>
                        <th scope="col">Fecha reservada</th>
                        <th scope="col">Fecha de reserva</th>
                        <th scope="col">Ambiente</th>
                        <th scope="col">Cantidad mesas</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Atendido</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        for ($i=0; $i < count($reservas); $i++) { 
                    ?>
                        <tr>
                            <th scope="row"><?=($i+1)?></th>
                            <td><?= $reservas[$i]["fechaReservada"]?></td>
                            <td><?= $reservas[$i]["fechaDeReserva"]?></td>
                            <td><?= $reservas[$i]["ambiente"]?></td>
                            <td><?= $reservas[$i]["cantMesas"]?></td>
                            <td><?= $reservas[$i]["monto"]?></td>
                            <td><?= $reservas[$i]["hora"]?></td>
                            <td>
                                <?php if($reservas[$i]["atendido"] == "1") echo "Atendido"?>
                                <?php if($reservas[$i]["atendido"] == "0") echo "No Atendido"?>
                            </td>
                            <td><a href="controlValidarReserva.php?dni=<?=$dni?>&btnAtender=true&id=<?=$reservas[$i]["idReserva"]?>" class="btn btn-primary">Atender</a></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>

                
            </table>
            <div>
            <a href="../shared/formPrincipal.php?btnValidarReserva=true" style="color:white" class="btn btn-primary btnForm">Ir al formulario</a>
            </div>
            
        </div>

        <link rel="stylesheet" href="validarReservaMesa.css?v=<?php echo(rand()); ?>" />

    </body>

    </html>


<?php

    }
}


?>