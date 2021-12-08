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
	<link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
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
<h1>Cliente</h1>
<button><a href="insertarCliente.php">Nuevo</a></button>
    <table border="2" id="datat">
        <thead>
            <tr>
                <th>docCliente</th>
                <th>nombreCliente</th>
                <th>apellidoCliente</th>
                <th>estado</th>
                <th>alturaCliente</th>
                <th>pesoCliente</th>
                <th>entrenador</th>
                <th>usuario</th>
                <th>celCliente</th>
                <th colspan="2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once '../../modelos/modeloCliente.php';

                $objCliente = new modeloCliente(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
                $consultaCliente = $objCliente->consultarCliente();
            ?>
            <tr><?php foreach ($consultaCliente as $tablaCliente): ?>
                
                <td><?php echo $tablaCliente->docCliente ?></td>
                <td><?php echo $tablaCliente->nombreCliente ?></td>
                <td><?php echo $tablaCliente->apellidoCliente ?></td>
                <td><?php echo $tablaCliente->estado ?></td>
                <td><?php echo $tablaCliente->alturaCliente ?></td>
                <td><?php echo $tablaCliente->pesoCliente ?></td>
                <td><?php echo $tablaCliente->nombreEntrenador ?></td>
                <td><?php echo $tablaCliente->nombreUsuario ?></td>
                <td><?php echo $tablaCliente->celCliente ?></td>
            </td>
                <td>
                <button onclick="location.href = 'actualizarCliente.php?docCliente=<?php echo $tablaCliente->docCliente ?>'">ACTUALIZAR</button>
				<button onclick="location.href ='../../controladores/controladorCliente.php?docClienteDelete=<?php echo $tablaCliente->docCliente ?>'">ELIMINAR</button>   
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