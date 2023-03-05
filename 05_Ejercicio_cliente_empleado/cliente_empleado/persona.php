<?php

    class Persona {
        //atributos
        private $nif;
        private $nombre;
        private $apellidos;

        //cpnstructor
        public function __construct($nif, $nom, $ape)
        {
            //asignar los valores a los atributos
            $this->nif = $nif;
            $this->setApellidos($ape);
            $this->setNombre($nom);

        }
        //metodos getter u setters
        public function getNif(){
            return $this->nif;
        }
        public function getNombre(){
            return $this->nombre;
        }
        public function getApellidos(){
            return $this->apellidos;
        }
        public function setNif($nif){
           $this->nif = $nif;
        }
        public function setNombre($nom){
            $this->nombre = $nom;
        }
        public function setApellidos($ape){
            $this->apellidos = $ape;
        }

        //otros métodos
        public function mostrarDatos(){
            return $this->nif ; $this->nombre ;$this->apellidos;
        }
    }

  /*  
$persona = new Persona('400000A', 'John', 4000);
echo $persona->mostraDatos();*/