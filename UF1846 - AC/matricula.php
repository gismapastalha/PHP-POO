<?php 
  
    class Matricula {
         //atributos
         private int $numeroMatricula;
         private string $letrasMatricula;

          //constructor
        public function __construct( int $numeroMatricula, string $letrasMatricula ) {
            $this->setNumeroM($numeroMatricula);
            $this->setLetrasM($letrasMatricula); 
        }
        public function setNumeroM(int $numeroMatricula): void {
            $this->numeroM = $numeroMatricula;
        }
        public function setLetrasM(string $letrasMatricula): void {
            $this->letrasM = $letrasMatricula;
        }

        public function getNumeroM(): int {
            return $this->numeroM;
        }
        public function getLetrasM(): string {
            return $this->letrasM;
        }

        public function getMatricula(): string {
            return "$this->numeroM-$this->letrasM";
        }
    }
    //$micoche = new Matricula(99999, 'DDD' );
    //echo $micoche->getMatricula();