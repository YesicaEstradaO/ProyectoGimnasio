<?php
    require_once 'modeloConexion.php';
    
    //nombre de clase
    class modeloAlimento extends modeloConexion{
        private $idAlimento;
        private $nombreAlimento;
        private $valorAlimento;
        private $aminoAlimento;
        private $caloriasAlimento;

        function  __construct($idIn, $nombreAIn, $valorAIn, $aminoAIn, $caloriasAIn )
        {
            $this->idAlimento = $idIn;
            $this->nombreAlimento = $nombreAIn;
            $this->valorAlimento = $valorAIn;
            $this->aminoAlimento = $aminoAIn;
            $this->caloriasAlimento = $caloriasAIn;
        }

        public function insertarAlimento(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try
            {
                $sql = $pdo->prepare("CALL insertarAlimento (?, ?, ?, ?);");
                $sql->execute(array($this->nombreAlimento, $this->valorAlimento, $this->aminoAlimento, $this->caloriasAlimento));
                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: " .$error->getMessage(). "<br/>";
            }
        }

        public function consultarListaAlimento(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM consultarListaAlimento;");
                $sql->execute();
                return$sql->fetchAll();
                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error:".$error->getMessage()."<br/>";
            }
        }

        public function ActualizarAlimento(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("CALL actualizarAlimento(?, ?, ?, ?, ?);");
                $sql->execute(array($this->idAlimento, $this->nombreAlimento, $this->valorAlimento, $this->aminoAlimento, $this->caloriasAlimento));
                $pdo = NULL;
            }
            catch(\Throwable $error)
            {
                echo "Error: ".$error->getMessage()."br/>";
            }
        }

        public function consultarXidAlimento()
		{ 
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
               
                $sql = $pdo->prepare("SELECT * FROM alimento WHERE idAlimento = :idAlimento;" );
                $sql->bindParam(":idAlimento", $this->idAlimento);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error por consulta:".$error->getMessage()."</br>";
                die();
            }
        }

        public function eliminarAlimento(){
            $conector = new modeloConexion();
            $pdo = $conector::conectar();
            try{
                $sql = $pdo->prepare("CALL eliminarAlimento(?);");
                $sql->execute(array($this->idAlimento));
                $pdo = NULL;
            }
            catch(\Throwable $error){
                echo "Error:".$error->getMessage()."/br>";
                die();
            
            }
        }
    }
?>