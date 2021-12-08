<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloEntrenador.php';

    if(empty($_GET['docEUpdate']))
    {
        header('location: consultarEntrenador.php');
    }
    else{
        $docEntrenador = $_GET['docEUpdate'];
        $objEntrenador = new modeloEntrenador($docEntrenador, NULL, NULL, NULL, NULL, NULL);
        $consultaEntrenador = $objEntrenador->consultarXIdE();
        $countEntrenador = count($consultaEntrenador);
        if($countEntrenador == 0){
            header('location: consultarEntrenador.php');
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
	<title>Actualizar</title>
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
<h2>Actualizar Entrenador</h2>
    <form action="../../controladores/controladorEntrenador.php" method="POST">
    
        <div class="inputBx">
            <!-- <span>Ingrese su numero de documento</span> -->
            <input type="hidden" name="docEUpdate" value="<?php echo $consultaEntrenador->docUsuario;?>">                    <br> 
        </div>
        
        

        <div class="inputBx">
            <span for="nombreTipoUsuario">Ingrese su numero celular</span>
            <input type="text" name="celEUpdate" value="<?php echo $consultaEntrenador->celEntrenador;?>">                    <br>  
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Ingrese su direccion</span>
            <input type="text" name="direcEUpdate" value="<?php echo $consultaEntrenador->direcEntrenador;?>">                <br>
        </div>

        <div class="inputBx">
            <span for="nombreTipoUsuario">Ingrese su estado</span>
            <input type="text" name="estadoUpdate" placeholder="Activo/Inactivo" value="<?php echo $consultaEntrenador->estado;?>">                        <br>
        </div>
<div class="inputBx">
            <span for="nombreTipoUsuario">Ingrese su nombre completo</span>
            <input type="text" name="nombreEUpdate" value="<?php echo $consultaEntrenador->nombreEntrenador;?>">                        <br>
        </div>
        <?php
             $usuario = 'root';
             $password = '';
             $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
        ?>
        <div class="inputBx">
            <span for="nombreTipoUsuario">Seleccione su usuario</span>
                    <select name="usuarioUpdate" value="<?php echo $consultaEntrenador->usuarioFk;?>">
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
        
        <br>
        
        <div class="inputBx">
            <input type="submit" value="Guardar" >
</div>
				
</div>
</div>
</section>
</form>
</body>
</html>