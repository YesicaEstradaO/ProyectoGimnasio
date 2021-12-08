<?php
    require_once 'modeloConexion.php';

    class modeloSeguimientoM extends modeloConexion{
        private $idSeguimiento;
        private $fechaSeguimiento;
        private $medidas;
        private $clienteFk;
        private $entrenadorFk;
        private $ParteCuerpoFk;

        //encapsular
        function __construct($idSIn, $fechaSIn, $medidasSIn, $idCIn, $idEIn, $idParteCuerpoIn)
        {
            $this-> idSeguimiento = $idSIn;
            $this-> fechaSeguimiento = $fechaSIn;
            $this-> medidas = $medidasSIn;
            $this-> clienteFk = $idCIn;
            $this-> entrenadorFk = $idEIn;
            $this-> ParteCuerpoFk = $idParteCuerpoIn;
        }

        public function insertarSeguimientoM()
        {
            $conector = new modeloConexion;
            $pdo = $conector::conectar();
            try
            {
                $sql = $pdo->prepare("CALL insertarSeguimientoM(?,?,?,?,?,?);");

                $sql->execute(array($this->idSeguimiento,  $this->fechaSeguimiento, $this->medidas, $this->clienteFk, $this->entrenadorFk, $this->ParteCuerpoFk));

                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: ".$error->getMessage()."<br/>";
                die();
            }
        }

        public function consultarListaSeguimiento()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
				$sql = $pdo->prepare("SELECT * FROM consultarListaSeguimiento;");
				$sql->execute();
				return $sql->fetchAll(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
            catch(\Throwable $error)
			{
				echo "Error: ".$error->getMessage()."<br/>";
            }
        }

        public function actualizarSeguimientoM()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try{
				$sql = $pdo->prepare("CALL actualizarSeguimientoM (?,?,?,?,?,?) ");
				$sql->execute(array($this->idSeguimiento,  $this->fechaSeguimiento, $this->medidas, $this->clienteFk, $this->entrenadorFk, $this->ParteCuerpoFk));
				$pdo = NULL;
			}
            catch(\Throwable $error){
                echo "Error: ".$error->getMessage()."<br/>";
            }
        }
        public function consultarXidSeguimientoM()
        {
            $conector = new modeloConexion();
			$pdo = $conector::conectar();
            
            try{
                $sql = $pdo->prepare("SELECT * FROM seguimientomedidas WHERE idSeguimiento = :idSeguimiento;");
                $sql->bindParam(":idSeguimiento", $this->idSeguimiento);
                $sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
            }
            catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
        }
    }

    public function eliminarSeguimiento(){
        $conector = new modeloConexion();
        $pdo = $conector::conectar();
        try{
            $sql = $pdo->prepare("Call eliminarSeguimiento(?)");
            $sql ->execute(array($this->idSeguimiento));
            $pdo = NULL;
        }
        catch(\Throwable $error){
            echo "Error: " .$error->getMessage(). "</br>";
            die();
        }
    }
}
    
?>