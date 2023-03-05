<?php 
  
    class Direccion {
        //atributos
        private string $tipovia;
        private string $nombrevia;
        private string $numero;
        private string $piso;

        //constructor
        public function __construct(string $tipo, string $via, string $num, string $piso ) {
            //asignación por delegación
            $this->setTipovia($tipo);
            $this->setNombrevia($via);
            $this->setNumero($num);
            $this->setPiso($piso);
        }

        //getters y setters
        public function setTipovia(string $tipo): void {
            if (empty($tipo)) {
                throw new Exception("Tipo de via obligatorio");
            }
            $this->tipovia = $tipo;
        }
        public function setNombrevia(string $nom): void {
            if (empty($nom)) {
                throw new Exception("Nombre de via obligatorio");
            }
            $this->nombrevia = $nom;
        }
        public function setNumero(string $num): void {
            if (empty($num)) {
                throw new Exception("Número de via obligatorio");
            }
            $this->numero = $num;
        }
        public function setPiso(string $piso): void {
            $this->piso = $piso;
        }

        public function getTipovia(): string {
            return $this->tipovia;
        }
        public function getNombrevia(): string {
            return $this->nombrevia;
        }
        public function getNumero(): string {
            return $this->numero;
        }
        public function getPiso(): string {
            return $this->piso;
        }

        //otros métodos
        public function getDireccion(): string {
            return "$this->tipovia $this->nombrevia $this->numero $this->piso";
        }
    }