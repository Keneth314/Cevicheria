<?php


session_start();
if(isset($_SESSION["usuario"]) == true && isset($_SESSION["privilegios"]) == true){
    session_write_close();
    header("Location: shared/privilegios.php?inicio=true");
}
else{
    session_write_close();
    include_once("autenticarUsuario/formAutenticarUsuario.php");
    $objLogin = new formAutenticarUsuario;
    $objLogin->formAutenticarUsuarioShow();
}


?>

<link rel="stylesheet" href="autenticarUsuario/autenticarUsuario.css?v=<?php echo(rand()); ?>" />