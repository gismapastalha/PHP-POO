//activar modificacion
document.querySelector('#modificacion').onclick = modificacionPaciente

//activar baja
document.querySelector('#baja').onclick = bajaPaciente
//1-recuperar todos los parametros que llegan por url
let valores = window.location.search;
//2-instanciar un objeto de la clase URLSearchParam para
//poder utilizar los metodo para extraer los datos de los parametros de la url

let parametrosUrl = new URLSearchParams(valores);
//3-comprobar si existe el parametro id para asignar a la variable id el valor del 
//parametro o el valor null 
let id = parametrosUrl.has('id') ? parametrosUrl.get('id') : null
//4-
if (id == null || isNaN(id) || id <= 0) {
    window.location.href = '?seccion=consulta'
}else{
//5. Ejecutar la funccion de consulta paciente si no llega el id corectamente
consultaPaciente(id)
}



