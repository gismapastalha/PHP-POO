<?php
	//clase genérica Cliente 

use Cliente as GlobalCliente;

	class Cliente {
		//atributos
		
        private $nombre;
        private $apellidos;
		private $direccion;
		private $facturacion;
		//constructor
		public function __construct($nombre, $apellidos, $direccion, $facturacion) {
            //asignar los valores a los atributos:
            $this->setNombre($nombre); //asignación por delegación
            $this->setApellidos($apellidos);
			$this->setDireccion($direccion);
			$this->setFacturacion($facturacion);
        }
		//getters y setters
		
        public function getNombre() {
            return $this->nombre;
        }
        public function getApellidos() {
            return $this->apellidos;
        }
		public function getDireccion() {
            return $this->direccion;
        }
		public function getFacturacion() {
            return $this->facturacion;
        }

		
        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }
		public function setDireccion($direccion) {
            $this->direccion = $direccion;
        }
		public function setFacturacion($facturacion) {
            $this->facturacion = $facturacion;
        }

		//otros métodos
		public function mostrarDatos() {
            return "$this->nombre / $this->apellidos / $this->direccion / $this->facturacion";
        } 
	// ------------------------------------------
	}
	//subclase ClienteNacional
	class ClienteNacional extends GlobalCliente{
		//atributo específico
		private $nif;  
		//constructor
		public function __construct($nif, $nombre, $apellidos, $direccion, $facturacion) {
            //delegar en el constructor de la superclase Persona el informar los atributos comunes
            parent::__construct($nombre, $apellidos, $direccion, $facturacion);

            //informar el atributo específico
            $this->setNif($nif);
        }
		//getter y setter
		public function getNif() {
            return $this->nif;
        }
		public function setNif($nif) {
            $this->nif = $nif;
        }
		//otros métodos
		public function mostrarDatos() {
            //delegar en el metodo de la superclase el mostrar los datos comunes
            $datos = parent::mostrarDatos();

            return $datos . " / $this->nif";
        }
	}	
	
	// ------------------------------------------

	//subclase ClienteExtranjero
	class ClienteExtranjero extends Cliente {
		//atributo específico
		private $Codigo_id;  
		//constructor
		public function __construct($Codigo_id, $nombre, $apellidos, $direccion, $facturacion) {
            //delegar en el constructor de la superclase Persona el informar los atributos comunes
            parent::__construct($nombre, $apellidos, $direccion, $facturacion);

            //informar el atributo específico
            $this->setNif($Codigo_id);
        }
		//getter y setter
		public function getNif() {
            return $this->Codigo_id;
        }
		public function setNif($Codigo_id) {
            $this->Codigo_id = $Codigo_id;
        }
		//otros métodos
		public function mostrarDatos() {
            //delegar en el metodo de la superclase el mostrar los datos comunes
            $datos = parent::mostrarDatos();

            return $datos . " / $this->Codigo_id";
        }
	}
	// ------------------------------------------

	//instanciar un cliente Nacional y mostrar datos
	$cliente_n = new ClienteNacional('4000000A', 'Josep', 'Connart', 'Calle granada 123', 40000);
	echo '<b>un cliente Nacional :</b> <br>';
    echo $cliente_n->mostrarDatos();
	echo '<hr>';
	echo '<b>un cliente Extranjero :</b><br>';
	//instanciar un cliente Extranjero y mostrar datos
	$cliente_e = new ClienteExtranjero('X000000A', 'Ouissam', 'Talha', 'Calle granada 123', 50000);

    echo $cliente_e->mostrarDatos();