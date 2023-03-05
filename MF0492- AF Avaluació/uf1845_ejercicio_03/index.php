<?php
	if (isset($_COOKIE['usuario'])) {
		header('location: pagina.php'); 
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
	<form>
		<label>Nif: </label>
		<input type="text" id="nif"><br>
		<label>Password: </label>
		<input type="password" id="password"><br><br>
		<input type="button" value='Login' id='login'>
	</form>
</body>
</html>