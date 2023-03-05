function bajaPaciente() {
	//recuperar datos
	let idpaciente = document.querySelector('#idpaciente').value

	//confeccionar la petición ajax
	let servicio = 'servicios/controlador/hospitalcontroller.php'

	let datos = new FormData()
	datos.append('idpaciente', idpaciente)
	datos.append('peticion', 'B')

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
		if(mensaje.codigo != '00'){
			throw(mensaje.error)
		}
		//mostrar el mensaje y volver a cargr el componente de consulta
		alert(mensaje.texto)
		window.location.href = '?seccion=consulta'
	})
	.catch(function(error) {
		alert(error)
	})
}