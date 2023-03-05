function modificacionPaciente() {
	//recuperar datos
	let nif = document.querySelector('#nif').value.trim();
	let nombre = document.querySelector('#nombre').value.trim();
	let apellidos = document.querySelector('#apellidos').value.trim();
	let fechaingreso = document.querySelector('#fechaingreso').value.trim();
	let fechaalta = document.querySelector('#fechaalta').value.trim();
	let idpaciente = document.querySelector('#idpaciente').value

	//confeccionar la petición ajax
	let servicio = 'servicios/controlador/hospitalcontroller.php'

	let datos = new FormData()
	datos.append('nif', nif)
	datos.append('nombre', nombre)
	datos.append('apellidos', apellidos)
	datos.append('fechaingreso', fechaingreso)
	datos.append('fechaalta', fechaalta)
	datos.append('idpaciente', idpaciente)
	datos.append('peticion', 'M')

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
		alert(mensaje.texto)
	})
	.catch(function(error) {
		alert(error)
	})
}