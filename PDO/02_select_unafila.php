<?php

    //
    $nif = '20000000G';
    try {
        // conexin a la base de datos
        require('00_conexionbanco.php');
        //preparar la sentencia
        $sql = $conexion->prepare("SELECT * FROM personas WHERE nif = :nif");

        //realizar la bind de los parámetros
        $sql->bindParam(':nif', $nif);
        //el formato del array de respuesta
        //$sql->setFetchMode(PDO::FETCH_ASSOC);
        //$sql->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sql->execute();

        if (!$fila = $sql->fetch()) {
            throw new Exception("Nif no existe", 10);
            
        }
        //recuperar filas
        /*while ($fila = $sql->fetch()){
            echo "$fila[nif] $fila[nombre] $fila[apellidos]<br>";
        }*/
        //$fila = $sql->fetch();
        print_r($fila);

    } catch (PDOException $e) {
        //relanzar la exception
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }catch (Exception $e){
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }