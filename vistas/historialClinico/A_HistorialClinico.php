<?php

	error_reporting(E_ERROR | E_PARSE);
	require_once '../../modelos/mHistorialClinico.php';

	if(empty($_GET['idHistorialClinicoUpdate']))
	{
		header('location: F_HistorialClinico.php'); 
	}
	else
	{
		$idHistorialClinico = $_GET['idHistorialClinicoUpdate'];
		$objHistorialClinico = new mHistorialClinico($idHistorialClinico, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
		$consultarHC = $objHistorialClinico->consultarXidHistorialClinico();
		$countHC = get_class($consultarHC);
		
		if($countHC == 0) 
		{
			header('location: F_HistorialClinico.php'); 
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
	<link rel="stylesheet" type="text/css" href="../../css/histCli.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
	<title>F_Historial Clinico</title>
</head>
<body>
<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<label class="logo">Cliente</label>
	<ul>

        <li><a href="../Menus/Cliente/listaRutinaC.php">Consultar Rutinas</a></li>
        <li><a href="../Menus/Cliente/listaDietaC.php">Consultar Dieta</a></li>
        <li><a href="indexHistorial_C.php">Historial Clinico</a></li>
        <li><a href="">Objetivos</a></li>
        <li><a href="">Usuario</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Salir</a></li>


	</ul>
</nav>


		<a class="backBtn fa fa-chevron-left" href="./C_HistorialClinico.php"></a>
		
		<h1 align="center">Formulario del Historial Clinico</h1>
		<h5 align="center">Las casillas que contengan un <span class="Rq">(*)</span> son obligatorias</h5>

		<section>

			<div class="contentBx">
				<div class="formBx">
				
				<form method="POST" action="../../controladores/controllerHistorialClinico.php">
					<div class="inputBx">
						<span>Documento del Cliente</span>
						<input type="number" name="docClienteUpdate" value="<?php echo $consultarHC->docCliente; ?>" readonly>
					</div>
					<div class="inputBx">
						<span>Nombre</span>
						<input type="text" value="<?php echo $consultarHC->nombreCliente; ?>" readonly>
					</div>
					<div class="inputBx">
						<span>Apellido</span>
						<input type="text" value="<?php echo $consultarHC->apellidoCliente; ?>" readonly>
					</div>
					<div class="inputBx">
						<span>Celular</span>
						<input type="number" value="<?php echo $consultarHC->celCliente; ?>" readonly>
					</div>
					<div class="inputBx">
						<span>Eps<span style="color: red;">*</span></span>
						<input type="hidden" name="idHistorialClinicoUpdate" value="<?php echo $consultarHC->idHistorialClinico; ?>">
						<input type="text" name="epsUpdate" value="<?php echo $consultarHC->eps; ?>">
					</div>
					<div class="inputBx">
						<span>Estatura(Cm)</span>
						<input type="number" placeholder="170" value="<?php echo $consultarHC->alturaCliente; ?>" readonly>
					</div>
					<div class="inputBx">
						<span>Peso(Kg)</span>
						<input type="number" placeholder="705" value="<?php echo $consultarHC->pesoCliente; ?>" readonly>
					</div>
					<div class="inputBx">
						<span>Tipos de medicaciones<span style="color: red;">*</span></span>
						<select name="tipoMedicacionesUpdate">
							<option value="<?php echo $consultarHC->idMedicamentos; ?>"><?php echo $consultarHC->nombreMedicamentos; ?></option>
							<option value="1">Para la alergia</option>
							<option value="2">Para la hipertension</option>
							<option value="3">Para asma</option>
							<option value="4">Para la hipotensión</option>
							<option value="5">Ninguna</option>
							<option value="6">Otro</option>
						</select>
					</div>
					<div class="inputBx">
						<span>Si selecionó (Otro) porfavor diganos cual</span>
						<input type="text" name="detalleMUpdate" value="<?php echo $consultarHC->detalleMedicacion; ?>">
					</div>
					<div class="inputBx">
						<span>Tipos de padecimientos<span style="color: red;">*</span></span>
						<select name="tipoPadecimientosUpdate">
							<option value="<?php echo $consultarHC->idTipoPadecimiento; ?>"><?php echo $consultarHC->nombreTipoPadecimiento; ?></option>
							<option value="1">Asma</option>
							<option value="2">Hipertensión</option>
							<option value="3">Hipotensión</option>
							<option value="4">Alergias</option>
							<option value="5">Ninguna</option>
							<option value="6">Otro</option>
						</select>
					</div>
					<div class="inputBx">
						<span>Si selecionó (Otro) ó (Alergias) porfavor denos mas detalles</span>
						<input type="text" name="detallePUpdate" value="<?php echo $consultarHC->detallePadecimiento; ?>">
					</div>
					<div class="inputBx">
						<span>Tipos de cirugias<span style="color: red;">*</span></span>
						<select name="tipoCirugiasUpdate">
							<option value="<?php echo $consultarHC->idTipoCirugia; ?>"><?php echo $consultarHC->nombreTipoCirugia; ?></option>
							<option value="1">Estetica</option>
							<option value="2">Urgencia</option>
							<option value="3">Ninguna</option>
							<option value="4">Otro</option>
						</select>
					</div>
					<div class="inputBx">
						<span>Si selecionó (Otro) ó (Urgencia) porfavor denos mas detalles</span>
						<input type="text" name="detalleCUpdate" value="<?php echo $consultarHC->detalleCirugia; ?>">
					</div>

					
					<div class="inputBx">
						<input type="submit" value="Registrar" name="">
					</div>

				</form>
				
			</div>
			</div>
			
		</section>
</body>
</html>