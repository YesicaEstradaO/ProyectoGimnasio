<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloTipoEjercicio.php';

    if(empty($_GET['idTipoEjercicioUpDate']))
    {
        header('location: listaTipoEjercicio.php');
    }
    else{
        $idTipoEjercicio = $_GET['idTipoEjercicioUpDate'];
        $objTipoEjercicio = new modeloTipoEjercicio($idTipoEjercicio, NULL);
        $consultaTipoEjercicio = $objTipoEjercicio->consultarXTE();
        $countTipoEjercicio = count(array($consultaTipoEjercicio));
        if($countTipoEjercicio == 0){
            header('location: listaTipoEjercicio.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/registrar.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
	<title>Registrar</title>
</head>
<body>
<section>
<div class="contentBx">
<div class="formBx">
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
    <form action="../../controladores/ControladorTipoEjercicio.php" method="POST">

        <div class="inputBx">
            <!-- <label for="nombreTipoEjercicio">id</label> -->
            <input type="hidden" name="idUpDate" value="<?php echo $consultaTipoEjercicio->idTipoEjercicios; ?>">                    <br> 
        </div>

        <div class="inputBx">
            <span for="nombreTipoEjercicios">Nombre del Ejercicio</span>
            <input type="text" name="nombreUpdate" value="<?php echo $consultaTipoEjercicio->nombreEjercicios; ?>">                        <br>
        </div>

        </div>
        
        <br>
        
        <div class="inputBx">
            <input type="submit" value="Guardar" >
        </div>
</section>
</body>
</html>