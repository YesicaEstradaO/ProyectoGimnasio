<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <title>Insertar Administrador</title>
</head>
<body>
<nav>
<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
    <a href="../Menus/Admin/menu.php"><label class="logo">Administrador</label></a>
	<ul>

        <li><a href="../usuario/consultarUsuario.php">Gest. Usuarios</a></li>
		<li><a href="../Admin/consultarAdmin.php">Gest. Administradores</a></li>
        <li><a href="../entrenador/consultarEntrenador.php">Gest. Entrenadores</a></li>
        <li><a href="../cliente/consultarCliente.php">Gest. Clientes</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>
<section>
			


	<div class="contentBx">
		<div class="formBx">
			<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
			<h2>Registrar</h2>
				<form method="POST" action="../../controladores/controladorAdmin.php">

					<div class="inputBx">
						<span>Documento de identidad</span>
						<input type="text" name="docAdmin">
					</div>
					<div class="inputBx">
						<span>Telefono celular</span>
						<input type="text" name="celAdmin">
					</div>
					<div class="inputBx">
						<span>Correo electronico</span>
						<input type="email" name="correoAdmin">
					</div>
					<div class="inputBx">
						<span>Direccion Administrador</span>
						<input type="text" name="direcAdmin">
					</div>
					<div class="inputBx">
						<span>Estado</span>
						<input type="text" name="estadoAdmin">
					</div>
					<div class="inputBx">
						<span>Nombre Completo Administrador</span>
						<input type="text" name="nombreAdmin">
					</div>
					
                    <?php
					$usuario = 'root';
					$password = '';
					$db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
					?>
					<div class="inputBx">
						<span>usuario </span>
						<select name="usuafk" id="">
						<?php
                        $query = $db->prepare("select docUsuario, nombreUsuario from usuario");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["docUsuario"].'">'.$valores["nombreUsuario"].'</option>';
                        endforeach;
                        ?>
						</select>
					</div>
					<div class="inputBx">
                    <input type="submit" value="Guardar"><br></div>
				</form>
				</div>
	</div>



                    
</body>
</html>