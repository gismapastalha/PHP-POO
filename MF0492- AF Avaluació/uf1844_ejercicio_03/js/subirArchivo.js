window.onload=function() {
	document.querySelector('#enviar').onclick = enviarArchivo;
}

function enviarArchivo() {
	//recuperar el archivo del formulario
	var archivo = document.querySelector('#archivo').files[0]

	//realizar la petición ajax
	//1 encapsular los datos
	var datos = new FormData()
	datos.append('archivo', archivo)

	//2 parámetros de la petición
	var parametros = {
		method: 'post',
		body: datos
	}

	var servicio = 'servicios/subirArchivo.php';

	//3. realizar la petición
	fetch(servicio, parametros)
	.then(function(respuesta) {
		if (respuesta.ok) {
			return respuesta.json()
		} else {
			console.log(respuesta)
			throw ('algo ha ido mal')
		}
	})
	.then(function(mensaje) {
		console.log(mensaje)
		//la primera posición será el código de retorno
		var codigo = mensaje[0]
		//la segunda posición será el texto de retorno
		var texto = mensaje[1]

		//alert(texto)
		alert(mensaje.texto)

		//en caso de código '00' mostrar la imagen en el documento
		//??? a completar por el alumno ???
		
	})
	.catch(function(error) {
		alert(error)
	})
}