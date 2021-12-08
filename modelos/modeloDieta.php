<?php 
    require_once 'modeloConexion.php';
  
    

    class modeloDieta extends modeloConexion{
        private $idDieta;
        private $fechaInicio;
        private $fechaFin;
        private $diaDieta;
        private $planDieta;
        private $clienteFk;
        private $entrenadorFk;

        function __construct($idDIn, $fechaIniDIn, $fechaFDIn, $diaDIn, $planDIn, $idCIn, $idEIn)
        {
            $this-> idDieta = $idDIn;
            $this-> fechaInicio = $fechaIniDIn;
            $this-> fechaFin = $fechaFDIn;
            $this-> diaDieta = $diaDIn;
            $this-> planDieta = $planDIn;
            $this-> clienteFk = $idCIn;
            $this-> entrenadorFk = $idEIn;

        }

        public function insertarDieta()
        {
            $conector = new modeloConexion;
            $pdo = $conector::conectar();
            try
            {
                $sql = $pdo->prepare("CALL insertarDieta(?,?,?,?,?,?,?)");

                $sql->execute(array($this->idDieta, $this->fechaInicio, $this->fechaFin, $this->diaDieta, $this->planDieta, $this->clienteFk, $this->entrenadorFk));

                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: ".$error->getMessage()."<br/>";
                die();
            }
            
        }

        public function consultarListaD()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM consultarListaDieta;");
                $sql->execute();
                return $sql->fetchAll();
                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: ".$error->getMessage()."<br/>";
                
            }
        }
        public function actualizarDieta()
        {
            $conector =new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("CALL actualizarDieta(?,?,?,?,?,?,?)");
                $sql->execute(array($this->idDieta, $this->fechaInicio, $this->fechaFin, $this->diaDieta, $this->planDieta, $this->clienteFk, $this->entrenadorFk));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error al actualizar: ".$error->getMessage()."<br/>";
            }
        }
        public function consultarXidDieta()
        {
            $conector = new modeloConexion();
			$pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM dieta WHERE idDieta = :idDieta;");
                $sql->bindParam(":idDieta", $this->idDieta);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
            }
        }

        public function eliminarDieta(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("Call eliminarDieta(?)");
                $sql ->execute(array($this->idDieta));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error: " .$error->getMessage(). "</br>";
                die();
            }

    }
}
?>