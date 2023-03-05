<?php


    class AlumnoBecario extends Alumno{
        //atributos
        private float $sueldo;
        //constructor
        public function __construct(string $nif, string $nom, string $tipo, string $via, string $num, string $piso, string $fec, int $cur, float $sueldo)
        {
            //delegar
            parent::__construct($nif, $nom, $tipo,  $via,  $num,  $piso,  $fec, $cur);
            //
            $this->setSueldo($sueldo);
        }
        //getters y setters
        public function setSueldo(float $sueldo):void {
            if (empty($sueldo)|| $sueldo <= 0){
                throw new Exception("Sueldo obligatorio y mayor que cero"); 
            }
            $this->sueldo = $sueldo;
        }
        public function getSueldo():float {
            return $this->sueldo;
        }

        //otros metodos
        public function mostrarDatos(): string
        {
            //EJEMPLO DE AMPLIACION DE MÉTODOS
            //recuperar atributos comunes
            $datosComunes = parent::mostrarDatos();
            //añadir el atributo sueldo
            return "$datosComunes / $this->sueldo";
        }
    }