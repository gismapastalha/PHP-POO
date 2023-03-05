<?php 
    //require_once('persona.php');
    
    //CLASE EMPLEADO

    class Empleado extends Persona {
        //atributos
        private $salario;

        //constructor
        public function __construct($nif, $nom, $ape, $sal) {
            //delegar en el constructor de la superclase Persona el informar los atributos comunes
            parent::__construct($nif, $nom, $ape);

            //informar el atributo específico
            $this->setSalario($sal);
        }

        //getters y setters
        public function getSalario() {
            return $this->salario;
        }
        public function setSalario($sal) {
            $this->salario = $sal;
        }

        //otros métodos
        public function mostrarDatos() {
            //delegar en el metodo de la superclase el mostrar los datos comunes
            $datos = parent::mostrarDatos();

            return $datos . " / $this->salario";
        }
    }

    //probador de clase
    /*
    $empleado = new Empleado('4000000A', 'John', 'Rambo', 40000);

    echo $empleado->mostrarDatos();
    */