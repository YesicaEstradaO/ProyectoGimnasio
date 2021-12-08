<?php

	error_reporting(E_ERROR | E_PARSE);
	require_once '../../modelos/mObjetivo.php';

	if(empty($_GET['idObjetivoUpdate']))
	{
		header('location: C_Objetivo.php'); 
	}
	else
	{
		$idObjetivo = $_GET['idObjetivoUpdate'];
		$objObjetivo = new mObjetivo($idObjetivo, NULL, NULL, NULL, NULL);
		$consultarObjetivo = $objObjetivo->consultarXidObjetivo();
		$countObjetivo = count($consultarObjetivo);
		
		if($countObjetivo == 0) 
		{
			header('location: C_Objetivo.php'); 
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
    <link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
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

        <li><a href="../Menus/Cliente/listaRutinaC.php">Consultar Rutinas</a></li>
        <li><a href="../Menus/Cliente/listaDietaC.php">Consultar Dieta</a></li>
        <li><a href="../../vistas/historialClinico/indexHistorial_C.php">Historial Clinico</a></li>
        <li><a href="../objetivo/indexObjetivoCliente.php">Objetivos</a></li>
        <li><a href="">Usuario</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>


		<a class="backBtn fa fa-chevron-left" href="./C_Objetivo.php"></a>
		
		<h1 align="center">Actualizar Objetivo del Cliente</h1>
		<section>

			<div class="contentBx">
				<div class="formBx">
				
				<div class="inputBx">
					<span>Nombre del cliente</span>
					<input type="text" name="nameCliente" value="<?php echo $consultarObjetivo->nombreCliente; ?>" readonly>
				</div>	
				
				<form method="POST" action="../../controladores/controllerObjetivo.php">

					<div class="inputBx">
						<span>Documento del Cliente</span>
						<input type="text" name="docClienteUpdate" value="<?php echo $consultarObjetivo->docCliente; ?>" readonly>
					</div>		
					<div class="inputBx">
						<span>Descripcion</span><br>
						<input type="hidden" name="idObjetivoUpdate" value="<?php echo $consultarObjetivo->idObjetivo; ?>">
						<input type="text" name="descripcionUpdate" value="<?php echo $consultarObjetivo->descripcion; ?>">					</div>
					<div class="inputBx">
						<span>Fecha de inicio de Objetivo</span>
						<input name="fechaInicioUpdate" value="<?php echo $consultarObjetivo->fechaInicio; ?>">
					</div>
					<div class="inputBx">
						<span>Fecha de cumplimiento de Objetivo</span>
						<input name="fechaCumplimientoUpdate" value="<?php echo $consultarObjetivo->fechaCumplimiento; ?>">
					</div>
					
					<div class="inputBx">
						<input type="submit" value="Registrar">
					</div>

				</form>
				
			</div>
			</div>
			
		</section>
</body>
</html>