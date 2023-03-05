<?php


    class AlumnoDoctorado extends Alumno{
        //atributos
        private float $sueldo;
        //constructor
        public function __construct(string $nif, string $nom, string $tipo, string $via, string $num, string $piso, string $fec, int $cur, float $tema)
        {
            //delegar
            parent::__construct($nif, $nom, $tipo,  $via,  $num,  $piso,  $fec, $cur);
            //
            $this->setSueldo($tema);
        }
        //getters y setters
        public function setSueldo(string $tema):void {
            if (empty($tema)){
                throw new Exception("Sueldo obligatorio y mayor que cero");    
            }
        }
        public function getSueldo():string {
            return $this->tema;
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