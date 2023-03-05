<?php
//require_once('persona.php');
class Empleado extends Persona{
    //atributos
    private $salario;

    //cpnstructor
    public function __construct($nif, $nom, $ape , $sal)
    {
        //delegar a la superclase Persona el informar los atributos comunes
        parent::__construct($nif, $nom, $ape);
        $this->setsalario($sal);
    }
    public function getSalario(){
        return $this->salario;
    }
    public function setSalario($sal){
        return $this->salario = $sal;
    }

    public function mostrarDatos(){
        $datos = parent::mostraDatos();
        return $datos."/ $this->salario";
    }
}
/*
$empleado = new Empleado('400000A', 'John','John', 4000);
echo $empleado->mostraDatos();*/
