<?php
    require_once('alumno.php');
    require_once('alumnoBecario.php');

    //
    
    try {
        //$alumno = new Alumno('4000000A', 'O-Ren Ishii', 'Malvavisco, 54', '2000-09-09', 5);
        $alumno = new Alumno('4000000A', 'O-Ren Ishii', 'c/', 'malvavisco', '54', '3o 4a', '2000-09-09', 5);

        echo $alumno->mostrarDatos(); //enviar un mensaje a un objeto
        echo '<hr>';


        $becario = new AlumnoBecario('4000000A', 'O-Ren Ishii', 'c/', 'malvavisco', '514', '3o 4a', '2022-09-09', 6, 12000);

        echo $becario->mostrarDatos();
        echo '<hr>';

        //mostrar el contador de instancias accediendo directamente ya que es public
        //echo Alumno::$contador;
        //mostrar el contador de instancias utilizando el método estático
        echo Alumno::getContador();

    } catch (Exception $e) {//substituimos el Throwable por Exception porque no nos interesa capturar las excepciones del sistema (perdemos la información necesaria para localizar el error)
        echo $e->getMessage();
    }