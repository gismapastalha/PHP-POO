function consultaPacientes(pagina=1) { //parámetro con valor por defecto
	//asignar el parámetro de entrada a la variable global de pagina actual
	paginaActual = pagina;

	//recuperar datos (número de pacientes a mostrar)
	let filasamostrar = document.querySelector('#filasamostrar').value

	//confeccionar la petición ajax
	let servicio = 'servicios/controlador/hospitalcontroller.php'

	let datos = new FormData()
	datos.append('peticion', 'C')
	datos.append('pagina', pagina)
	datos.append('filas', filasamostrar)

	let parametros = {
		method: 'post',
		body: datos
	}

	//petición ajax
	fetch(servicio, parametros)
	.then(function(resp) {
		if (resp.ok) {
			return resp.json()
		} else {
			throw ('algo ha ido mal')
		}
	})
	.then(function(mensaje) {
		console.log(mensaje)
	})
	.catch(function(error) {
		alert(error)
	})
}