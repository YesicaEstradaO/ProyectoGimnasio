<?php 
    require_once 'modeloConexion.php';

    class modeloParteCuerpo extends modeloConexion{
        private $idParteCuerpo;
        private $nombreParteCuerpo;

        function __construct($IdIn, $nombrePIn)
        {
            $this->idParteCuerpo = $IdIn;
            $this->nombreParteCuerpo = $nombrePIn;
            
        }

        public function insertarParteCuerpo(){
            
            $conector= new modeloConexion();
            $pdo = $conector::conectar();

            try{

                $sql = $pdo->prepare("CALL insertarParteCuerpo(?);");
                $sql-> execute(array($this->nombreParteCuerpo));
                $pdo = NULL;

            }
            catch(\Throwable $error){
                echo "Error: ".$error->getMessage()."<br/>";
            }
        
    }

    public function consultarParteCuerpo(){
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try{
            $sql = $pdo->prepare("SELECT * FROM consultarListaParteCuerpo;");
            $sql->execute();
            return$sql->fetchAll(PDO::FETCH_OBJ);
            $pdo = NULL;
        }
        catch(\Throwable $error)
        {
            echo "Error:".$error->getMessage()."<br/>";
        }
    }

    public function ActualizarParteCuerpo(){
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try{
            $sql = $pdo->prepare("CALL actualizarParteCuerpo(?,?);");
            $sql->execute(array($this->idParteCuerpo, $this->nombreParteCuerpo));
            $pdo = NULL;
        }
        catch(\Throwable $error)
        {
            echo "Error: ".$error->getMessage()."br/>";
        }
    }
    public function consultarXidParteCuerpo()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM partecuerpo WHERE idParteCuerpo = :idParteCuerpo;");
				$sql->bindParam(":idParteCuerpo", $this->idParteCuerpo);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
		}

        public function eliminarParteCuerpo()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try
			{
				$sql = $pdo->prepare("CALL eliminarParteCuerpo(?); ");
				$sql->execute(array($this->idParteCuerpo));
				$pdo = NULL;
			}
			catch(\Throwable $error){
				echo "Error: ".$error->getMessage()."</br>";
				die();
			}
		}
    }
?>