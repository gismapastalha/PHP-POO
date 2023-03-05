<?php
	//componentes permitidos
	$arraySecciones = ['alta', 'consulta', 'mantenimiento', 'index']; 
	$componente = 'index'; //componente por defecto
	if (isset($_GET['seccion']) && in_array($_GET['seccion'], $arraySecciones)) {
	//comprobar si nos llega el parámetro seccion por url
	$componente = $_GET['seccion'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hospital</title>
	<link rel="stylesheet" type="text/css" href="assets/css/hospital.css">
</head>
<body>
<div class="container">
	<header>
		<h1 id="title">HOSPITAL</h1>
	</header>
	<nav>
		<h3>Menu opciones:</h3>
		<a href="?seccion=consulta">Consulta pacientes</a><br><br>
		<a href="?seccion=alta">Alta paciente</a><br><br>
		<a href="?seccion=mantenimiento">Baja/modificación paciente</a>
		<br><br>
	</nav>
	
	<section id='contenido'>
		<div>
		<?php readfile("componentes/$componente.html"); ?>
		</div>
	</section>
</div>
</body>
</html>