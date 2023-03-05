<?php
	//definir una variable con la nota aleatoria
	$nota = rand(0,10);
	//$nota = 6.5;
	//llamar a la función de obtención de calificación y recoger el resultado en una variable
	$cualificacion = calcularCalificacion($nota);
	//definir la función 
	function calcularCalificacion($nota){
		if ($nota < 5) {
			$cualificacion = 'Suspenso';
			
		}elseif ($nota <= 6 & $nota >= 5)  {
			$cualificacion = 'Aprobado';
			
		}elseif ($nota<= 9) {
			$cualificacion = 'Notable';
			
		}elseif ($nota = 10) {
			$cualificacion = 'Excelente';
			
		}
		return $cualificacion ;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Funciones</title>
	<meta charset='UTF-8'>	
	<style type="text/css">
		div {text-align: center; border:1px solid grey;width: 390px;margin: auto;}
		h2 {text-align: center;}
	</style>
</head>
<body>
	<h2>Funciones</h2>
	<div>
		<span>Nota: <?=$nota?></span>
	</div>
	<div>
		<span>Calificación: <?=$cualificacion?></span>
	</div>
</body>
</html>