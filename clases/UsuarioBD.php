<?php
    

    require_once('conexion.php');
    require_once('Usuario.php');

    error_reporting(~E_NOTICE);
    mysqli_report(MYSQLI_REPORT_ALL & ~MYSQLI_REPORT_INDEX);
    mysqli_report(MYSQLI_REPORT_STRICT ); 

    class UsuarioBD{
        private $insertar_sql="INSERT INTO users(name_u,email_u,password_u,) VALUES(?,?,?)";
        private $modificar_sql="UPDATE users SET name_u=?,lastname_u=?,email_u=?,password_u=?,phone_u=? WHERE id_user=?";
        private $eliminar_sql="DELETE FROM users WHERE id_user=?";
        private $todos_sql="SELECT * FROM users";
        private $login="SELECT * FROM users WHERE email_u=? and pass_u=?";
        private $buscar_sql="SELECT * FROM users WHERE name_u like ? or email_u like ?";
        private $selecionar_sql="SELECT * FROM users WHERE id_user=?";
        private $conn;

        public function __construct()
        {
            $c=new Conexion();
            $this->conn=$c->conectar();
        }

        public function crear($usuario){

            try{
                $sentencia=$this->conn->prepare($this->insertar_sql);
                $sentencia->bind_param('sss',$usuario->getNombre(),$usuario->getEmail(),$usuario->getPass());
                $resultado=$sentencia->execute();

                if($resultado==1){
                    return "Usuario creado";
                }else{
                    return "No se pudo crear el usuario";
                }

            }catch(mysqli_sql_exception $e){
                echo "Error al insertar: ".$e->getMessage();
            }finally{
                $this->conn->close();
            }
        }

        public function login($email,$pass){
            $usuario=null;
            try {
                $sentencia=$this->conn->prepare($this->login);
                $sentencia->bind_param('ss',$email,$pass);
                $sentencia->execute();
                $resultado=$sentencia->get_result();
                if($resultado->num_rows>=1){
                    while($fila=mysqli_fetch_assoc($resultado)){
                        $usuario=new Usuario($fila['email'],$fila['pass'],$fila['tipo']);
                        $usuario->setId($fila['id']);
                        $usuario->setNombre($fila['nombre']);
                        $usuario->setPaterno($fila['paterno']);
                        $usuario->setMaterno($fila['materno']);
                        $usuario->setFoto($fila['foto']);
                    }
                   // return $usuario;
                }

            } catch (mysqli_sql_exception $e) {
                echo "Error al iniciar sesión: ".$e->getMessage();
            }finally{
                $this->conn->close();
            }
            return $usuario;
        }
    }

  /*   $p1=new Usuario('juan@gmail.com','12345');
    $ubd=new UsuarioBD();
    $resp= $ubd->crear($p1);
    echo $resp; */
?>
