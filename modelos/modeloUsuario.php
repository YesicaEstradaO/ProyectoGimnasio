<?php

    require_once 'modeloConexion.php';

    class modeloUsuario extends modeloConexion
    {
        private $docUsuario;
        private $celUsuario;
        private $contrasenaUsuario;
        private $correoUsuario;
        private $nombreUsuario;
        private $tipoUsuario;

        //encapsular
        function __construct($docUIn, $celUIn, $contraUIn, $correoUIn, $nombreUIn, $tipoUIn)
        {
            $this->docUsuario= $docUIn;
            $this->celUsuario= $celUIn;
            $this->contrasenaUsuario= $contraUIn;
            $this->correoUsuario= $correoUIn;
            $this->nombreUsuario= $nombreUIn;
            $this->tipoUsuario= $tipoUIn;
        }

        //metodos

        //consultar usuarios

        public function consultaLogin()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("SELECT * FROM consultaLogin WHERE correoUsuario = :user;");
				$sql->bindParam(":user",$this->correoUsuario);
				$sql->execute();
				return $sql->fetch(PDO::FETCH_OBJ);
				$pdo = NULL;
			}catch(\Throwable $error){
				echo "Error: ".$error->getMessage()."<br/>";
				die();
			}
		}

        public function consultarUsuario(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql = $pdo->prepare("SELECT * FROM consultarUsuarios;");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
                $pdo = NULL;
            }catch(\Throwable $error)
            {
                // echo "Error: ".$error->getMessage()."<br/>";
                die();
            }
        }

        public function insertarUsuario(){

            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try 
            {
                $sql = $pdo->prepare("CALL insertarUsuario (?,?,?,?,?,?);");
                $sql->execute(array($this->docUsuario, $this->celUsuario, $this->contrasenaUsuario, $this->correoUsuario, $this->nombreUsuario, $this->tipoUsuario));
                $pdo=NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error insercion: ".$error->getMessage()."<br/>";
			}
        }
        public function actualizarUsuario()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql=$pdo->prepare("CALL actualizarUsuario(?,?,?,?,?,?)");
                $sql->execute(array($this->docUsuario, $this->celUsuario, $this->contrasenaUsuario, $this->correoUsuario, $this->nombreUsuario, $this->tipoUsuario));
                $pdo = NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error Actualizacion: ".$error->getMessage()."<br/>";

			}
        }

    public function consultarXIdU()
    {
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try{
            $sql = $pdo->prepare("SELECT * FROM usuario WHERE docUsuario = :docUsuario;");
            $sql->bindParam(":docUsuario", $this->docUsuario);
            $sql->execute();
            return $sql->fetch(PDO::FETCH_OBJ);
            $pdo = NULL;
        }catch(\Throwable $error){
            echo "Error consultaXId:".$error->getMessage()."</br>";
            die();
        }
    }

    public function eliminarUsuario()
    {
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        try
        {
            $sql = $pdo->prepare("CALL eliminarUsuario(?);");
            $sql->execute(array($this->docUsuario));
            $pdo = NULL;
        }catch(\Throwable $error){
            echo "Error eliminacion:".$error->getMessage()."</br>";
            die();
        }
    }

    public function tUsuarios()
    {
        $conector = new modeloConexion();
        $pdo = $conector::conectar();

        
        try{
            $sql = $pdo->prepare("select idTipoUsuario, nombreTipoUsuario from tipousuario;");
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_OBJ);
            $pdo = NULL;
        }catch(\Throwable $error)
        {
            echo "Error: ".$error->getMessage()."<br/>";
            die();
        }
        
    }

}
?>