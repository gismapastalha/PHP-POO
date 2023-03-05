//variables globales  
var paginaActual 

//activar select numero de filas a mostrar
document.querySelector('#filasamostrar').onchange = function() {
	//tenemos que envolver la llamada a la función de consulta en una función anónima para evitar que se envie el objeto event del raton como parámetro de entrada
	consultaPacientes()
}

//mostrar la lista de pacientes
consultaPacientes()
