<?php

    require_once 'modeloConexion.php';

    class modeloRutina extends modeloConexion
    {
        private $idRutina;
        private $planRutina;
        private $intensidadRutina;
        private $diaRutina;
        private $clienteFK;
        private $entrenadorFK;

        //encansular 
        function __construct($idRIn, $planRIn, $intensidadRIn, $diaRIn, $idCRIN, $idEIN)

        {
            $this-> idRutina = $idRIn;
            $this-> planRutina = $planRIn;
            $this-> intensidadRutina = $intensidadRIn;
            $this-> diaRutina =  $diaRIn;
            $this-> clienteFK = $idCRIN;
            $this-> entrenadorFK = $idEIN;
        }
        public function insertarRutina(){
            
        $conector = new modeloConexion;
        $pdo = $conector::conectar();
        try
        {
            $sql = $pdo->prepare("CALL insertarRutina(?,?,?,?,?,?)");

            $sql->execute(array($this->idRutina, $this-> planRutina, $this-> intensidadRutina, 
            $this-> diaRutina, $this-> clienteFK, $this->entrenadorFK));

            $pdo = NULL;
        }
        catch(\Throwable $error)
        {
            echo "Error: ".$error->getMessage()."<br/>";
        }
    }


    public function consultarRutina()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM consultarRutina;");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
			}
		}
    
        public function actualizarRutina()
    {
        $conector =new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("CALL actualizarRutina(?,?,?,?,?,?)");
                $sql->execute(array($this-> idRutina, $this-> planRutina, $this-> intensidadRutina, 
                $this-> diaRutina, $this-> clienteFK, $this->entrenadorFK));

                $pdo = NULL;
    }
    catch(\Throwable $error){
        echo "Error: ".$error->getMessage()."<br/>";
    }
}
public function consultarXidRutina()
{
    $conector = new modeloConexion();
    $pdo = $conector::conectar();

    try{

        $sql = $pdo->prepare("SELECT * FROM Rutina WHERE idRutina = :idRutina;");

        $sql->bindParam(":idRutina", $this->idRutina);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
            }
        }

        public function eliminarRutina(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("Call eliminarRutina(?)");
                $sql ->execute(array($this->idRutina));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error: " .$error->getMessage(). "</br>";
                die();
            }

    }
}

?>