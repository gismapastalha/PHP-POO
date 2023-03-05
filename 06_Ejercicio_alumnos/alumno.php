<?php 
    //incorporar clase direccion
    require_once('direccion.php'); 

    abstract class Alumno {
        //atributos de los objetos que instanciamos a partir de la clase
        private string $nif;
        private string $nombre;
        //private string $direccion;
        private Direccion $direccion; //indicamos que el tipo de dato va a ser un objeto de la clase Direccion
        private string $fecha;
        private int $curso;
        protected string | null $codigo;

        //atributo estático que pertence a la clase y no a los objetos
        //public static $contador = 0;
        private static $contador = 0;

        //constructor
        //public function __construct(string $nif, string $nom, string $dir, string $fec, int $cur) {
        public function __construct(string $nif, string $nom, string $tipo, string $via, string $num, string $piso, string $fec, int $cur) {
            //asignación por delegación
            $this->setNif($nif);
            $this->setNombre($nom);
            //$this->setDireccion($dir);
            $this->setDireccion($tipo, $via, $num, $piso);
            $this->setFecha($fec);
            $this->setCurso($cur);
            
            $this->codigo = null;
            //incrementar el contador
            self::$contador++;
        }

        //getters y setters
        public function setNif(string $nif): void {
            //nif obligatorio suprimiendo los espacios en blanco
            if (empty(trim($nif))) {
                throw new Exception("Nif obligatorio");
            }
            $this->nif = $nif;
        }
        public function setNombre(string $nom): void {
            //nombre obligatorio
            if (empty(trim($nom))) {
                throw new Exception("Nombre obligatorio");
            }
            $this->nombre = $nom;
        }
        /*
        public function setDireccion(string $dir): void {
            //dirección obligatoria
            if (empty(trim($dir))) {
                throw new Exception("Dirección obligatoria");
            }
            $this->direccion = $dir;
        }
        */
        public function setDireccion(string $tipo, string $via, string $num, string $piso): void {
            //instanciación del objeto de la clase Direccion
            $this->direccion = new Direccion($tipo, $via, $num, $piso);
        }
        public function setFecha(string $fec): void {
            //fecha obligatoria
            if (empty(trim($fec))) {
                throw new Exception("Fecha obligatoria");
            }
            $this->fecha = $fec;
        }
        public function setCurso(int $cur): void {
            //validar curso informado, numérico y entre 1 y 6
            if (empty($cur) || !is_numeric($cur) || $cur <= 0 || $cur > 6) {
                throw new Exception("Curso obligatorio y entre 1 y 6");
            }
            $this->curso = $cur;
        }

        public function getNif(): string {
            return $this->nif;
        }
        public function getNombre(): string {
            return $this->nombre;
        }
        /*
        public function getDireccion(): string {
            return $this->direccion;
        }
        */
        public function getDireccion(): string {
            //para recupear el string direccion tenemos que ejecutar el método getDireccion del objeto direccion
            return $this->direccion->getDireccion();
        }
        public function getFecha(): string {
            return $this->fecha;
        }
        public function getCurso(): int {
            return $this->curso;
        }

        //método getter para el atributo estático contador (el método también es estático porque pertenece a la clase y no a los objetos)
        public static function getContador(): int {
            return self::$contador;
        }

        //otros métodos
        public function mostrarDatos(): string {
            return "$this->nif / $this->nombre / {$this->getDireccion()} / $this->fecha / $this->curso
            
            ";
        }
        //método abstracto  sin implementar. nos obliga a que toda la clase sea tb abstracta
        public abstract function codigoAlumno():void;
    }

    
