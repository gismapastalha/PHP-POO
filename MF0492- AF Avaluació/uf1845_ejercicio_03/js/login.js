//activar el listener del boton de login
window.onload=function() {
	document.querySelector('#login').onclick = login
}

//definir la función login
function login() {

	//recuperar los datos
	var nif	= document.querySelector('#nif').value.trim()
	var password = document.querySelector('#password').value.trim()

	//construir los parámetros de la petición ajax
	var datos = new FormData();
	datos.append('nif', nif);
	datos.append('password', password);

	var parametros = {
		method: 'post',
		body: datos,
		credentials: 'include' //para activar el envio de cookies
	}

	var servicio = 'servicios/login.php';

	//enviar la petición con fetch
	fetch(servicio, parametros)
	.then(function(respuesta) {
		//la respuestá será un text: 99Mensaje de respuesta;
		if (respuesta.ok) {
			return respuesta.json()
		} else {
			console.log(respuesta)
			throw ('algo ha ido mal')
		}
	})
	.then(function(mensaje) { 
		console.log(mensaje);
		//var codigo = mensaje.substring(0,2)
		//var texto = mensaje.substring(2)
		if (mensaje.codigo != '00') {
            throw(mensaje.error)
        }else{
			//header("pagina.php");
			
			
		}
		//alert(mensaje.error)

		//si el código es 00 redirigir a pagina.php
		//???? a completar por el alumno ????

	})
	.catch(function(error) {
		alert(error)
	})	
}