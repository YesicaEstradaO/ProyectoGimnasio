<?php

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
    <link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
	<link rel="stylesheet" href="../../css/fontello.css">
	<title>Registrar</title>
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

    <h2>Clientes</h2>
        <form action="../../controladores/controladorCliente.php" method="POST">

        <div class="inputBx">
            <span>Ingrese su numero de documento:</span>
            <input type="number" name="documentoCliente">    
        </div>

        <div class="inputBx">
            <span>Ingrese su altura:</span>
            <input type="number" name="alturaCli">    
        </div>

        <div class="inputBx">
            <span>Ingrese su apellido:</span>
            <input type="text" name="apellidoCliente">    
        </div>

        <div class="inputBx">
            <span>Ingrese su celular:</span>
            <input type="number" name="celCliente">    
        </div>

        <div class="inputBx">
            <span>Estado:</span>
            <input type="text" name="estadoCliente">    
        </div>

        <div class="inputBx">
            <span>Ingrese su Nombre:</span>
            <input type="text" name="nombreCliente">    
        </div>

        <div class="inputBx">
            <span>Ingrese su Peso:</span>
            <input type="number" name="pesoCli">    
        </div>
        <?php
             $usuario = 'root';
             $password = '';
             $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
        ?>
        <div class="inputBx">
            <span>Seleccione el Entrenador:</span>
            <select name="entrenadorFk">
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

        <div class="inputBx">
            <span>Seleccione el Usuario:</span>
            <select name="usuarioFk">
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
            <input type="submit" value="Guardar" >
        </div>
    

        </form>
</body>
</html>