<?php
	try {
		//comprobar que nos llega un fichero
		$archivo = $_FILES['archivo'] ?? null;
		//recuperar los parámetros que necesitamos del fichero: tmp_name, name y size
		$nombre = $_FILES['archivo']['name'];
        $tipo = $_FILES['archivo']['type'];
        $error = $_FILES['archivo']['error'];
        $peso = $_FILES['archivo']['size'];
		//validar tamaño del archivo
		//validar datos archivo 
		if (empty($_FILES)){
			throw new Exception("Debe selciona una archivo", 10);
		}
		//validar que el peso no supere los 100Kb
		if ($peso > 100000){
			throw new Exception("Tamaño no puede superar los 100kb", 11);
		}   
            
		//mover el archivo de la carpeta temporal a la carpeta definitiva en el servidor
			
		//confeccionar el mensaje de respuesta
		$mensaje = ['codigo' => '00', 'texto' => "Archivo enviado correctamente"];
		//$mensajes = "Archivo enviado correctamente"; 
	} catch (Exception $e) {
		//confeccionar el mensaje de respuesta en caso de error
		$mensaje = ['codigo' => $e->getCode(), 'error' => $e->getMessage()];
	}
	
	//enviar la respuesta ajax
	echo json_encode($mensaje);
	
?>