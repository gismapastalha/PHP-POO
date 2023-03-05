<?php

    //crear una clase (plantilla para crear objetos)

    class Persona{
        //atributos
        private $nif;
        protected $nombre;
        //constroctor
        public function __construct($nif, $nom){
            //se ejecuta automaticamente cuando se realice la instaniación del objeto
            $this->nif = $nif;
            $this->nombre = $nom;
        }

        //metodos getter para leer el valor de los atributos
        public function getNif()
        {
            return $this->nif;
        }
        public function getNombre()
        {
            return $this->nombre;
        }
        //metodos setter para asignar/modificar el valor de los atributos
        public function setNif($param)
        {
            $this->nif = $param;
        }
        public function setNombre($nom)
        {
            $this->nombre = $nom;
        }
        //otrosmétodo o procedimientos 
        public function mostraDatos(){
            //acceder a atributo desde dentro de la clase
            echo "$this->nombre / $this->nif <br>";
             
        }
        
    }
    class Adolescente extends Persona{
        //atributos
        public $edad;
        public function __construct($nif, $nom, $edad)
        {
        /*$this->setNif($nif); 
            $this->nombre = $nom;
            $this->nombre = $edad;*/
            parent::__construct($nif,$nom);
            $this->nombre = $edad;
        }
        public function mostraDatos(){
            //acceder a atributo desde dentro de la clase
            ///echo $this->getNombre() . '/' . $this->getNif(). "/ $this->edad <br>";
            ///echo "{$this->getNombre()} / {$this->getNif()} / $this->edad <br>";
            //2. para acceder a nif puedo definir los atributos como protected
            echo "{$this->getNif()}  / $this->nombre  / $this->edad <br>";
        }
    }
    //crear un objeto a partir de la clase 
    $persona = new Persona('400000F', 'SAM TIM RIM');
    $persona->mostraDatos();

    $adolescente = new Adolescente('400000F','SAM TIM RIM', 15);
    $adolescente->mostraDatos();
