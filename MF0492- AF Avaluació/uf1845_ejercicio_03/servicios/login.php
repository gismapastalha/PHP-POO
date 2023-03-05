<?php
	
	try {
		//recuperar los datos de la petición de forma que evitemos la inyección de código
		$nif = $_POST['nif'];
    	$password = $_POST['password'] ;
		//validar la obligatoriedad de los datos
		validarDatos($nif, $password);
		//conexión a la base de datos
		require('conexion.php');
		//acceder a la tabla usuario para recuperar la password
		$sql ="SELECT * FROM usuarios WHERE nif = '$nif' ";
		if(!$resultado = mysqli_query($conexion, $sql)){
            throw new Exception(mysqli_error($conexion), 21);
        }
		//validar que recuperamos una fila
		if($resultado->num_rows == 0){
            throw new Exception("No hay datos en la tabla", 11);  
        }
		//recuperar los datos de la fila seleccionada
		$usuario = mysqli_fetch_assoc($resultado);
		//validar que la password de la bbdd coincida con la informada en el formulario
		if ("$usuario[password]" != $password ) {
            echo "Password incorecto";
        }else{
            //echo "$usuario[nombre] $usuario[apellidos]";
			//Si coincide guardar en una cookie de nombre 'usuario' el nombre y los apellidos concatenados
			 $_SESSION['usuario'] = "$usuario[nombre] $usuario[apellidos]";
			 $mensaje = ['codigo' => '00', 'texto' => "Login efectuado"];
        }
		//generar la respuesta en formato text
		
		//$mensaje = "Login efectuado";
	} catch (Exception $e) {
		//confeccionar la respuesta en caso de error
		//echo $e->getMessage();
		$mensaje = ['codigo' => $e->getCode(), 'error' => $e->getMessage()];
	}
	function validarDatos($nif, $password){
        $errores = '';
        if (empty($nif)) {
            $errores .= "Nif obligatorio\n";
        }
        if (empty($password)) {
            $errores .= "password obligatorio\n";
        }
        if (!empty($errores)) {
            throw new Exception($errores,10);
            
        }
    }

	//enviar la respuesta de la petición ajax
	echo json_encode($mensaje);

?>