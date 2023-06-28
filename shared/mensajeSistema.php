<?php

class mensajeSistema{

    public function mensajeSistemaShow($mensaje, $enlace = "../index.php"){

?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Mensaje</title>
        </head>
        <body>

            <p><?= $mensaje?></p><br>
            <a href="<?= $enlace?>" class="text-link">Volver</a>
        </body>
        </html>


        <link rel="stylesheet" href="../shared/mensajeSistema.css?v=<?php echo(rand()); ?>" />

<?php

    }
}
?>