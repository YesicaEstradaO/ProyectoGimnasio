<?php

    require_once 'modeloConexion.php';

    class modeloProteina extends modeloConexion
    {
        private $idProteina;
        private $nombreProteina;
        private $marcaProteina;
        private $usoProteina;
        private $clienteFk;
        private $entrenadorFk;

        function __construct($idPIn, $nomPIn, $marcaPIn,$usoPIn,$clienFk,$entrenFk)
        {
            $this->idProteina = $idPIn;
            $this->nombreProteina = $nomPIn;
            $this->marcaProteina = $marcaPIn;
            $this->usoProteina = $usoPIn;
            $this->clienteFk = $clienFk;
            $this->entrenadorFk =$entrenFk;
        }
        
        public function consultarProteina()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM consultarProteina;");
				$sql->execute();
				return $sql->fetchAll();
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
		}
        public function insertarProteina()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try
			{
				$sql = $pdo->prepare("CALL insertarProteina (?, ?, ?, ?, ?); "); 
				$sql->execute(array($this->nombreProteina, $this->marcaProteina, $this->usoProteina, $this->clienteFk, $this->entrenadorFk));
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error insercion: ".$error->getMessage()."<br/>";
			}
		}
    public function actualizarProteina()
    {
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try{
            $sql = $pdo->prepare("CALL actualizarProteina(?, ?, ?, ?, ?, ?); ");
            $sql->execute(array($this->idProteina,$this->nombreProteina, $this->marcaProteina, $this->usoProteina, $this->clienteFk, $this->entrenadorFk));
            $pdo = NULL;
        }
        catch(\Throwable $error)
        {
            echo "Error: ".$error->getMessage()."<br/>";
        }
    }
    public function consultarXIdP()
    {
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try{
            $sql = $pdo->prepare("SELECT * FROM proteina WHERE idProteina = :idProteina;");
            $sql->bindParam(":idProteina", $this->idProteina);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_OBJ);
            $pdo = NULL;
        }
        catch(\Throwable $error){
            echo "Error:".$error->getMessage()."</br>";
            die();
        }
    }
    public function eliminarProteina()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try
			{
				$sql = $pdo->prepare("CALL eliminarProteina(?); ");
				$sql->execute(array($this->idProteina));
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
		}
    }