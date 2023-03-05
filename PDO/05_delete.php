<?php

    //
    $id = 14;

    try {
        // conexin a la base de datos
        require('00_conexionbanco.php');
        //preparar la sentencia
        $sql= $conexion->prepare("DELETE FROM personas  WHERE idpersona = :id");
        //realizar la bind de los parámetros
        $sql->bindParam(':id', $id);
        
        //ejecutar la sentencia
        $sql->execute();
        //detectar si se ha modificado alguna fila
        if($sql->rowCount() == 0){
            throw new Exception("Persona no existe ", 11); 
        }
        //
        echo "Baja efectuada";
    } catch (PDOException $e) {
        //relanzar la exception
        if($e->errorInfo[1] == 1451){
            echo "Persona no se puede borrar porque tiene cuentas asociadas";
        }else{
            echo $e->getCode() . ': ' .$e->getMessage() ;
        }
        
    }catch (Exception $e){
        echo $e->getCode() . ': ' .$e->getMessage() ;
    }