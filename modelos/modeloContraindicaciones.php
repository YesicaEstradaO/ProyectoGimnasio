<?php

    require_once 'modeloConexion.php';

    class modeloContraindicaciones extends modeloConexion
    {
        private $idContraindicaciones;
        private $descricionContraindicaciones;

        //encapsular
        function __construct($idIn, $descripcionTIn)
        {
            $this->idContraindicaciones = $idIn;
            $this->descricionContraindicaciones = $descripcionTIn;
            
        }

      

        public function InsertarContraindicaciones(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL insertarContraindicaciones(?,?);");
                $sql->execute(array( $this->idContraindicaciones, $this->descricionContraindicaciones));
                $pdo = NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
        }
        public function consultarContraindicaciones()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM consultarContraindicaciones;");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
		}

        public function actualizarContraindicaciones()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL actualizarContraindicaciones(?,?);");
                $sql->execute(array( $this->idContraindicaciones, $this->descricionContraindicaciones));

                $pdo = NULL;
            }
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }
    
        public function consultarXidC()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM Contraindicaciones WHERE idContraindicaciones = :idContraindicaciones;");
				$sql->bindParam(":idContraindicaciones", $this->idContraindicaciones);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
		}

        public function eliminarContraindicaciones()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try
			{
				$sql = $pdo->prepare("CALL eliminarContraindicaciones(?); ");
				$sql->execute(array($this->idContraindicaciones));
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
		}


    }
   
		

    
    ?>