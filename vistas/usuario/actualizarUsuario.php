<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloUsuario.php';

    if(empty($_GET['docUpdate']))
    {
        header('location: consultarUsuario.php');
    }
    else{
        $docUsuario = $_GET['docUpdate'];
        $objUsuario = new modeloUsuario($docUsuario, NULL, NULL, NULL, NULL, NULL);
        $consultaUsuario = $objUsuario->consultarXIdU();
        $countUsuario = count($consultaUsuario);
        if($countUsuario == 0){
            header('location: consultarUsuario.php');
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
    <link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">

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
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a><h2>Actualizar Usuario</h2>

    <form action="../../controladores/controladorUsuario.php" method="POST">


        <div class="inputBx">
            <!-- <label for="nombreTipoUsuario">Documento</label> -->
            <input type="hidden" name="docUpdate" value="<?php echo $consultaUsuario->docUsuario; ?>">                    <br> 
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Nombre de Usuario</span>
            <input type="text" name="nombreUpdate" value="<?php echo $consultaUsuario->nombreUsuario; ?>">                        <br>
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Celular</span>
            <input type="text" name="celUpdate" value="<?php echo $consultaUsuario->celUsuario; ?>">                    <br>  
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Correo</span>
            <input type="email" name="correoUpdate" value="<?php echo $consultaUsuario->correoUsuario; ?>">                <br>
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Contraseña</span>
            <input type="text" name="contraUpdate" value="<?php echo $consultaUsuario->contrasenaUsuario; ?>">                        <br>
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Tipo de Usuario</span>
                    <select name="tipoUpdate" value="<?php echo $consultaUsuario->tipoUsuario; ?>">
                    
                    <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
                    

                        $query = $db->prepare("SELECT * FROM tipousuario");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["idTipoUsuario"].'">'.$valores["nombreTipoUsuario"].'</option>';
                        endforeach;
                        ?>
                    </select>
                    

        </div>
        
        <br>
        
        <div class="inputBx">
            <input type="submit" value="Guardar" >
        </div>
</section>

</body>
</html>