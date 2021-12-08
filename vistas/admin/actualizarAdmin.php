<?php

    //error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloAdmin.php';

    if(empty($_GET['docUpdate']))
    {
        header('location: consultarAdmin.php');
    }
    else{
        $docAdministrador = $_GET['docUpdate'];
        $objAdmin = new modeloAdmin($docAdministrador, NULL, NULL, NULL, NULL, NULL,NULL);
        $consultaAdmin = $objAdmin->consultarXidAdmin();
        $countAdmin = count(array($consultaAdmin));
        if($countAdmin == 0){
            header('location: consultarAdmin.php');
        }
    }    
    
?>
<!DOCTYPE html>
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
<section style="z-index: -1;">
<div class="contentBx">
<div class="formBx">
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a><h2>Actualizar Usuario</h2>

				<form method="POST" action="../../controladores/controladorAdmin.php">

					<div class="inputBx">
						<span>Nombre Completo Administrador</span>
                        <input type="hidden" name="docUpdate" value="<?php echo $consultaAdmin->docAdministrador; ?>">
						<input type="text" name="nombreUpdate" value="<?php echo $consultaAdmin->nombreAdministrador;?>">
					</div>
                    <div class="inputBx">
						<span>Telefono celular</span>
						<input type="text" name="celUpdate" value="<?php echo $consultaAdmin->celAdministrador; ?>">
					</div>
					<div class="inputBx">
						<span>Correo electronico</span>
						<input type="email" name="correoUpdate" value="<?php echo $consultaAdmin->direcAdministrador; ?>">
					</div>
                    <div class="inputBx">
						<span>Direccion Administrador</span>
						<input type="text" name="direcUpdate" value="<?php echo $consultaAdmin->direcAdministrador; ?>">
					</div>
                    <div class="inputBx">
						<span>Estado</span>
						<input type="text" name="estadoUpdate" value="<?php echo $consultaAdmin->estado; ?>">
					</div>
                    <?php
                        $usuario = 'root';
                        $password = '';
                        $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
                        ?>
					<div class="inputBx">
                    <span>Usuario</span>
                        <select name="usuafkUpdate" id="">
						
						<?php
                        $query = $db->prepare("select docUsuario, nombreUsuario from usuario");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["docUsuario"].'">'.$valores["nombreUsuario"].'</option>';
                        endforeach;
                        ?>
						</select></br></br>
					
                    <input type="submit" value="Guardar">
                </div>
</form>
                    
</body>
</html>