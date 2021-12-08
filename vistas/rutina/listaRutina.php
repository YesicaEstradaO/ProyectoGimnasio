<html>
<head>
	<meta charset="utf-8">
	<title>Consulta Rutina</title>
    <meta charset="utf-8">
        <title>Consulta Dieta</title>
        <link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link hrefs="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css//tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css//adminis.css">
	<link rel="stylesheet" href="../../css/fontello.css">
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

</head>
<body>
<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="../Menus/Entrenador/menu.php"><label class="logo">Entrenador</label></a>
	<ul>

        <li><a href="../dieta/listaDieta.php">Gest. Dieta</a></li>
        <li><a href="../rutina/listaRutina.php">gest. ruina</a></li>
        <li><a href="../Menus/Entrenador/C_HistorialClinicoE.php">Historial Clinico</a></li>
        <li><a href="../Menus/Entrenador/consultarClienteE.php">clientes</a></li>
        <li><a href="../proteinas/consultarProteina.php">Proteinas</a></li>
		<li><a href="../seguimientoM/ListaSeguimientosM.php">Seguimiento Medidas</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>
<div id="main-container" class="table-responsive">
<h1>Rutinas</h1>
    <button><a href="./insertarRutina.php">Nuevo</a></button>

     <selection class="home">
         <div class="in-flex">

         </div>


<table border="1" id="datat">
    <thead>
    <tr>
			<th>ID Rutina</th>
			<th>plan Rutina</th>
            <th>intensidad Rutina</th> 
            <th>dia Rutina</th>
            <th>ID Cliente</th>
            <th>ID Entrenador</th>
            <th>Acciones</th>
		</tr>
    </thead>
    <tbody>
    <?php 
		   require_once '../../modelos/modeloRutina.php';

		   $objRutina = new modeloRutina(NULL,NULL,NULL,NULL,NULL,NULL);
		   $consultaRutina=  $objRutina->consultarRutina();
		?>

<tr>
			<?php foreach ($consultaRutina as $tablaRutina): ?>
		    <td><?php echo $tablaRutina->idRutina?></td>
			<td><?php echo $tablaRutina->planRutina ?></td>
            <td><?php echo $tablaRutina->intencidadRutina?></td>
            <td><?php echo $tablaRutina->diaRutina ?></td>
            <td><?php echo $tablaRutina->clienteFk?></td>
            <td><?php echo $tablaRutina->entrenadorFk?></td>
			<td>
				<button onclick="location.href= 'actualizarRutina.php?idRutinaUpDate=<?php echo $tablaRutina-> idRutina?>'">ACTUALIZAR</button>
				<button onclick ="location.href= '../../controladores/controladorRutina.php?idRutinaDelete=<?php echo $tablaRutina->idRutina?>'">ELIMINAR</button>
			</td>
		</tr>
	<?php endforeach ?>

    </tbody>
     </selection>
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
	