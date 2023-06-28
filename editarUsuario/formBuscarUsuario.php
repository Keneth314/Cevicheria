<?php
include_once("../shared/navbar.php");
class formBuscarUsuario extends navbar{

    public function formBuscarUsuarioShow($usuarios){

        $this->navbarShow();
        // echo "<pre>";
        // print_r($usuarios);
        // echo "</pre>";

        // die();
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <title>Editar Usuario</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>

    <body>
        <div class="col-md-10 container-form row">

            <h1 class="titulo">Editar Usuario</h1>
            
            <div class="col-md-4">
                <h2 class="subtitulo">Buscar usuario</h2>

                <form action="../editarUsuario/getBuscarUsuario.php" method="POST">

                    <!-- <div class="form-floating mb-3 col-md-6"> -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control size-form input-container" id="nameUsuario" placeholder="nameUsuario" name="nameUsuario">
                        <label for="nameUsuario">Usuario</label>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btnEnviar" name="btnBuscar" value="Buscar">
                    </div>
                    
                </form>
            </div>

            <div class="col-md-8">
                
                <table class="table table-dark table-hover table-striped table-bordered">
                    <thead class="align-middle">
                        <tr> 
                            <th scope="col">#</th>
                            <th scope="col">Nombre usuario</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i < count($usuarios); $i++) { 
                        ?>
                            <tr>
                                <th scope="row"><?=($i+1)?></th>
                                <td><?= $usuarios[$i]["usuario"]?></td>
                                <td><a href="getBuscarUsuario.php?btnEditar=true&usuario=<?=$usuarios[$i]["usuario"]?>" class="btn btn-info">Editar</a></td>
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>

        </div>
        <link rel="stylesheet" href="../editarUsuario/editarUsuario.css?v=<?php echo(rand()); ?>" />

    </body>

    </html>

<?php
    }
}

?>