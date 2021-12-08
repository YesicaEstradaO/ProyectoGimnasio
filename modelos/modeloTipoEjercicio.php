<?php

    require_once 'modeloConexion.php';

    class modeloTipoEjercicio extends modeloConexion
    {
        private $idTipoEjercicios;
        private $nombreEjercicios;

        //encapsular
        function __construct($idIn, $nombreTIn)
        {
            $this->idTipoEjercicios = $idIn;
            $this->nombreEjercicios = $nombreTIn;
            
        }

      

        public function InsertarTipoEjercicio(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL InsertarTipoEjercicio (?,?);");
                $sql->execute(array( $this->idTipoEjercicios, $this->nombreEjercicios));
                $pdo = NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
        }
        public function consultarTipoEjercicio()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM consultarTipoEjercicio;");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
		}

        public function actualizarTipoEjercicio()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL actualizarTipoEjercicio (?,?);");
                $sql->execute(array($this->idTipoEjercicios, $this->nombreEjercicios));

                $pdo = NULL;
            }
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }
    

    public function consultarXTE()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM tipoejercicio WHERE idTipoEjercicios = :idTipoEjercicios;");
				$sql->bindParam(":idTipoEjercicios", $this->idTipoEjercicios);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
		}

        public function eliminarTipoejercicio(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("Call eliminarTipoejercicio(?)");
                $sql ->execute(array($this->idTipoEjercicios));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error: " .$error->getMessage(). "</br>";
                die();
            }

    }

    }
    ?>