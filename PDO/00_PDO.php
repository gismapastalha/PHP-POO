<?php
    var_dump( PDO::getAvailableDrivers() );
    try {
        //…sentencias PDO…
        //…sentencias propias…
        } catch (PDOException $e){
        echo $e->getCode().' '.$e->getMessage();
        } catch (Exception $e){
        echo $e->getCode().' '.$e->getMessage();
        }
        //
        try {
            //…sentencias PDO…
            //…sentencias propias…
            } catch (PDOException $e){
            throw new Exception((string)$e->getMessage(), (int)$e->getCode());
            } catch (Exception $e){
            throw new Exception($e->getMessage(), $e->getCode());
            }
    
    $dsn = "mysql:host=localhost;dbname=nombre_bbdd;charset=UTF8";
    $dbh = new PDO($dsn, $usuario, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, 
    PDO::ERRMODE_EXCEPTION);
        