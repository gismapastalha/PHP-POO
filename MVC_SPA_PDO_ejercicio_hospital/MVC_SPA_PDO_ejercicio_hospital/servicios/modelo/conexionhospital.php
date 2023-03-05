<?php
	//CONEXION BBDD

	class Conexion {
		//atributos
		protected object $conexionHospital;
		private static $dsn = "mysql:host=localhost;dbname=hospital;charset=UTF8";

		//constructor
		public function __construct() {
			//conexión a la base de datos
			$this->conexionHospital = new PDO(self::$dsn, 'root', '');

			//convertir errores en excepciones
			$this->conexionHospital->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			//especificar el tipo de array que queremos en la consulta
			$this->conexionHospital->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		}
	}

?>