<?php
    class Usuario{
        private $id;
        private $id_taxi;
        private $cant;
        private $date;
        private $type;

        public function __construct($cant,$type)
        {
            $this->cant=$cant;
            $this->type=$type;
        }

        public function setId($id){
             $this->id=$id;
        }
        public function getId(){
            return $this->id;
        }

        public function setNombre($id_taxi){
            $this->id_taxi=$id_taxi;
        }
        public function id_taxi(){
           return $this->id_taxi;
        }
       
        public function setPaterno($paterno){
            $this->paterno=$paterno;
        }
        public function getPaterno(){
           return $this->paterno;
        }

        public function setEmail($email){
            $this->email=$email;
        }
        public function getEmail(){
           return $this->email;
        }
        public function setPass($pass){
            $this->pass=$pass;
        }
        public function getPass(){
           return $this->pass;
        }

        public function setTelefono($telefono){
            $this->telefono=$telefono;
        }
        public function getTelefono(){
           return $this->telefono;
        }

    }


?>