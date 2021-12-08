

<?php 
    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloSeguimientoM.php';
    if(empty($_GET['idSeguimientoUpDate'])){
        header('location: listaSeguimientosM.php');
    }
    else{
        $idSeguimiento = $_GET['idSeguimientoUpDate'];
        $objSeguimiento = new modeloSeguimientoM($idSeguimiento, null, null, null, null, null); 

        $consultaSeguimiento = $objSeguimiento->consultarXidSeguimientoM();
        $countSeguimiento = count(array($consultaSeguimiento));
        if($countSeguimiento == 0){
            header('location: listaSeguimientosM.php');
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
<div class="contentBx">
<div class="formBx">
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
					<h2>Actualizar Seguimiento</h2>
					<form method="POST" action="../../controladores/controladorSeguimientoMedidas.php">

						<div class="inputBx">
							<span>Documento(id) cliente</span>
							<input type="number" name="idClienteUpDate" value="<?php echo $consultaSeguimiento->clienteFk; ?>"></br>
						</div>
						<div class="inputBx">
							<span>Documento(id) entrenador</span>
							<input type="number" name="idEntrenaUpDate" value="<?php echo $consultaSeguimiento->entrenadorFk; ?>"></br>
						</div>
						
						<div class="inputBx">
							<span>Fecha toma de medida</span>
                            <input type="hidden" name="idSeguimientoUpDate" value="<?php echo $consultaSeguimiento->idSeguimiento; ?>"></br>
							<input type="date" name="fechaSeguimientoUpDate" value="<?php echo $consultaSeguimiento->fechaSeguimiento; ?>"></br>
						</div>
						<div class="inputBx">
						<div class="inputBx">
							<span>Parte cuerpo </span>
							<select name="idParteCuerpoUpDate"value="<?php echo $consultaSeguimiento->parteCuerpoFk;?>">
								<option>Seleccione</option>
								<option value="1">Tobillos</option>
								
							</select>
						</div>
							<span>Medida del cliente</span>
							<input type="number" name="medidaSeguimientoUpDate" value="<?php echo $consultaSeguimiento->medidas; ?>"></br>
						</div>
						
						
						<div class="inputBx">
							<input type="submit" value="Insertar" name="">
						</div>

					

					</form>
				
				</div>
			</div>
			
		</section>
		<script src="../../js/validaciones.js"></script>
	</body>
</html>