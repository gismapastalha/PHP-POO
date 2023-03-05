<?php

    //
    try {
        // conexin a la base de datos

        //preparar la sentencia

        //realizar la bind de los parámetros

        //ejecutar la sentencia

    } catch (PDOException $e) {
        //relanzar la exception
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }catch (Exception $e){
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }