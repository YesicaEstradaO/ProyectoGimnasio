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
	<title>Alimentos</title>
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
                            <input type="text" name="nombreAli">
                        </div>
                        <div class="inputBx">
                            <span>Valor Nutricional</span>
                            <input type="number" name="valorAli">
                        </div>
                        <div class="inputBx">
                            <span>Aminoacidos x Porción</span>
                            <input type="number" name="aminoAli">
                        </div>
                        <div class="inputBx">
                            <span>Calorias x Porción</span>
                            <input type="number" name="caloriasAli">
                        
                        
                        </div>
            
                        
                        <div class="inputBx">
                            <input type="submit" value="Registrar" name="">
                        </div>
                        <a href="ListaAlimentos.php"> Ver lista</a>
					

				    </form>
				
			    </div>
			</div>
			
		</section>
</body>
</html>