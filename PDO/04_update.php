<?php

    //
    $id                     = 53;
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
        $sql= $conexion->prepare("UPDATE personas SET nif= :nif, nombre= :nombre, apellidos = :apellidos, direccion = :direccion, email = :email, telefono = :telefono WHERE idpersona = :id");
        //realizar la bind de los parámetros
        $sql->bindParam(':nif', $nif);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':apellidos', $apellidos);
        $sql->bindParam(':direccion', $direccion);
        $sql->bindParam(':email', $email);
        $sql->bindParam(':telefono', $telefono);
        $sql->bindParam(':id', $id);
        
        //ejecutar la sentencia
        $sql->execute();
        //detectar si se ha modificado alguna fila
        if($sql->rowCount() == 0){
            throw new Exception("Persona no existe o no se han modificado datos", 11); 
        }
        //
        echo "modificacion efectuada";
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