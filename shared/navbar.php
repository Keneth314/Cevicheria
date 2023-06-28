<?php

class navbar{

    public function navbarShow(){

        session_start();
        $usuario = $_SESSION["usuario"];
        $privilegios = $_SESSION["privilegios"];
        // echo "<pre>";
        // print_r($privilegios);
        // echo $privilegios[0]["privilegio"];
        // echo "</pre>";
        session_write_close();
?>

    <!doctype html>
    <html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>

        <style>
            div a img.logo-img{
                width: 35px;  
                height: 35px;
            }
        </style>

        
        
        <header class="navbar-dark bg-primary p-3 mb-1 border-bottom background-header" style="border: none !important">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    
                    <!-- Logo-->
                    <a class="navbar-brand" href="../shared/privilegios.php?inicio=1">
                        <img src="../img/logo6.png" class="logo-img" alt="Logo de la cevichería">
                        Inicio
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <div class="flex-shrink-0 dropdown me-3">
                            <a href="" class="d-block link-dark text-decoration-none dropdown-toggle" id="random" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;" >
                                Privilegios
                            </a>
                            <ul class="dropdown-menu text-small shadow ul-color" aria-labelledby="random">

                                <?php
                                    for ($i=0; $i < count($privilegios) ; $i++) { 
                                ?>
                                    <?php if($privilegios[$i]["privilegio"] == "Reservar Mesa"){?>
                                        <li><a href="../shared/formPrincipal.php?btnReservarMesa=true" class="dropdown-item">Reservar Mesa</a></li>
                                    <?php }?>
                                    <?php if($privilegios[$i]["privilegio"] == "Validar Reserva"){?>
                                        <li><a href="../shared/formPrincipal.php?btnValidarReserva=true" class="dropdown-item">Validar Reserva</a></li>
                                    <?php }?>
                                    <?php if($privilegios[$i]["privilegio"] == "Registrar Usuario"){?>
                                        <li><a href="../shared/formPrincipal.php?btnRegistrarUsuario=true" class="dropdown-item">Registrar Usuario</a></li>
                                    <?php }?>
                                    <?php if($privilegios[$i]["privilegio"] == "Obtener lista de Productos"){?>
                                        <li><a href="../shared/formPrincipal.php?btnObtenerProductos=true" class="dropdown-item">Obtener lista de Productos</a></li>
                                    <?php }?>
                                    <?php if($privilegios[$i]["privilegio"] == "Administrar Productos"){?>
                                        <li><a href="../shared/formPrincipal.php?btnAdministrarProductos=true" class="dropdown-item">Administrar Productos</a></li>
                                    <?php }?>
                                    <?php if($privilegios[$i]["privilegio"] == "Registrar Venta"){?>
                                        <li><a href="../shared/formPrincipal.php?btnRegistrarVenta=true" class="dropdown-item">Registrar Venta</a></li>
                                    <?php }?>
                                    <!-- nuevos privilegios -->
                                    <?php if($privilegios[$i]["privilegio"] == "Emitir Reporte Ingresos"){?>
                                        <li><a href="../shared/formPrincipal.php?btnEmitirReporteIngresos=true" class="dropdown-item">Emitir Reporte Ingresos</a></li>
                                    <?php }?>
                                    <?php if($privilegios[$i]["privilegio"] == "Editar Usuario"){?>
                                        <li><a href="../shared/formPrincipal.php?btnEditarUsuario=true" class="dropdown-item">Editar Usuario</a></li>
                                    <?php }?> 
                                                            
                                <?php
                                    }
                                ?>
                            </ul>
                        </div>
                    
                        
                    </ul>

                    

                
                    <div class="d-flex align-items-center">
                        <form class="me-3">
                            <label style="color:white"><?=$usuario?></label>
                        </form>
                        <div class="flex-shrink-0 dropdown me-3">
                            <a href="" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                                <img src="../img/user.png" alt="mdo" width="32" height="32" class="rounded-circle">
                                <!-- <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle"> -->
                            </a>
                            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                                <!-- <li><a class="dropdown-item" href="#">New project...</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li> -->
                                <li><a class="dropdown-item" href="../shared/formPrincipal.php?btnActualizarPassword=true">Actualizar Password</a></li>
                                <!-- <li><hr class="dropdown-divider"></li> -->
                                <li><a class="dropdown-item" href="../shared/formPrincipal.php?btnLogout=true">Cerrar Sesion</a></li>
                            </ul>
                        </div>
                        
                    </div>


                </div>
            </div>
        </header>


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        
    </body>
    </html>


    <?php
    }
}

?>