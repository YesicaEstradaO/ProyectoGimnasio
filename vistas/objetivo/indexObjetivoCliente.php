<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link hrefs="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/botonFlotante.css">
	<link rel="stylesheet" type="text/css" href="../../css//adminis.css">
	<link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">

	<link rel="stylesheet" href="../../css/fontello.css">
	<title>Objetivo del Cliente</title>
</head>
<body>

<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="../Menus/Cliente/menu.php"><label class="logo">Cliente</label></a>
	<ul>

        <li><a href="../Menus/Cliente/listaRutinaC.php ">Consultar Rutinas</a></li>
        <li><a href="../Menus/Cliente/listaDietaC.php">Consultar Dieta</a></li>
        <li><a href="../historialClinico/indexHistorial_C.php">Historial Clinico</a></li>
        <li><a href="../objetivo/indexObjetivoCliente.php">Objetivos</a></li>
        <li><a href="">Usuario</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>

<div id="main-container" class="table-responsive">



    <button><a href="./C_Objetivo.php"> Consultar</a></button>
    <button><a href="./C_InsertarObjetivo.php"> Agregar</a></button>