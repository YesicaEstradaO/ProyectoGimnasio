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
    <link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
	<link rel="stylesheet" type="text/css" href="../../css/histCli.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
	<title>F_Objetivo Cliente</title>
</head>
<body>
<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="../Menus/Cliente/menu.php"><label class="logo">Cliente</label></a>
	<ul>

        <li><a href="./listaRutinaC.php">Consultar Rutinas</a></li>
        <li><a href="./listaDietaC.php">Consultar Dieta</a></li>
        <li><a href="../../../vistas/historialClinico/indexHistorial_C.php">Historial Clinico</a></li>
        <li><a href="../objetivo/indexObjetivoCliente.php">Objetivos</a></li>
        <li><a href="">Usuario</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="../../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>


		<a class="backBtn fa fa-chevron-left" href="./F_Objetivo.php"></a>
		
		<h1 align="center">Consultar el cliente <br> para insercion de Objetivo</h1>
		<section>

			<div class="contentBx">
				<div class="formBx">
				
				<form method="POST" action="./F_Objetivo.php">
					<div class="inputBx">
						<span>Documento del Cliente</span>
						<input type="number" name="docCliente">
					</div>

					<div class="inputBx">
						<input type="submit" value="Consultar">
					</div>
				</form>
				
			</div>
			</div>
			
		</section>
</body>
</html>