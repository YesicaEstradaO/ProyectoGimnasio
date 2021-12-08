<?php

    require_once 'modeloConexion.php';

    class modeloAdmin extends modeloConexion
    {
        private $docAdministrador;
        private $celAdministrador;
        private $correoAdministrador;
        private $direcAdministrador; 
        private $estado;
        private $nombreAdministrador;
        private $usuarioFk;

        function __contruct($docAIn, $celAIn, $correoAIn, $direcAIn, $estadoIn, $nombreAIn, $usuarioAIn)
        {
            $this->docAdministrador = $docAIn;
            $this->celAdministrador= $celAIn;
            $this->correoAdministrador = $correoAIn;
            $this->direcAdministrador = $direcAIn;
            $this->estado = $estadoIn;
            $this->nombreAdministrador = $nombreAIn;
            $this->usuarioFk = $usuarioAIn;
        }
        
        public function consultarAdmin(){
            
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM consultaAdmin; ");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
        }
        public function insertarAdministrador()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try
			{
				$sql = $pdo->prepare("CALL insertarAdmin(?,?,?,?,?,?,?); "); 
				$sql->execute(array($this->docAdministrador, $this->celAdministrador, $this->correoAdministrador, $this->direcAdministrador, $this->estado, $this->nombreAdministrador, $this->usuarioFk));
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error insercion: ".$error->getMessage()."<br/>";
			}
		}
        public function actualizarAdmin()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("CALL actualizarAdmin(?, ?, ?, ?, ?, ?, ?); ");
				$sql->execute(array($this->docAdministrador, $this->celAdministrador, $this->correoAdministrador, $this->direcAdministrador, $this->estado, $this->nombreAdministrador, $this->usuarioFk));
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
		}
        public function consultarXidAdmin() 
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM administrador WHERE docAdministrador = :docAdministrador;");
				$sql->bindParam(":docAdministrador", $this->docAdministrador);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
		}

        public function listaFk()
        {
            $conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM administrador WHERE docAdministrador = :docAdministrador;");
				$sql->bindParam(":docAdministrador", $this->docAdministrador);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
        }
    }