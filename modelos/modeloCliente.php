 <?php

    require_once 'modeloConexion.php';

    class modeloCliente extends modeloConexion
    {
        private $docCliente;
        private $alturaCliente;
        private $apellidoCliente;
        private $celCliente;
        private $estado;
        private $nombreCliente;
        private $pesoCliente;
        private $entrenadorFk;
        private $usuarioFk;

        function __construct($docCIn, $altCIn, $apeCIn, $celCIn, $estadoIn, $nomCIn, $pesoCIn, $docEnIn, $docUsIn)
        {
            $this->docCliente = $docCIn;
            $this->alturaCliente = $altCIn;
            $this->apellidoCliente = $apeCIn;
            $this->celCliente = $celCIn;
            $this->estado = $estadoIn;
            $this->nombreCliente = $nomCIn;
            $this->pesoCliente = $pesoCIn;
            $this->entrenadorFk = $docEnIn;
            $this->usuarioFk = $docUsIn;
            
        }
        
        public function insertarCliente()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try
            {
                $sql = $pdo->prepare("CALL insertarCliente(?,?,?,?,?,?,?,?,?);");
                $sql->execute(array( $this->docCliente, $this->alturaCliente, $this->apellidoCliente, $this->celCliente, $this->estado, $this->nombreCliente, $this->pesoCliente, $this->entrenadorFk,$this->usuarioFk));
                $pdo = NULL;
            }catch(\Throwable $error)
			{
				echo "Error al insertar: ".$error->getMessage()."<br/>";
			}
        }
        
        public function actualizarCliente()
		{
			$conector = new modeloConexion();
			$pdo = $conector::conectar();

			try{
				$sql = $pdo->prepare("CALL actualizarCliente(?,?,?,?,?,?,?,?,?);");
                $sql->execute(array( $this->docCliente, $this->alturaCliente, $this->apellidoCliente, $this->celCliente, $this->estado, $this->nombreCliente, $this->pesoCliente, $this->entrenadorFk,$this->usuarioFk));
				$pdo = NULL;
			}
			catch(\Throwable $error)
			{
				echo "Error actualizar: ".$error->getMessage()."<br/>";
			}
		}
        public function consultarXIdC(){
            
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try{
                $sql=$pdo->prepare("SELECT * FROM cliente WHERE docCliente = :docCliente;");
                $sql->bindParam(":docCliente", $this->docCliente);
                $sql->execute();
                return $sql->fetch(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error){
				echo "Error:".$error->getMessage()."</br>";
				die();
			}
        }

         

        public function consultarCliente()
        {
            $conector = new modeloConexion();
            $pdo = $conector::conectar();

            try
            {
                $sql=$pdo->prepare("SELECT * FROM consultarClientes;");
                $sql->execute();
                return $sql->fetchAll(PDO::FETCH_OBJ);
                $pdo = NULL;
            }
            catch(\Throwable $error)
			{
				echo "Error en consulta: ".$error->getMessage()."<br/>";
			}
        }
            public function eliminarCliente()
            {
                $conector = new modeloConexion();
                $pdo = $conector::conectar();

                try
                {
                    $sql = $pdo->prepare("CALL eliminarCliente(?); ");
                    $sql->execute(array($this->docCliente));
                    $pdo = NULL;
                }catch(\Throwable $error)
                {
                    echo "Error en eliminacion: ".$error->getMessage()."<br/>";
                }
            }
        }
?> 