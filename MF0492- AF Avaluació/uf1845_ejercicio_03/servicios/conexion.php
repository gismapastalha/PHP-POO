<?php
	//host, usuario, password, base de datos
	if (!$conexion = mysqli_connect('localhost', 'root', '', 'comentarios')) {
		throw new Exception("Error de conexión a la base de datos", 99);
	} 
	
	mysqli_set_charset($conexion, "utf8");
?>