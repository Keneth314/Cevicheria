<?php
include_once("../shared/navbar.php");
class formEditarUsuario extends navbar{



    public function formEditarUsuarioShow($usuario, $privilegio, $privilegios){

    $this->navbarShow();
    // echo "<pre>";
    // print_r($usuario);
    // print_r($privilegio);
    // print_r($privilegios);
    
    // echo "</pre>";
    // echo "El usuario tiene estos privilegios: ";                             
    // die();
    $priv_bd = array();
    $priv_usu = array();
    for ($i=0; $i < count($privilegios); $i++) { 
        array_push($priv_bd, $privilegios[$i]["privilegio"]);
    }
    for ($i=0; $i < count($privilegio); $i++) { 
        array_push($priv_usu, $privilegio[$i]["privilegio"]);
    }
    ?>
    
    <?php
    

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
        <div class="background-container">
            <div class="col-md-5 container-form ">
                <h1 class="titulo">Editar Usuario</h1>
                <h2 class="subtitulo">Datos usuario</h2>

                <form action="../editarUsuario/getEditarUsuario.php?id=<?=$usuario[0]["idUsuario"]?>" method="POST" class="row g-2">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control input-container" id="usuario" placeholder="usuario" name="usuario" value="<?=$usuario[0]["usuario"]?>">
                        <label for="usuario">Usuario</label>
                    </div>

                    <div class="form-floating mb-3 col-md-6">
                        <input type="password" class="form-control input-container" id="password" placeholder="password" name="password" value="<?=$usuario[0]["password"]?>">
                        <label for="password">Contraseña</label>
                    </div>

                    <div class="form-floating mb-3 col-md-6">
                        <input type="password" class="form-control input-container" id="nombre" placeholder="nombre" name="repassword" value="<?=$usuario[0]["password"]?>">
                        <label for="nombre">Repite la contraseña</label>
                    </div>
                    
                    <!-- estado -->
                    <div class="row g-1 privilegio-container">
                        <span class="title-privilegios">Estado</span>
                        <!-- caso de estado inactivo -->
                        <?php
                        if($usuario[0]["estado"] == 0){
                        ?>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="radio" name="estado" id="estado1" value="1">
                            <label class="form-check-label" for="estado1">
                                Activo
                            </label>
                        </div>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="radio" name="estado" id="estado2" value="0" checked>
                            <label class="form-check-label" for="estado2">
                                Desactivado
                            </label>
                        </div>
                        <?php
                        }
                        ?>
                        <!-- caso de estado activo -->
                        <?php
                        if($usuario[0]["estado"] == 1){
                        ?>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="radio" name="estado" id="estado1" value="1" checked>
                            <label class="form-check-label" for="estado1">
                                Activo
                            </label>
                        </div>
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="radio" name="estado" id="estado2" value="0">
                            <label class="form-check-label" for="estado2">
                                Desactivado
                            </label>
                        </div>
                        <?php
                        }
                        ?>
                    </div>

                    <!-- privilegios -->
                    <div class="row g-1 privilegio-container">
                        <span class="title-privilegios">Privilegios</span>
                        
                        <?php 
                        
                        // echo "<pre>";
                        // var_dump($privilegios);
                        // echo "</pre>";
                        for ($i=0; $i < count($privilegios); $i++) { 
                            ?>
                                <div class="form-check col-md-6">
                                    <input 
                                    <?php
                                    for ($j=0; $j < count($priv_usu) ; $j++) { 
                                        if(in_array($priv_usu[$j], $priv_bd)){
                                            if( $priv_usu[$j] == $privilegios[$i]["privilegio"]){
                                    ?>
                                        checked
                                    <?php
                                            }
                                        }                            
                                    }  
                                    ?>
                                    class="form-check-input" type="checkbox" name="privilegio[<?=$i?>]" value="<?=$privilegios[$i]["privilegio"]?>" id="privilegio<?=$i+1?>">
                                    <label class="form-check-label" for="privilegio<?=$i+1?>"><?=$privilegios[$i]["privilegio"]?></label>
                                </div>
                            <?php
                                }
                            ?>
                    </div>


                    <div class="d-grid gap-2">
                        <input type="submit" class="btn btn-primary btnEnviar" name="btnGuardar" value="Guardar">
                    </div>


                    <link rel="stylesheet" href="../editarUsuario/editarUsuario.css?v=<?php echo(rand()); ?>" />

                </form>
            </div>
        </div>
        
    </body>

    </html>

<?php
    }
}
?>


