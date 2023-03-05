<?php

    try {
        //tipo de sgbd y parametros conexion
        $dsn = "mysql:host=localhost;dbname=banco;charset=UTF8";
        //conexion a base de dados
        $conexion = new PDO($dsn, 'root', '');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } catch ( PDOException $e) {
        //convertir la PDOException en una excepcion de la la
        throw new Exception($e->getMessage(), (int) $e->getCode());
        
    }
