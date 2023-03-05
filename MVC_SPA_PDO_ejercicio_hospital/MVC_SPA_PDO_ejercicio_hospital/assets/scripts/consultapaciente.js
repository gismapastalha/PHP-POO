function consultaPaciente(id=0) { 
	//confeccionar la petición ajax
	let servicio = 'servicios/controlador/hospitalcontroller.php'

	let datos = new FormData()
	datos.append('peticion', 'P')
	datos.append('id', id)

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

