<?php 
    //CLASE PERSONA

    class Persona {
        //atributos
        private $nif;  
        private $nombre;
        private $apellidos;

        //constructor
        public function __construct($nif, $nom, $ape) {
            //asignar los valores a los atributos:
            $this->nif = $nif; //asignación directa
            $this->setNombre($nom); //asignación por delegación
            $this->setApellidos($ape);
        }

        //métodos getters y setters
        public function getNif() {
            return $this->nif;
        }
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellidos() {
            return $this->apellidos;
        }

        public function setNif($nif) {
            $this->nif = $nif;
        }
        public function setNombre($nom) {
            $this->nombre = $nom;
        }
        public function setApellidos($ape) {
            $this->apellidos = $ape;
        }

        //otros métodos
        public function mostrarDatos() {
            return "$this->nif / $this->nombre / $this->apellidos";
        } 
    }

    //probador de clase
    /*
    $persona = new Persona('4000000A', 'Vernita', 'Green');

    echo $persona->mostrarDatos();
    */