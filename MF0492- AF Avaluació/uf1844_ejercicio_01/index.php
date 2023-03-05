<?php
	//inicializar las variables a mostrar en el formulario
	$pais=$capital=$poblacion=$mensaje='';
	//comprobar si se ha pulsado enviar
	if (isset($_POST['enviar'])) {	
		try {
			//recuperar datos del formulario y validarlos
			$pais = filter_input(INPUT_POST, 'pais');
			$capital = filter_input(INPUT_POST, 'capital');
			$poblacion = filter_input(INPUT_POST, 'poblacion');

			validarDatos($pais, $capital, $poblacion);
						
		} catch (Exception $e) {
			//en caso de error confeccionar el mensaje a enviar a la caja errores
			$mensaje = $e->getMessage();
		}
	}

	function validarDatos($pais, $capital, $poblacion){
		if (empty($pais)){
			throw new Exception("Pais obligatorio", 12);
		}
		if (empty($capital)){
			throw new Exception("Capital obligatoria", 11);
		}
		
		if (empty($poblacion) ){
			throw new Exception("Poblacion obligatoria", 10);
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formulario sincrono</title>
	<meta charset='UTF-8'>	
	<style type="text/css">
		form {width: 350px;padding: 20px;margin:auto;border:1px solid grey;background-color: lightgreen}
		label {display: inline-block;width: 120px;}
		table, td {border:1px solid grey; padding:5px;margin:auto;}
		.errores {text-align: center; border:1px solid grey;width: 390px;margin: auto;}
	</style>
</head>
<body>
	<form method="post" action="#">
		<label>País: </label>
		<input type="text" name="pais" placeholder="pais" value='<?=$pais;?>'><br>
		<label>Capital: </label>
		<input type="text" name="capital" placeholder="capital" value='<?=$capital;?>' ><br>
		<label>Población: </label>
		<input type="number" name="poblacion" value='<?=$poblacion;?>'><br><br>
		<input type="submit" value='Enviar' name='enviar'>
	</form>
	<br>
	<table>
		<tr>
			<td class='pais'><?=$pais;?></td>
			<td class='capital'><?=$capital;?></td>
			<td class='poblacion'><?=$poblacion;?></td>
		</tr>
	</table><br>
	<div class='errores'><?=$mensaje;?></div>
</body>
</html>