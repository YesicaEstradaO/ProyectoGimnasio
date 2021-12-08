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
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="../../css/fontello.css">
	<title>usuarios</title>
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
<div id="main-container" class="table-responsive">
<h1 align="center">Gestion de Usuarios</h1>

    <button><a href="insertarUsuario.php">Nuevo</a></button>
    <table border="2" id="datat">
        <thead>
            <tr>
                <th>docUsuario</th>
                <th>Celular Usuario</th>
                <th>correo Usuario</th>
                <th>nombre Usuario</th>
                <th>tipo Usuario</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once '../../modelos/modeloUsuario.php';

                $objUsuario = new modeloUsuario(NULL,NULL,NULL,NULL,NULL,NULL);
                $consultaUsuario = $objUsuario->consultarUsuario();
            ?>
            <tr><?php foreach ($consultaUsuario as $tablaUsuario): ?>
                
                <td><?php echo $tablaUsuario->docUsuario ?></td>
                <td><?php echo $tablaUsuario->celUsuario ?></td>
                <td><?php echo $tablaUsuario->correoUsuario ?></td>
                <td><?php echo $tablaUsuario->nombreUsuario ?></td>
                <td><?php echo $tablaUsuario->nombreTipoUsuario ?></td>
            </td>
                <td>
                <button onclick="location.href = 'actualizarUsuario.php?docUpdate=<?php echo $tablaUsuario->docUsuario ?>'">ACTUALIZAR</button>
				<button onclick="location.href ='../../controladores/controladorUsuario.php?docDelete=<?php echo $tablaUsuario->docUsuario ?>'">ELIMINAR</button>   
                </td>
            </tr>

            <?php endforeach ?>
        </tbody>
    </table>
    <script>
   var myTable = document.querySelector("#datat");
   var dataTable = new DataTable("#datat", {
      perPage:5,
      labels: {
         placeholder: "Buscar...",
         perPage: "{select} Regitros por pagina",
         noRows: "No se encontraron registros para mostrar",
         info: "Mostrando {start} a {end} de {rows} registros",
}

   });
   </script>
</body>
</html>