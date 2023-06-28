<?php
include_once("../shared/navbar.php");
class formMesas extends navbar{

    public function formMesasShow($estadoMesas){
    $this->navbarShow();

?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="../obtenerListaProductos/obtenerListaProductos.css?v=<?php echo(rand()); ?>" />

        <title>Lista Productos</title>
    </head>
    <body>

        <div class="container container-main col-md-6">

            <h1 class="titulo">Registrar Ventas</h1>

            <form action="../registrarVenta/getFormMesas.php" method="POST">
                <!-- <table class="table table-bordered  table-borderless"> -->

                <table class="table table-borderless">
                    <tbody>
                        <tr class="container-ambiente">
                            <td>Ambiente 1</td>
                            <td>Ambiente 2</td>
                            <td>Ambiente 3</td>
                        </tr>
                        <tr>
            
                            <?php
                                // echo "<pre>";
                                // print_r($estadoMesas[0]);
                                // var_dump(empty($estadoMesas[0]));
                                // echo "</pre>";
                            ?>
                            <?php if(empty($estadoMesas[0])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="1_1_si">M1</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="1_1_no">M1</button>
                                </td>
                            <?php endif; ?>

                            <?php if(empty($estadoMesas[1])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="1_2_si">M2</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="1_2_no">M2</button>
                                </td>
                            <?php endif; ?>

                            <?php if(empty($estadoMesas[2])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="1_3_si">M3</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="1_3_no">M3</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <?php if(empty($estadoMesas[3])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="2_1_si">M1</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="2_1_no">M1</button>
                                </td>
                            <?php endif; ?>

                            <?php if(empty($estadoMesas[4])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="2_2_si">M2</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="2_2_no">M2</button>
                                </td>
                            <?php endif; ?>

                            <?php if(empty($estadoMesas[5])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="2_3_si">M3</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="2_3_no">M3</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <?php if(empty($estadoMesas[6])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="3_1_si">M1</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="3_1_no">M1</button>
                                </td>
                            <?php endif; ?>

                            <?php if(empty($estadoMesas[7])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="3_2_si">M2</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="3_2_no">M2</button>
                                </td>
                            <?php endif; ?>

                            <?php if(empty($estadoMesas[8])): ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-success" name="btnMesa" value="3_3_si">M3</button>
                                </td>
                            <?php else: ?>
                                <td class="td-boton"> 
                                    <button class="btn btnMesa btn-danger" name="btnMesa" value="3_3_no">M3</button>
                                </td>
                            <?php endif; ?>
                        </tr>
                    
                    
                    </tbody>
                </table>

                <div class="container-leyenda">
                    <div>
                        <span class="circulo-rojo">a</span>
                        <span>Falta cobrar</span>
                    </div>
                    <div>
                        <span class="circulo-verde">a</span>
                        <span>Cobrado</span>
                    </div>
                </div>

                
            </form>

        </div>
        
        
    </body>
    </html>



<?php

    }
}



?>