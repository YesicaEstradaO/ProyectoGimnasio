<?php

    error_reporting(E_ERROR | E_PARSE);

    require_once '../../modelos/modeloCliente.php';  
	session_start();
    
    $docCliente= $_POST['docCliente'];

    $objCliente = new modeloCliente($docCliente,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

    $consulta = $objCliente->consultarXIdC();

    $ClienteDB = $consulta->docCliente;
    $nombreClienteDB = $consulta->nombreCliente;
	$apellidoClienteDB = $consulta->apellidoCliente;
	$celClienteDB = $consulta->celCliente;
	$estaturaDB = $consulta->alturaCliente;
	$pesoDB = $consulta->pesoCliente;

	if($docCliente === $ClienteDB)
    {

    }
    elseif($docCliente !== $ClienteDB)
    {
    	header('location: C_InsertObjetivo.php');
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
	
	<link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
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

        <li><a href="../historialClinico/indexHistorial_C.php">Consultar Rutinas</a></li>
        <li><a href="../Menus/Cliente/listaDietaC.php">Consultar Dieta</a></li>
        <li><a href="../historialClinico/indexHistorial_C.php">Historial Clinico</a></li>
        <li><a href="../objetivo/indexObjetivoCliente.php">Objetivos</a></li>
        <li><a href="">Usuario</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="">Salir</a></li>


	</ul>
</nav>

		<a class="backBtn fa fa-chevron-left" href="./C_insertarHC.php"></a>
		
		<h1 align="center">Formulario del Historial Clinico</h1>
		<h5 align="center">Las casillas que contengan un <span class="Rq">(*)</span> son obligatorias</h5>

		<section>

			<div class="contentBx">
				<div class="formBx">
				
				<form method="POST" action="../../controladores/controladorHistorialClinico.php">
					<div class="inputBx">
						<span>Documento del Cliente</span>
						<input type="number" placeholder="Ingrese el documento del usuario" name="docCliente" value="<?php echo $ClienteDB?>" readonly>
					</div>
					<div class="inputBx">
						<span>Nombre</span>
						<input type="text" placeholder="Ingrese su nombre" value="<?php echo $nombreClienteDB?>" readonly>
					</div>
					<div class="inputBx">
						<span>Apellido</span>
						<input type="text" placeholder="Ingrese su apellido" value="<?php echo $apellidoClienteDB?>" readonly>
					</div>
					<div class="inputBx">
						<span>Celular</span>
						<input type="number" placeholder="Ingrese su numero de celular" value="<?php echo $celClienteDB?>" readonly>
					</div>
					<div class="inputBx">
						<span>Eps<span style="color: red;">*</span></span>
						<input type="text" name="eps" placeholder="Ingrese su eps">
					</div>
					<div class="inputBx">
						<span>Estatura(Cm)</span>
						<input type="number" placeholder="ingrese su estatura en cm" value="<?php echo $estaturaDB?>" readonly>
					</div>
					<div class="inputBx">
						<span>Peso(Kg)</span>
						<input type="number" placeholder="Ingrese su peso en kg" value="<?php echo $pesoDB?>" readonly>
					</div>
					<div class="inputBx">
						<span>Tipos de medicaciones<span style="color: red;">*</span></span>
						<select name="tipoMedicaciones">
							<option>Selecione...</option>
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
						<input type="text" name="detalleM" placeholder="Detalle acerca de sus medicaciones">
					</div>
					<div class="inputBx">
						<span>Tipos de padecimientos<span style="color: red;">*</span></span>
						<select name="tipoPadecimientos">
							<option>Selecione...</option>
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
						<input type="text" name="detalleP">
					</div>
					<div class="inputBx">
						<span>Tipos de cirugias<span style="color: red;">*</span></span>
						<select name="tipoCirugias">
							<option>Selecione...</option>
							<option value="1">Estetica</option>
							<option value="2">Urgencia</option>
							<option value="3">Ninguna</option>
							<option value="4">Otro</option>
						</select>
					</div>
					<div class="inputBx">
						<span>Si selecionó (Otro) ó (Urgencia) porfavor denos mas detalles</span>
						<input type="text" name="detalleC">
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