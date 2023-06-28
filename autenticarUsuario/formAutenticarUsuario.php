<?php

class formAutenticarUsuario{

    public function formAutenticarUsuarioShow(){


    // session_start();
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    // session_write_close();
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Registrar Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    </head>

    <body>

        <div class="col-md-5 container-form">

            <h1 class="titulo">Autenticar Usuario</h1>

            <form action="autenticarUsuario/getAutenticarUsuario.php" method="POST" class="row g-2">

                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <div class="form-floating mb-3">
                    <input type="text" class="form-control input-container" id="usuario" placeholder="usuario" name="usuario"   >
                    <label for="usuario">Usuario</label>
                </div>

                <!-- <div class="form-floating mb-3 col-md-6"> -->
                <div class="form-floating mb-3">
                    <input type="password" class="form-control input-container" id="password" placeholder="password" name="password">
                    <label for="password">Contraseña</label>
                </div>



                <div class="d-grid gap-2">
                    <input type="submit" class="btn btn-primary btnEnviar" name="btnEnviar" value="Ingresar">
                </div>

                
            </form>

            <link rel="stylesheet" href="../autenticarUsuario/autenticarUsuario.css?v=<?php echo(rand()); ?>" />
        </div>

    </body>

    </html>


<?php
    }
}

?>