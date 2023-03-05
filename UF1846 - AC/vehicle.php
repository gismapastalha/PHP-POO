<?php
 require_once('matricula.php');
class Vehicle {
    //atributos
    private $marca;
    private $model;
    private $any_compra;
    private Matricula $matricula;
    private $consumo;

     //constructor
     public function __construct($marca, $model, $any_compra, $consumo, int $numeroMatricula, string $letrasMatricula) {
        //asignar los valores a los atributos:
        //$this->nif = $nif; //asignación directa
        $this->setMarca($marca); //asignación por delegación
        $this->setModel($model);
        $this->setAny($any_compra);
        $this->setMatricula($numeroMatricula, $letrasMatricula);
        $this->setConsumo($consumo);
    }
    //métodos getters y setters
    public function getMarca() {
        return $this->marca;
    }
    public function getModel() {
        return $this->model;
    }
    public function getAny() {
        return $this->any;
    }
    public function getMatricula() {
        return $this->matricula->getMatricula();
    }
    public function getConsumo() {
        return $this->consumo;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }
    public function setModel($model) {
        $this->model = $model;
    }
    public function setAny($any_compra){
        $this->any = $any_compra;
    }
    public function setMatricula( int $numeroMatricula, string $letrasMatricula){
        //$this->matricula = $matricula;
        $this->matricula = new Matricula($numeroMatricula, $letrasMatricula);
    }
    public function setConsumo($consumo){
        $this->consumo= $consumo;
    }

    public function mostrarAutonomia() {
        $autonomia = 80 * $this->consumo ;
        //return "La autonomia es $autonomia Km";
        return "La autonomia es de $autonomia Km";
    }

    public function mostrarDatos() {
        return "La marca : $this->marca <br> El modelo: $this->model <br> Año de compra: $this->any <br> Matricula : {$this->getMatricula()} <br>Consumo: $this->consumo l/km <br>";
    }
}

echo "ACTIVIDAD 01 --> class Vehicle <br>";
$vehicle = new Vehicle('Toyota', '6KL 500', '2005', '0.5', 99999, 'DDD');
echo $vehicle->mostrarDatos();
echo $vehicle->mostrarAutonomia();
echo '<hr>';