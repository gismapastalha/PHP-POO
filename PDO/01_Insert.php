<?php

    //
    $nif                    ='20003330G';
    $nombre                 ='samsam';
    $apellidos              ='talhaSAM ';
    $direccion              ='calle granada';
    $telefono               ='666666666';
    $email                  ='text@gmail.com'; 

    try {
        // conexin a la base de datos
        require('00_conexionbanco.php');
        //preparar la sentencia
        $sql= $conexion->prepare("INSERT INTO personas VALUES (NULL, :nif, :nombre, :apellidos, :direccion, :email, :telefono, DEFAULT)");
        //realizar la bind de los parámetros
        $sql->bindParam(':nif', $nif);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':apellidos', $apellidos);
        $sql->bindParam(':direccion', $direccion);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':telefono', $telefono);
        
        //ejecutar la sentencia
        $sql->execute();
        //recuperar la clave primaria asignada
        $id = $conexion->lastInsertId();
        echo "Alta efectuada con el id $id";
    } catch (PDOException $e) {
        //relanzar la exception
        if($e->errorInfo[1] == 1062){
            echo "Nif ya existe en la base de datos";
        }else{
            echo $e->getCode() . ': ' .$e->getMessage() ;
        }
        
    }catch (Exception $e){
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }