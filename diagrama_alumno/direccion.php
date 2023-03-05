<?php


    class Direccion{
        //atributos
        private string $tipovia;
        private string $nombrevia;
        private string $numero;
        private string $piso;
        //constructor
        public function __construct(string $tipo, string $via, string $num, string $piso)
        {
            //asignacion por delegacion
            $this->setTipovia($tipo);
            $this->setNombrevia($via);
            $this->setNumero($num);
            $this->setpiso($piso);

        }
        //getters y setters
        public function setTipovia(string $tipo):void{
            $this->nif = $nif;
            if (empty(trim($nif))){
                throw new Exception("Nif obligatorio");
                
            }
        }
        public function setNombre(string $nom):void{
            $this->nombre = $nom;
        }

        //otros métodos
    }