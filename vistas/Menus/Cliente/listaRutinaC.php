<html>
<head>
	<meta charset="utf-8">
	<title>Consulta Rutina</title>
	<link rel="stylesheet" type="text/css" href="../../../css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../../../css/menu1.css">
	<meta name="viewport" content="width=device-width, initial-scalee=1.0">
	<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

</head>
<body>

<?php include('./menu.php') ?>

     <selection class="home">


         <div id="main-container" class="table-responsive">
         <h1 align="center">Rutinas del Cliente</h1>

<table border="1" id="datat">
    <thead>
    <tr>
			<th>ID Rutina</th>
			<th>plan Rutina</th>
            <th>intensidad Rutina</th> 
            <th>dia Rutina</th>
            <th>ID Cliente</th>
            <th>ID Entrenador</th>
		</tr>
    </thead>
    <tbody>
    <?php 
		   require_once '../../../modelos/modeloRutina.php';

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
	