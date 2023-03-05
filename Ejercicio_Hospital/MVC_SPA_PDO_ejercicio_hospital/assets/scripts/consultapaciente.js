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
		if(mensaje.codigo != '00'){
			throw(mensaje.error)
		}
		let paciente = mensaje.paciente
		document.querySelector('#idpaciente').value = paciente.idpaciente
		document.querySelector('#nif').value = paciente.nif
		document.querySelector('#nombre').value = paciente.nombre
		document.querySelector('#apellidos').value = paciente.apellidos
		document.querySelector('#fechaingreso').value = paciente.fechaingreso
		document.querySelector('#fechaalta').value = paciente.fechaalta
	})
	.catch(function(error) {
		alert(error)
		//volver al componente consulta
		window.location.href = '?seccion=consulta'
	})
}

