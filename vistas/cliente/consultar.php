<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link hrefs="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css//tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css//adminis.css">
	<link rel="stylesheet" href="../../css/fontello.css">
	<title>Cliente    </title>
</head>
<body>
<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<label class="logo">Cliente</label>
	<ul>
    <li><a href="./menu.php">inicio</a></li>
		<li><a href="../usuario/consultarUsuario.php">Usuarios</a></li>
		<li><a href="#">perfil</a></li>
		<li><a href="../../index.html">Salir</a></li>

	</ul>
</nav>
<div id="main-container" class="table-responsive">
</br>
</br>
    <button><a href="../usuario/consultarUsuario.php"> dietas</a></button>
	<button><a href="../cliente/consultarCliente.php"> Rutinas</a></button>
    <button><a href="../proteinas/consultarProteina.php"> Proteinas</a></button>
</div>
</body>
</html>