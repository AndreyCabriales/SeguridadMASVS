<?php
    require_once('../clases/UsuarioBD.php');
    $uBD=new UsuarioBD();

    if(isset($_POST['email']) && isset($_POST['contraseña'])){
        $usuario=new Usuario($_POST['nombre']$_POST['email'],$_POST['contraseña'],);
        $mensaje=$uBD->crear($usuario);

    }else{
        $mensaje='Falta rellenar un campo';
    }

    echo json_encode($mensaje) ;
?>