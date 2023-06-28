<?php
include_once("../shared/navbar.php");
class formRegistrarUsuario extends navbar{



    public function formRegistrarUsuarioShow($privilegios, $enlace = "../registrarUsuario/getRegistrarUsuario.php"){

    $this->navbarShow();

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Registrar Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="background-container">
            <div class="col-md-5 container-form ">
                <h1 class="titulo">Registro</h1>

                <form action="<?=$enlace?>" method="POST" class="row g-2">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control input-container" id="usuario" placeholder="usuario" name="usuario">
                        <label for="usuario">Usuario</label>
                    </div>

                    <div class="form-floating mb-3 col-md-6">
                        <input type="password" class="form-control input-container" id="password" placeholder="password" name="password">
                        <label for="password">Contraseña</label>
                    </div>

                    <div class="form-floating mb-3 col-md-6">
                        <input type="password" class="form-control input-container" id="nombre" placeholder="nombre" name="repassword">
                        <label for="nombre">Repite la contraseña</label>
                    </div>


                    <div class="row g-1 privilegio-container">
                        <span class="title-privilegios">Privilegios</span>
                        <?php

                        // echo "<pre>";
                        // var_dump($privilegios);
                        // echo "</pre>";
                            for ($i=0; $i < count($privilegios); $i++) { 
                            
                        ?>

                            <div class="form-check col-md-6">
                                <input class="form-check-input" type="checkbox" name="privilegio[<?=$i?>]" value="<?=$privilegios[$i]["privilegio"]?>" id="privilegio<?=$i+1?>">
                                <label class="form-check-label" for="privilegio<?=$i+1?>"><?=$privilegios[$i]["privilegio"]?></label>
                            </div>
                        <?php
                            }
                        ?>
                    

                        <!-- <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="privilegio[0]" value="Privilegio 1" id="privilegio1">
                            <label class="form-check-label" for="privilegio1">Privilegio 1</label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="privilegio[1]" value="Privilegio 2" id="privilegio2">
                            <label class="form-check-label" for="privilegio2">Privilegio 2</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="privilegio[2]" value="Privilegio 3" id="privilegio3">
                            <label class="form-check-label" for="privilegio3">Privilegio 3</label>
                        </div> -->
                    
                    </div>


                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btnEnviar" name="btnEnviar" value="Registrar">
                    </div>


                    <link rel="stylesheet" href="../registrarUsuario/registrarUsuario.css?v=<?php echo(rand()); ?>" />

                </form>
            </div>
        </div>
        
    </body>

    </html>

<?php
    }
}




?>


