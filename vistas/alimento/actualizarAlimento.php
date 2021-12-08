<?php 
    //error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloAlimento.php';
    if(empty($_GET['idAlimentoUpDate'])){
        header('location: listaAlimentos.php');
    }
    else{
        $idAlimento = $_GET['idAlimentoUpDate'];
        $objAlimento = new modeloAlimento($idAlimento, null, null, null, null); 

        $consultaAlimento = $objAlimento->consultarXidAlimento();
        $countAlimento = count(array($consultaAlimento));
        if($countAlimento == 0){
            header('location: listaAlimentos.php');
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
				    <h2>Alimentos</h2>
				    <form method="POST" action="../../controladores/controladorAlimento.php">
                        <div class="inputBx">
                            <span>Nombre</span>
                            <input type="hidden" name="idAlimentoUpDate" value="<?php echo $consultaAlimento->idAlimento; ?>"></br>
                            <input type="text" name="nombreAlimentoUpDate" value="<?php echo $consultaAlimento->nombreAlimento ; ?>"></br>

                        </div>
                        <div class="inputBx">
                            <span>Valor Nutricional</span>
                            <input type="number" name="valorAlimentoUpDate" value="<?php echo $consultaAlimento->valorNutricional; ?>"></br>
                        </div>
                        <div class="inputBx">
                            <span>Aminoacidos x Porción</span>
                            <input type="number" name="aminoAlimentoUpDate" value="<?php echo $consultaAlimento->aminoacidosXporcion; ?>"></br>
                        </div>
                        <div class="inputBx">
                            <span>Calorias x Porción</span>
                            <input type="number" name="caloriasAlimentoUpDate" value="<?php echo $consultaAlimento->caloriasXporcion ?>"></br>
                        
                        
                        </div>
            
                        
                        <div class="inputBx">
                            <input type="submit" value="Actualizar"></br>
                        </div>

					

				    </form>

                    <a href="ListaAlimentos.php"> Regresar</a>
				
			    </div>
			</div>
			
		</section>
</body>
</html>
</html>