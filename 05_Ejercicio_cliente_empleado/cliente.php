<?php 
    //require_once('persona.php'); 
    
    //CLASE CLIENTE

    class Cliente extends Persona {
        //atributos
        private $facturacion;

        //constructor
        public function __construct($nif, $nom, $ape, $fac) {
            //delegar en el constructor de la superclase Persona el informar los atributos comunes
            parent::__construct($nif, $nom, $ape);

            //informar el atributo específico
            $this->setFacturacion($fac);
        }

        //getters y setters
        public function getFacturacion() {
            return $this->facturacion;
        }
        public function setFacturacion($fac) {
            $this->facturacion = $fac;
        }

        //otros métodos
        public function mostrarDatos() {
            //delegar en el metodo de la superclase el mostrar los datos comunes
            $datos = parent::mostrarDatos();

            return $datos . " / $this->facturacion";
        }
    }

    //probador de clase
    /*
    $cliente = new Cliente('4000000A', 'John', 'Rambo', 40000);

    echo $cliente->mostrarDatos();
    */