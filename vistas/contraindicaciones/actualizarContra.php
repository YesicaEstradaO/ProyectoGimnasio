<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloContraindicaciones.php';

    if(empty($_GET['idContraindicacionesUpDate']))
    {
        header('location: listaContraindicaciones.php');
    }
    else{
        $idContraindicaciones = $_GET['idContraindicacionesUpDate'];
        $objContraindicaciones = new modeloContraindicaciones($idContraindicaciones, NULL);
        $consultaContraindicaciones = $objContraindicaciones->consultarXidC();
        $countContra = count(array($consultaContraindicaciones));
        if($countContra == 0){
            header('location: listaContraindicaciones.php');
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
				<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
				<h2>Registrar</h2>
				<form class="formi" method="POST" action="../../controladores/controladorContraindicaciones.php">
					<div class="inputBx">
                        <input type="hidden" name="idUpDate" value="<?php echo $consultaContraindicaciones->idContraindicaciones; ?>">
						<span>Nombre Contraindicacion</span>
						<input type="text" name="nombreUpdate" value="<?php echo $consultaContraindicaciones->descricionContraindicaiones; ?>">
						
					</div>
				
					</div>
					
					<div class="inputBx">
						<input type="submit" value="Guardar" >
					</div>

					

				</form>
				
			</div>
			</div>
			
		</section>
</body>
</html>