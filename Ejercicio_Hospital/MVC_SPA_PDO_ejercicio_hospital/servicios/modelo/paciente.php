<?php

    //incorporar fechero de connexion
    require_once('conexionhospital.php');
    class Paciente extends conexion{
        public function alta(string $nif, string $nombre, string $apellidos, string $fechaingreso){
            try {
                //validar los datos
                $this->ValidarDatos($nif, $nombre, $apellidos, $fechaingreso);
                //confeccionar la sentencia sql
                $sql = "INSERT INTO paciente VALUES (NULL, :nif, :nombre, :apellidos, :fechaingreso, NULL )";
                //preparar la sentencia
                $stmt = $this->conexionHospital->prepare($sql);
                //blind la sentencia
                $stmt->bindParam(':nif', $nif);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':fechaingreso', $fechaingreso);

                $stmt->execute();
                //respuesta al controlador
                return['codigo' => '00', 'texto' => 'Alta efectuada'];
            } catch (PDOException $e) {
                if($e->errorInfo[1] == 1062){
                    throw new Exception("Nif del paciente ya existe en la base de datos", 10);
                    
                    //echo "Nif del paciente ya existe en la base de datos";
                }
                throw new Exception( $e->getMessage(), (int) $e->getCode());	
            }
            
        }
        //metodo de consulta de pacientes
        public function consulta(int $pagina, int $filas): array{
            try {
                //calcular el registro a partie del cual se realizara la consulta
                $fila_consulta = ($pagina -1) * $filas;
                //confeccionar la sentencia sql
                $sql = "SELECT * FROM paciente ORDER BY nombre, apellidos LIMIT $fila_consulta, $filas";
                //preparar la sentencia
                $stmt = $this->conexionHospital->prepare($sql);
                //ejecutar la sentencia
                $stmt->execute();

                $pacientes = $stmt->fetchAll();

                //obtener el numero de paginas a mostrar 
                $paginas = $this->calcularPaginas($filas);
                //$paginas->calcularPaginas();
                return['codigo' => '00', 'pacientes' => $pacientes, 'paginas' => $paginas];

            } catch (PDOException $e) {
                throw new Exception( $e->getMessage(), (int) $e->getCode());
            }
        }

        //método de consulta de un paciente
        public function consultaPaciente(int $id):array{
            try {
                //validar id informado
                $this->validarID($id);
                //confeccionar la sebtencia sql
                $sql = "SELECT * FROM paciente WHERE idpaciente = :id";
                //preparar la sentencia
                $stmt = $this->conexionHospital->prepare($sql);
                //blind de los parametros
                $stmt->bindParam(':id', $id);
                //ejecutar la sentencia
                $stmt->execute();
                //comprobar si se ha recuperado una fila
                if($stmt->rowCount() == 0){
                    throw new Exception("Paciente no existe", 15);
                }
                //recuperar los datos del paciente
                $paciente = $stmt->fetch();
                //confecionar la respuesta
                return['codigo' => '00', 'paciente' => $paciente];
            } catch (PDOException $e) {
                throw new Exception( $e->getMessage(), (int) $e->getCode());
            }
            
        }

        //modificar
        public function modificacion(int $id, string $nif, string $nombre, string $apellidos, string $fechaingreso, string $fechaalta):array{
            try {
                //validar los datos
                $this->validarId($id);
                $this->ValidarDatos($nif, $nombre, $apellidos, $fechaingreso);
                //comprobar fecha alta
                if(empty($fechaalta)){
                    $fechaalta = null;
                }
                //confeccionar la sentencia sql
                $sql = "UPDATE paciente SET nif = :nif, nombre = :nombre, apellidos = :apellidos, fechaingreso = :fechaingreso,  fechaalta = :fechaalta WHERE idpaciente = :id";
                //preparar la sentencia
                $stmt = $this->conexionHospital->prepare($sql);
                //blind la sentencia
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':nif', $nif);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':apellidos', $apellidos);
                $stmt->bindParam(':fechaingreso', $fechaingreso);
                $stmt->bindParam(':fechaalta', $fechaalta);

                $stmt->execute();

                if($stmt->rowCount() == 0){
                    throw new Exception("Paciente no existe no se han modificado datos", 15);
                }

                //respuesta al controlador
                return['codigo' => '00', 'texto' => 'modificacion efectuada'];
            } catch (PDOException $e) {
                if($e->errorInfo[1] == 1062){
                    throw new Exception( "Nif del paciente ya existe en la base de datos", 10);
                }
                throw new Exception( $e->getMessage(), (int) $e->getCode());	
            }
        }

        public function baja(int $id):array{
            try {
                //validar los datos
                $this->validarId($id);
                //confeccionar la sentencia sql
                $sql = "DELETE FROM paciente  WHERE idpaciente = :id";
                //preparar la sentencia
                $stmt = $this->conexionHospital->prepare($sql);
                //blind la sentencia
                $stmt->bindParam(':id', $id);
                $stmt->execute();

                if($stmt->rowCount() == 0){
                    throw new Exception("Paciente no existe", 15);
                }

                //respuesta al controlador
                return['codigo' => '00', 'texto' => 'Baja efectuada'];
            } catch (PDOException $e) {
                throw new Exception( $e->getMessage(), (int) $e->getCode());	
            }
        }
        //metodo de validar datos
        private function ValidarDatos(string $nif, string $nombre, string $apellidos, string $fechaingreso):void{
            if(empty($nif)){
                throw new Exception("Nif obligatorio", 10);
                
            }
            if(empty($nombre)){
                throw new Exception("Nombre obligatorio", 10);
                
            }
            if(empty($apellidos)){
                throw new Exception("Apellidos obligatorios", 10);
                
            }
            if(empty($fechaingreso)){
                throw new Exception("Fecha de ingreso obligatoria", 10);
                
            }
        }

        //metodo de calculo de paginas
        public function calcularPaginas(int $filas): int{
                //confeccionar la sentencia sql para contar el numero de filas de la tabla
                $sql = "SELECT COUNT(*) AS numfilas FROM paciente";
                //preparar la sentencia
                $stmt = $this->conexionHospital->prepare($sql);
                //ejecutar la sentencia
                $stmt->execute();

                $numfilas = $stmt->fetch();
                //calcular el numero de paginas
                return ceil($numfilas['numfilas'] / $filas);
        }
        //método para validar el id del paciente
        private function validarId(int $id):void{
            if(empty($id) || !is_numeric($id) || $id <=0){
                throw new Exception("Se debe selecionar un paciente", 30);
                
            }
        }


    }
