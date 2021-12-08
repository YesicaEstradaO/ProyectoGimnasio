<?php

session_start();
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
	<link rel="stylesheet" type="text/css" href="../../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../../css/adminis.css">
	<link rel="stylesheet" href="../../css/fontello.css">
	<title>Administrador</title>
</head>
<body>
<nav>
<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="./menu.php"><label class="logo">Administrador</label></a>
	<ul>

        <li><a href="../../usuario/consultarUsuario.php">Gest. Usuarios</a></li>
		<li><a href="../../Admin/consultarAdmin.php">Gest. Administradores</a></li>
        <li><a href="../../entrenador/consultarEntrenador.php">Gest. Entrenadores</a></li>
        <li><a href="../../cliente/consultarCliente.php">Gest. Clientes</a></li>
        <li><a href="../../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>
</body>
</html>