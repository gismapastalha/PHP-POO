<?php
//require('persona.php');
class Cliente extends Persona{
    //atributos
    private $facturacion;

    //cpnstructor
    public function __construct($nif, $nom, $ape , $fac)
    {
        //delegar a la superclase Persona el informar los atributos comunes
        parent::__construct($nif, $nom, $ape);
        $this->setFacturacion($fac);
    }
    public function getFacturacion(){
        return $this->facturacion;
    }
    public function setFacturacion($fac){
        return $this->facturacion = $fac;
    }

    public function mostrarDatos(){
        $datos = parent::mostraDatos();
        return $datos."/ $this->facturacion";
    }
}
/*
$cliente = new Cliente('400000A', 'John', 'John', 4000);
echo $cliente->mostraDatos();*/
