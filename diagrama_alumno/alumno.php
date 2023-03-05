<?php

    class Alumno {
        //atributos
        private string $nif;
        private string $nombre;
        private string $direcion;
        private string $fecha;
        private string $curso;

        public static $contador = 0;

        public function __construct(string $nif, string $nom, string $dir, string $fec, int $cur)
        {
            //asignacion por delegacion
            $this->setNif($nif);
            $this->setNombre($nom);
            $this->setDireccion($dir);
            $this->setFecha($fec);
            $this->setCurso($cur);
            self::$contador++;
        }
        public function setNif(string $nif):void{
            $this->nif = $nif;
            if (empty(trim($nif))){
                throw new Exception("Nif obligatorio");
                
            }
        }
        public function setNombre(string $nom):void{
            $this->nombre = $nom;
        }
        public function setDireccion(string $dir):void{
            $this->direccion = $dir;
        }
        public function setFecha(string $fec):void{
            $this->fecha = $fec;
        }
        public function setCurso(string $cur):void{
            $this->curso = $cur;
        }


        public function getNif():string{
            return $this->nif;
        }
        public function getNombre():string{
            return $this->nombre ;
        }
        public function getDireccion():string{
            return $this->direccion ;
        }
        public function getFecha():string{
            return $this->fecha;
        }
        public function getCurso():int{
            return $this->curso;
        }
        public function mostrarDatos(): string{
            return "$this->nif/ $this->nombre / $this->direccion / $this->fecha / $this->curso <br>";
        }
    }
    try {
        $alumno = new Alumno('400000A', 'sam sam', 'malvavisco 54','2000-09-09',6);
        echo $alumno->mostrarDatos();
        $alumno2 = new Alumno('400000A', 'sam sam', 'malvavisco 54','2000-09-09',6);
        echo $alumno2->mostrarDatos();

        echo Alumno::$contador;
    } catch (\Throwable $e) {
        echo $e->getMessage();
    }
    