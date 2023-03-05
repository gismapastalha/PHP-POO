<?php

    //crear una clase (plantilla para crear objetos)
    class Persona{
        //atributos
        public $nombre;
        //método o procedimientos 
        public function saludar(){
            //acceder a atributo desde dentro de la clase
            echo "hola $this->nombre";
        }
        
    }
    //crear un objeto a partir de la clase 
    $persona = new Persona();
    $persona->nombre = 'John Rambo';
    echo $persona->nombre;
    echo '<br>';

    //ejecutar el método saludar
    $persona->saludar();