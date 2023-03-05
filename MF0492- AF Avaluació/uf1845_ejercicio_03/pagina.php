<?php
	if (!isset($_COOKIE['usuario'])) {
		header('location: index.php'); 
	}

	if (isset($_POST['logoff'])) {
		//borrar la cookie y redirigir a login
		//???? a completar por el alumno ????
		unset($_SESSION['usuario']);
		header('location: index.php');
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset='UTF-8'>	
	<style type="text/css">
		form {width: 350px;padding: 20px;margin:auto;border:1px solid grey;background-color: lightyellow}
		label {display: inline-block;width: 120px;}
		.infologin {text-align: center; border:1px solid grey;width: 390px;margin: auto; height:23px;}
	</style>
	<script type="text/javascript" src='js/login.js'></script>
</head>
<body>
	<form method='post' action = '#'>
		<input type="submit" value='Logoff' name='logoff'>
	</form>
	<br>
	<div class='infologin'><?=$_COOKIE['usuario']?></div>
</body>
</html>