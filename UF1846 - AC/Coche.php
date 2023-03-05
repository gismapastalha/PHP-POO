<?php

require_once('vehicle.php');
 class Coche extends Vehicle{
    
    public $numero_plazas;
    public $extras;
    public function __construct($marca, $model, $any_compra, $consumo, int $numeroMatricula, string $letrasMatricula, int $numero_plazas, string $extras)
    {
        parent::__construct($marca, $model, $any_compra, $consumo, $numeroMatricula, $letrasMatricula);
        $this->numero_plazas = $numero_plazas;
        $this->extras = $extras;
    }
    public function mostrarDatos() {
        $datos = parent::mostrarDatos();
        $autonomia = parent::mostrarAutonomia();
        return $datos."Numero de plazas: $this->numero_plazas <br> Extras: $this->extras <br>".$autonomia;
    }
 }
 echo "ACTIVIDAD 02 --> class Coche <br>";
 $micoche1 = new Coche('Toyota', '6ML 300', '2015', '0.45', 88899, 'CCD', 4, '-aa');
 echo $micoche1->mostrarDatos();
 echo '<hr>';