<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloRutina.php';

    if(empty($_GET['idRutinaUpDate']))
    {
        header('location: listaRutina.php');
    }
    else{
        $idRutina = $_GET['idRutinaUpDate'];
        $objRutina = new modeloRutina($idRutina, NULL, NULL, NULL, NULL, NULL);
        $consultaRutina = $objRutina->consultarXidRutina();
        $countRutina = count(array($consultaRutina));
        if($countRutina == 0){
            header('location: listaRutina.php');
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
	<title>actualizar</title>
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
<h2>actualizar Rutina</h2>
				<form class="formi" method="POST" action="../../controladores/controladorRutina.php">
					<div class="inputBx">
                        <input type="hidden" name="idUpDate" value="<?php echo $consultaRutina->idRutina; ?>">
						<span>Plan Rutina</span>
						<input type="text" name="PlanUpdate" value="<?php echo $consultaRutina->planRutina; ?>">
                        <span>intensidad Rutina</span>
                        <input type="text" name="intensidadUpdate" value="<?php echo $consultaRutina->intencidadRutina; ?>">
                        <span>Dia rutina</span>
                        <input type="text" name="diaUpdate" value="<?php echo $consultaRutina->planRutina; ?>">
						<span>Cliente</span>
                        <input type="number" name="clienteFKUpDate" value="<?php echo $consultaRutina->clienteFk; ?>">
						<span>Entrenador</span>
                        <input type="number" name="entrenadorFKUpDate" value="<?php echo $consultaRutina->entrenadorFk; ?>">
					</div>
				
					
					<div class="inputBx">
						<input type="submit" value="Guardar" >
					</div>

					

				</form>
				</div>

			</div>
			</div>
			
		</section>
</body>
</html>