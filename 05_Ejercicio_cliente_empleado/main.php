<?php 
    require('persona.php');
    require('cliente.php');
    require('empleado.php');

    //INSTANCIAR LAS TRES CLASES
    $persona = new Persona('4000000A', 'Vernita', 'Green');

    echo $persona->mostrarDatos();

    echo '<hr>';

    $cliente = new Cliente('4000001B', 'John', 'Rambo', 40000);

    echo $cliente->mostrarDatos();

    echo '<hr>';

    $empleado = new Empleado('4000002C', 'O-Ren', 'Ishii', 90000);

    echo $empleado->mostrarDatos();