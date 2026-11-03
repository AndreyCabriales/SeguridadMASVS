<?php
    class Usuario{
        private $id;
        private $nombre;
        private $paterno;
        private $edad;
        private $email;
        private $password;
        private $telefono;
        private $license;

        public function __construct($name,$email,$password)
        {
            $this->nombre=$nombre;
            $this->email=$email;
            $this->password=$password;
        }

        public function setId($id){
             $this->id=$id;
        }
        public function getId(){
            return $this->id;
        }

        public function setNombre($nombre){
            $this->nombre=$nombre;
        }
        public function getNombre(){
           return $this->nombre;
        }
       
        public function setPaterno($paterno){
            $this->paterno=$paterno;
        }
        public function getPaterno(){
           return $this->paterno;
        }
        
        public function setEdad($edad){
            $this->edad=$edad;
        }
        public function getEdad(){
           return $this->edad;
        }

        public function setEmail($email){
            $this->email=$email;
        }
        public function getEmail(){
           return $this->email;
        }

        public function setPassword($password){
            $this->password=$password;
        }
        public function getPassword(){
           return $this->password;
        }

        public function setTelefono($telefono){
            $this->telefono=$telefono;
        }
        public function getTelefono(){
           return $this->telefono;
        }

        public function setLicense($license){
            $this->license=$license;
        }
        public function getLicense(){
           return $this->license;
        }
    }


?>