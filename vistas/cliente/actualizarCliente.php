<?php

    error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloCliente.php';

    if(empty($_GET['docCliente']))
    {
        header('location: consultarCliente.php');
    }
    else{
        $docCliente = $_GET['docCliente'];
        $objCliente = new modeloCliente($docCliente, NULL, NULL, NULL, NULL, NULL,NULL,NULL,NULL);
        $consultaCliente = $objCliente->consultarXIdC();
        $countCliente = count($consultaCliente);
        if($countCliente == 0){
            header('location: consultarCliente.php');
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
    <title>Actualiza Cliente</title>
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
<h2>Actualizar Cliente</h2>

<form action="../../controladores/controladorCliente.php" method="POST">

<div class="inputBx">
    <input type="hidden" name="docUpdate" value="<?php echo $consultaCliente->docCliente; ?>">                    <br> 
</div>

<div class="inputBx">
    <span>Ingrese su nombre:</span>
    <input type="text" name="nombreUpdate" value="<?php echo $consultaCliente->nombreCliente; ?>">                        <br>
</div>

<div class="inputBx">
    <span>Ingrese su apellido:</span>
    <input type="text" name="apellidoUpdate" value="<?php echo $consultaCliente->apellidoCliente; ?> ">                  <br>  
</div>

<div class="inputBx">
    <span>Ingrese su estado(activo/inactivo):</span>
    <input type="text" name="estadoUpdate" value="<?php echo $consultaCliente->estado; ?> ">            <br>
</div>

<div class="inputBx">
    <span>Ingrese su altura:</span>
    <input type="text" name="alturaUpdate" value="<?php echo $consultaCliente->alturaCliente; ?>">                        <br>
</div>
<div class="inputBx">
    <span>Ingrese su peso:</span>
    <input type="text" name="pesoUpdate" value="<?php echo $consultaCliente->pesoCliente; ?>">                        <br>
</div>
<!-- <fieldset disabled> -->
<?php
 $usuario = 'root';
 $password = '';
 $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
 ?>
<div class="inputBx">
            <span>Seleccione el Entrenador:</span>
            <select name="entrenUpdate" value="<?php echo $consultaCliente->usuarioFk; ?>"><?php echo $consultaCliente->entrenadorFk; ?>                <option value="1190898999">estefania23</option>
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
            <select name="usuaUpdate" value="<?php echo $consultaCliente->usuarioFk; ?>"><?php echo $consultaCliente->usuarioFk; ?>                <option value="1190898999">estefania23</option>
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
<!-- </fieldset> -->

<div class="inputBx">
    <label >Ingrese su celular:</label>
    <input type="text" name="celUpdate" value="<?php echo $consultaCliente->celCliente; ?>">                        <br>
</div>
<br>

<div class="inputBx">
    <input type="submit" value="Guardar" >
</div>

</form>

</body>
</html>