<?php 
    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloParteCuerpo.php';
    if(empty($_GET['idParteCuerpoUpDate'])){
        header('location: listaParteCuerpo.php');
    }
    else{
        $idParteCuerpo = $_GET['idParteCuerpoUpDate'];
        $objParteCuerpo = new modeloParteCuerpo($idParteCuerpo, null); 

        $consultaParteCuerpo = $objParteCuerpo->consultarXidParteCuerpo();
        $countParteCuerpo = count(array($consultaParteCuerpo));
        if($countParteCuerpo == 0){
            header('location: listaParteCuerpo.php');
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/registrar.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
	<title>actualizar</title>
</head>
<body>
		<section>
			


			<div class="contentBx">
				<div class="formBx">
				    <!-- <a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a> -->
				    <h2>Parte Cuerpo</h2>
				    <form method="POST" action="../../controladores/controladorParteCuerpo.php">
                        <div class="inputBx">
                            <span>Nombre</span>
                            <input type="hidden" name="idParteCuerpoUpDate" value="<?php echo $consultaParteCuerpo->idParteCuerpo ; ?>"></br>
                            <input type="text" name="nombreParteCuerpoUpDate" value="<?php echo $consultaParteCuerpo->nombreParteCuerpo ; ?>"></br>

                        </div>

            
                        
                        <div class="inputBx">
                            <input type="submit" value="Actualizar"></br>
                        </div>

					

				    </form>

                    <a href="ListaParteCuerpo.php"> Regresar</a>
				
			    </div>
			</div>
			
		</section>
</body>
</html>
</html>