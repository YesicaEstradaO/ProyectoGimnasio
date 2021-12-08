<?php
    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloDieta.php';
    if(empty($_GET['idDietaUpDate'])){
        header('location: listaDieta.php');
    }
    else{
        $idDieta = $_GET['idDietaUpDate'];
        $objDieta = new modeloDieta($idDieta, null, null, null, null, null, null); 

        $consultaDieta = $objDieta->consultarXidDieta();
        $countDieta = count(array($consultaDieta));
        if($countDieta == 0){
            header('location: listaDieta.php');
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
	<title>Dieta</title>
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
<h2>Actualiza Dieta</h2>
				    <form method="POST" action="../../controladores/controladorDieta.php">
                        <div class="inputBx">
                            <input type="hidden" name="idClienteUpDate" value="<?php echo $consultaDieta-> clienteFk; ?>"></br>
                                               
                        </div>
                        <div class="inputBx">
                            <span>doc(id) entrenador</span>
                            <input type="number" name="idEntrenadorUpDate" value="<?php echo $consultaDieta-> entrenadorFk; ?>"></br>
                                               
                        </div>
                        <div class="inputBx">
                            <span>Fecha Inicio Dieta</span>
                            <input type="hidden" name="idDietaUpDate" value="<?php echo $consultaDieta-> idDieta; ?>"></br>
                            <input type="date" name="fechaIniDUpDate" value="<?php echo $consultaDieta->fechaInicio; ?>"></br>
                        </div>
                        <div class="inputBx">
                            <span>Fecha Fin Dieta</span>
                            <input type="date" name="fechaFinDUpDate" value="<?php echo $consultaDieta-> fechaFin; ?>"></br>
                        </div>
                        <div class="inputBx">
                            <span>dia Dieta</span>
                            <input type="text" name="DiaDUpDate" value="<?php echo $consultaDieta-> diaDieta; ?>"></br>
                        </div>
                        <div class="inputBx">
                            <span>Plan Dieta</span>
                            <input type="text" name="planDUpDate" value="<?php echo $consultaDieta-> planDieta; ?>"></br>
                                               
                        </div>
                        
                        <div class="inputBx">
                            <input type="submit" value="Actualizar" name="" onclick="ConfirmDemo();">
                        </div>
                        <a href="ListaDieta.php"> Ver lista</a>
					

				    </form>
				
			    </div>
			</div>
			
		</section>

        <script>

        function ConfirmDemo() {
            //Ingresamos un mensaje
            var mensaje = confirm("¿Desea actualizar esta dieta?");
            //Verificamos si el usuario acepto el mensaje
            if (mensaje) {
            alert("¡Se actualizó con exito!");
            }
            //Verificamos si el usuario denegó el mensaje
            else {
            alert("¡Haz cancelado la actualización!");
            }
        }

    </script>
</body>
</html>