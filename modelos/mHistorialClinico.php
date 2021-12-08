<?php

    require_once 'modeloConexion.php';

    class mHistorialClinico extends modeloConexion
    {
        private $idHistorialClinico;
        private $eps;
        private $medicacionesFk;
        private $detalleMedicacion;
        private $tipoCirugiaFk;
        private $detalleCirugia;
        private $tipoPadecimientoFk;
        private $detallePadecimiento;
        private $clienteFk;

        function __construct($idHistorialClinicoIn, $epsIn, $medicacionesFkIn, $detalleMedicacionIn, $tipoCirugiaFkIn, $detalleCirugiaIn, $tipoPadecimientoFkIn, $detallePadecimientoIn, $clienteFkIn)
        {   
            $this->idHistorialClinico = $idHistorialClinicoIn;
            $this->eps = $epsIn;
            $this->medicacionesFk = $medicacionesFkIn;
            $this->detalleMedicacion = $detalleMedicacionIn;
            $this->tipoCirugiaFk = $tipoCirugiaFkIn;
            $this->detalleCirugia = $detalleCirugiaIn;
            $this->tipoPadecimientoFk = $tipoPadecimientoFkIn;
            $this->detallePadecimiento = $detallePadecimientoIn;
            $this->clienteFk = $clienteFkIn;
        }

        public function insertarHistorialClinico()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL insertarHistorialClinico (?,?,?,?,?,?,?,?);");
                $sql->execute(array($this->eps, $this->medicacionesFk, $this->detalleMedicacion, $this->tipoCirugiaFk, $this->detalleCirugia, $this->tipoPadecimientoFk, $this->detallePadecimiento, $this->clienteFk));

                $pdo = NULL;
            } 
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }

        
        public function consultarHistorialClinico()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("SELECT * FROM consultaH;");
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

        public function actualizarHistorialClinico()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL actualizarHistorialClinico (?,?,?,?,?,?,?,?,?);");
                $sql->execute(array($this->idHistorialClinico, $this->eps, $this->medicacionesFk, $this->detalleMedicacion, $this->tipoCirugiaFk, $this->detalleCirugia, $this->tipoPadecimientoFk, $this->detallePadecimiento, $this->clienteFk));

                $pdo = NULL;
            }
            catch (\Throwable $error) 
            {
                echo "ERROR: ".$error->getMessage()."</br>";
                die();
            }
        }

        public function consultarXidHistorialClinico()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("SELECT * FROM consultarHistorialClinico WHERE idHistorialClinico = :idHistorialClinico;");
                $sql->bindParam(":idHistorialClinico", $this->idHistorialClinico);
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

        public function tablaXId()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("select * from historialclinico where clienteFk = :clienteFk;");
                $sql->bindParam(":clienteFk", $this->clienteFk);
                $sql->execute();

                return $sql->fetch(PDO::FETCH_OBJ);

                $pdo = NULL;
            }catch (\Throwable $error) 
            {
                echo "ERROR: fallo en colsulta x id en tabla ".$error->getMessage()."</br>";
                die();
            }
        }

        public function eliminarHistorialClinico()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL eliminarHistorialClinico (?);");
                $sql->execute(array($this->idHistorialClinico));

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
