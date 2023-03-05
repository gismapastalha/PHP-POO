<?php
    //recuperrar el tipo de peticion
    $peticion = $_POST['peticion'];

    try {
        //incorporar el fichero del modelo
        require('../modelo/paciente.php');
        //instanciar un objeto del modelo
        $paciente = new Paciente();
        //evaluar el tipo de peticion
        switch ($peticion) {
            //alta de paciente
            case 'A':
                $nif = $_POST['nif'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $fechaingreso = $_POST['fechaingreso'];

                //ejecutar el método de alta 
                $respuesta = $paciente->alta($nif, $nombre, $apellidos, $fechaingreso);
                //otras tareas asociadas al alta de paciente
                break;
            
            //consulta de pacientes
            case 'C': 
                //recuperar pagina y filas 
                $pagina = $_POST['pagina'] ?? 1;
                $filas = $_POST['filas'] ?? 10;
                //ejecutar el metodo de consulta y recooger la respuesta
                $respuesta = $paciente->consulta($pagina, $filas);
                break;
            //consulta de paciente
            case 'P':
                //recuperar el id del paciente
                $id = $_POST['id'];
                //ejecutar el método de consulta de un paciente
                $respuesta = $paciente->consultaPaciente($id);
                break;
            //modificacion de paciente
            case 'M':
                $nif = $_POST['nif'];
                $nombre = $_POST['nombre'];
                $apellidos = $_POST['apellidos'];
                $fechaingreso = $_POST['fechaingreso'];
                $fechaalta = $_POST['fechaalta'];
                $id = $_POST['idpaciente'];

                $respuesta = $paciente->modificacion( $id, $nif, $nombre, $apellidos, $fechaingreso, $fechaalta);
                break;
            //baja de paciente   
            case 'B':
                $id = $_POST['idpaciente'];
                $respuesta = $paciente->baja($id);
                break;
            //peticion no valida
           default:
                throw new Exception("peticion no valida", 50);
                
        }        
        //confeccionar la rspuesta a la vista
    } catch (Exception $e) {
        //recoger las exceptiones que se produzcan
        $respuesta = ['codigo' => $e->getCode(), 'error' => $e->getMessage()];
    }
    echo json_encode($respuesta);
