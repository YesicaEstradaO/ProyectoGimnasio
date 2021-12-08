<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link hrefs="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css//adminis.css">
	<link rel="stylesheet" type="text/css" href="../../css//tconsulta.css">
	<link rel="stylesheet" href="../../css/histCli.css">
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

	<title>C_Objetivo Clientes</title>
</head>
<body>

<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="../Menus/Cliente/menu.php"><label class="logo">Cliente</label></a>
	<ul>

        <li><a href="../historialClinico/indexHistorial_C.php">Consultar Rutinas</a></li>
        <li><a href="../Menus/Cliente/listaDietaC.php">Consultar Dieta</a></li>
        <li><a href="../historialClinico/indexHistorial_C.php">Historial Clinico</a></li>
        <li><a href="../objetivo/indexObjetivoCliente.php">Objetivos</a></li>
        <li><a href="">Usuario</a></li>
        <li><a href="">Blog</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>


	<?php
		require_once '../../modelos/mObjetivo.php';
		$objObjetivo = new mObjetivo(NULL, NULL, NULL, NULL, NULL, NULL);
		$consultarObjetivo = $objObjetivo->consultarObjetivo();
	?>
	    
	<div id="main-container" class="table-responsive">

	<h1 align="center">Objetivos del Cliente</h1>

		<table id="datat">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Documento del Cliente</th>
					<th>descripcion</th>
					<th>fecha de Inicio</th>
					<th>fecha de Cumplimiento</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<?php foreach ($consultarObjetivo as $listaObjetivo):?>
			<tr>
				<td style="display: none;"><?php echo $listaObjetivo->idObjetivo ?></td>
				<td><?php echo $listaObjetivo->nombreCliente ?></td>
				<td><?php echo $listaObjetivo->docCliente ?></td>
				<td><?php echo $listaObjetivo->descripcion ?></td>
				<td><?php echo $listaObjetivo->fechaInicio ?></td>
				<td><?php echo $listaObjetivo->fechaCumplimiento ?></td>
				<td>
					<button onclick="location.href = 'A_Objetivo.php?idObjetivoUpdate=<?php echo $listaObjetivo->idObjetivo ?>'">Editar</button>
					<button onclick="location.href = '../../controladores/controllerObjetivo.php?idObjetivoDelete=<?php echo $listaObjetivo->idObjetivo ?>'">Eliminar</button>
				</td>
			</tr>
			<?php endforeach; ?>

		</table>
		
	</div>
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