<?php

    //crear una clase (plantilla para crear objetos)
    class Persona{
        //atributos
        public $nif;
        public $nombre;
        //método o procedimientos 
        public function saludar(){
            //acceder a atributo desde dentro de la clase
            echo "hola $this->nombre";
        }
        
    }
    class Adolescente extends Persona{
        //atributos
        public $edad;
    }
    //crear un objeto a partir de la clase 
    $adolescente = new Adolescente();
    $adolescente->nif = '400000F';
    $adolescente->nombre = 'chica mala';
    $adolescente->edad = 15;
    $adolescente->saludar();
