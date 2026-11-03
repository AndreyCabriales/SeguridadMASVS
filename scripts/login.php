<?php
    session_start();
    require_once('../clases/UsuarioBD.php');
    $uDB=new UsuarioBD();

    if(isset($_POST['email']) && isset($_POST['pass'])){
        $usuario=$uDB->login($_POST['email'],md5($_POST['pass']));

        if(isset($usuario)&& $usuario!=null){
            $_SESSION['email']=$usuario->getEmail();
            $_SESSION['usuario']=$usuario;
            $_SESSION['tipo']=$usuario->getTipo();

            $mensaje=true;
        }else{
            $mensaje=false;
        }
    }else{
        $mensaje="Faltaron datos";
    }

    echo json_encode($mensaje);

?>