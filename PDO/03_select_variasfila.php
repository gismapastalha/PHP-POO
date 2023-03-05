<?php

    //
    $fechs = '01-01-2022';
    try {
        // conexin a la base de datos
        require('00_conexionbanco.php');
        //preparar la sentencia
        $sql = $conexion->prepare("SELECT * FROM personas WHERE fechaalta >= :fecha");

        //realizar la bind de los parámetros
        $sql->bindParam(':fecha', $fechs);
        //el formato del array de respuesta
        //$sql->setFetchMode(PDO::FETCH_ASSOC);
        //$sql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql->execute();

        //recuperar filas
        /*while ($fila = $sql->fetch()){
            echo "$fila[nif] $fila[nombre] $fila[apellidos]<br>";
        }*/
        $fila = $sql->fetchAll();
        echo "Se han recuperado ".$sql->rowCount() ." filas";
        echo '<pre>';
        print_r($fila);
        echo '</pre>';

    } catch (PDOException $e) {
        //relanzar la exception
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }catch (Exception $e){
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }