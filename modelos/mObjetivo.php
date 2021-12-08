<?php

    require_once 'modeloConexion.php';

    class mObjetivo extends modeloConexion
    {
        private $idObjetivo;
        private $descripcion;
        private $fechaCumplimiento;
        private $fechaInicio;
        private $clienteFk;

        function __construct($idObjetivoIn, $descripcionIn, $fechaCumplimientoIn, $fechaInicioIn, $clienteFkIn)
        {   
            $this->idObjetivo = $idObjetivoIn;
            $this->descripcion = $descripcionIn;
            $this->fechaCumplimiento = $fechaCumplimientoIn;
            $this->fechaInicio = $fechaInicioIn;
            $this->clienteFk = $clienteFkIn;
        }

        public function insertarObjetivo()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL insertarObjetivo (?,?,?,?);");
                $sql->execute(array($this->descripcion, $this->fechaCumplimiento, $this->fechaInicio, $this->clienteFk));

                $pdo = NULL;
            } 
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }

        public function consultarObjetivo()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("SELECT * FROM consultarXidObjetivo;");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
                $pdo = NULL;
            } 
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }

        
        public function actualizarObjetivo()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL actualizarObjetivo (?,?,?,?,?);");
                $sql->execute(array($this->idObjetivo, $this->descripcion, $this->fechaCumplimiento, $this->fechaInicio, $this->clienteFk));

                $pdo = NULL;
            }
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }

        public function consultarXidObjetivo()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("SELECT * FROM consultarXidObjetivo WHERE idObjetivo = :idObjetivo;");
                $sql->bindParam(":idObjetivo", $this->idObjetivo);
                $sql->execute();

                return $sql->fetch(PDO::FETCH_OBJ);

                $pdo = NULL;
            } 
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }

        public function eliminarObjetivo()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL eliminarObjetivo (?);");
                $sql->execute(array($this->idObjetivo));

                $pdo = NULL;
            } 
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }   
    }
?>