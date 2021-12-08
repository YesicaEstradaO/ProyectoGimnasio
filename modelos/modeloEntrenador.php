<?php

    require_once 'modeloConexion.php';

    class modeloEntrenador extends modeloConexion
    {
        private $docEntrenador; 
        private $celEntrenador;
        private $direcEntrenador; 
        private $estado; 
        private $nombreEntrenador; 
        private $usuarioFk;

        //encapsular
        function __construct($docEIn,$celEIn,$dirEIn,$estadoIn,$nomEIn,$usuaFkIn){

            $this->docEntrenador = $docEIn;
            $this->celEntrenador = $celEIn;
            $this->direcEntrenador = $dirEIn;
            $this->estado = $estadoIn;
            $this->nombreEntrenador = $nomEIn;
            $this->usuarioFk = $usuaFkIn;
        }

        //metodos
        public function consultarEntrenador(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM consultarEntrenadores;");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
                $pdo = NULL;
            }catch(\Throwable $error)
            {
                echo "Error consulta: ".$error->getMessage()."<br/>";
                die();
            }
        }
        public function insertarEntrenador(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL insertarEntrenador (?,?,?,?,?,?);");
                $sql->execute(array($this->docEntrenador, $this->celEntrenador,$this->direcEntrenador, $this->estado, $this->nombreEntrenador,  $this->usuarioFk));
                $pdo=NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error insercion: ".$error->getMessage()."<br/>";
			}
        }
        public function actualizarEntrenador()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql=$pdo->prepare("CALL actualizarEntrenador(?,?,?,?,?,?)");
                $sql->execute(array($this->docEntrenador, $this->celEntrenador,$this->direcEntrenador, $this->estado, $this->nombreEntrenador,  $this->usuarioFk));
                $pdo = NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error Actualizacion: ".$error->getMessage()."<br/>";

			}
        }

    public function consultarXIdE()
    {
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try{
            $sql = $pdo->prepare("SELECT * FROM entrenador WHERE docEntrenador = :docEntrenador;");
            $sql->bindParam(":docEntrenador", $this->docEntrenador);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_OBJ);
            $pdo = NULL;
        }catch(\Throwable $error){
            echo "Error consultaXId:".$error->getMessage()."</br>";
            die();
        }
    }
        public function eliminarEntrenador()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try
            {
                $sql = $pdo->prepare("CALL eliminarEntrenador(?);");
                $sql->execute(array($this->docEntrenador));
                $pdo = NULL;
            }catch(\Throwable $error){
                echo "Error eliminacion:".$error->getMessage()."</br>";
                die();
            }
        }
    }