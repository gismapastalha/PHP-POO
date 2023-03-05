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
		if(mensaje.codigo != '00'){
			throw(mensaje.error);
		}
		//confeccionar tabla
		confecionarTabla(mensaje.pacientes);
		//confeccionar enlaces
		confeccionarEnlaces(mensaje.paginas)
	})
	.catch(function(error) {
		alert(error)
	})
}
function confecionarTabla(pacientes) {
	let filas = ''
	for(paciente of pacientes){
		filas += `<tr>`
		filas += `<td>${paciente.nif}</td>`
		filas += `<td>${paciente.nombre}</td>`
		filas += `<td>${paciente.apellidos}</td>`
		filas += `<td><a href='?seccion=mantenimiento&id=${paciente.idpaciente}'>Consultar</a></td>`
		filas += `</tr>`
	}
	document.querySelector('#pacientes').innerHTML = filas;
}

function confeccionarEnlaces(paginas){
	let enlaces = ''
	for(p = 1; p <= paginas; p++){
		if(p == paginaActual){
			enlaces+= `<input type='button' value='${p}' onclick = 'consultaPacientes(${p})' class='resaltar'>`
		}else{
			enlaces+= `<input type='button' value='${p}' onclick = 'consultaPacientes(${p})'>`
		}
		
	}
	document.querySelector('#paginas').innerHTML = enlaces
}