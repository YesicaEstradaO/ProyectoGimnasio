<?php

    error_reporting(E_ERROR | E_PARSE);

    require_once '../../modelos/modeloSeguimientoM.php';  
	session_start();
    
    $clienteFk= $_POST['idClienteUpDate'];

    $objSeguimiento = new modeloSeguimientoM(null, null, null, $clienteFk, null, null);

    $consultaSeguimiento = $objSeguimiento->consultarXidSeguimientoM();

    $idCIn = $consulta->docCliente;
    $nombreClienteDB = $consulta->nombreCliente;

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
	<link rel="stylesheet" type="text/css" href="../../css/registrar.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
    <link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
	<title>Seguimiento</title>
</head>
	<body>
	<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="../Menus/Entrenador/menu.php"><label class="logo">Entrenador</label></a>
	<ul>

        <li><a href="../dieta/listaDieta.php">Gest. Dieta</a></li>
        <li><a href="../rutina/listaRutina.php">gest. rutina</a></li>
        <li><a href="../Menus/Entrenador/C_HistorialClinicoE.php">Historial Clinico</a></li>
        <li><a href="../Menus/Entrenador/consultarClienteE.php">clientes</a></li>
        <li><a href="../proteinas/consultarProteina.php">Proteinas</a></li>
		<li><a href="../seguimientoM/ListaSeguimientosM.php">Seguimiento Medidas</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>
<section>
    
<div class="contentBx">
<div class="formBx">
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
<h2>Registrar Proteina</h2>
					<form method="POST" action="../../controladores/controladorSeguimientoMedidas.php" class="formulario" id="formulario">

						<div class="inputBx">
							<span>Fecha toma de medida</span>
							
							<input type="date" name="fechaMedida">
						</div>
						

						<div class="inputBx">
							<span>Parte cuerpo </span>
							<select name="parteCuerpo">
								<option>Seleccione</option>
								<option value="1" >Tobillos</option>
								<option value="5" >PIEL</option>
							</select>
						</div> 
						<div class="inputBx">
							<div class="formulario__grupo formulario__grupo-incorrecto" id="grupo__medidas">
								<span class="formulario__span">Medida del cliente</span>
								<div class="formulario__grupo-input">
									<input class="formulario__input" type="number" name="medidasCliente">
									<i class="formulario__validacion-estado fas fa-times-circle"></i>
								</div>
								<p class="formulario__input-error">Solo agregue valores numéricos</p>
							</div>
						</div>

						<?php
						$usuario = 'root';
						$password = '';
						$db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 

						?>
						<div class="inputBx">
						<span>Ingrese el cliente</span>
								<select name="idCliente">
									<?php
									$query = $db->prepare("select docCliente, nombreCliente, apellidoCliente from cliente;");
									$query->execute();
									$data = $query->fetchAll();

									foreach ($data as $valores):
									echo '<option value="'.$valores["docCliente"].'">'.$valores["nombreCliente"].' '.$valores["apellidoCliente"].'</option>';
									endforeach;
									?>
								</select>
						</div>
						<div class="inputBx">
							<span>Ingrese el entrenador</span>
							<select name="idEntrenador">
							<?php
								$query = $db->prepare("select docEntrenador, nombreEntrenador from entrenador;");
								$query->execute();
								$data = $query->fetchAll();

								foreach ($data as $valores):
								echo '<option value="'.$valores["docEntrenador"].'">'.$valores["nombreEntrenador"].'</option>';
								endforeach;
								?>
							</select>
						</div>

						<div class="formulario__mensaje" id="formulario__mensaje">
							<p><i class="fas fa-exclamation-triangle"></i><b>Error:</b>Debe llenar todos los campos del formulario</p>
						</div>
						
						<div class="formulario__grupo formulario__grupo-btn-enviar">
							<div class="inputBx">
								<input type="submit" value="Insertar" name="">
							</div>
							<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">El formulario se envió exitosamente</p>
						</div>

					

					</form>
				
				</div>
			</div>
			
		</section>
		<script src="../../js/validaciones.js"></script>
	</body>
</html>