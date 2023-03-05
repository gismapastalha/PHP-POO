<?php
    require('persona.php');
    require('empleado.php');
    require('cliente.php');
    //instancia las tres clases
    $cliente = new Cliente('400000A', 'John', 'John', 4000);
    echo $cliente->mostraDatos();
    echo '<hr>';
    $empleado = new Empleado('400000A', 'John', 'John', 4000);
    echo $empleado->mostraDatos();
    echo '<hr>';