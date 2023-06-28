<?php
include_once("../shared/navbar.php");
class formActualizarPassword extends navbar{

    public function formActualizarPasswordShow(){

        $this->navbarShow();
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Actualizar Password</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="col-md-5 container-form">

            <h1 class="titulo">Actualizar contraseña</h1>

            <form action="../actualizarPassword/getActualizarPassword.php" method="POST">

                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control size-form" id="oldpass" placeholder="oldpass" name="oldpass">
                    <label for="oldpass">Contraseña antigua</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control size-form" id="newpass" placeholder="newpass" name="newpass">
                    <label for="newpass">Contraseña nueva</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control size-form" id="newpass2" placeholder="newpass2" name="newpass2">
                    <label for="newpass2">Repetir contraseña</label>
                </div>
                
                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary btnEnviar" name="btnActualizar" value="Actualizar">
                </div>
                
            </form>
        </div>
        <link rel="stylesheet" href="../actualizarPassword/actualizarPassword.css?v=<?php echo(rand()); ?>" />

    </body>

    </html>

<?php
    }
}

?>