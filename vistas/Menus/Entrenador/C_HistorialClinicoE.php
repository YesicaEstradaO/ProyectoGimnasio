<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--=============================================================================================================================-->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link hrefs="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
		<link rel="shortcut icon" href="../../img/favicon.png"> 	
		<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
		<link rel="stylesheet" href="../../css/histCli.css">
		<link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
		<link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

<!--=============================================================================================================================-->
		<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
<!--=============================================================================================================================-->
		<title>Historiales Clinicos</title>
	</head>

	<body>

	<?php include('./menu.php') ?>


		<?php
			require_once '../../../modelos/mHistorialClinico.php';
			$objHistorialClinico = new mHistorialClinico(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
			$consultarHC = $objHistorialClinico->consultarHistorialClinico();
		?>

		<div id="main-container" class="table-responsive">

		<h1 align="center">Historial Clinico</h1>
			<table id="datat">
				<thead>
					<tr>
						<th>id Historial CLinico</th>
						<th>eps</th>
						<th>medicacionesFk</th>
						<th>detalleMedicacion</th>
						<th>tipoCirugiaFk</th>
						<th>detalleCirugia</th>
						<th>tipoPadecimientoFk</th>
						<th>detallePadecimiento</th>
						<th>clienteFk</th>
					</tr>
				</thead>

				
				<?php foreach ($consultarHC as $listaHC):?>
					<tr>
						<td><?php echo $listaHC->idHistorialClinico ?></td>
						<td><?php echo $listaHC->eps ?></td>
						<td><?php echo $listaHC->medicacionesFk ?></td>
						<td><?php echo $listaHC->detalleMedicacion ?></td>
						<td><?php echo $listaHC->tipoCirugiaFk ?></td>
						<td><?php echo $listaHC->detalleCirugia ?></td>
						<td><?php echo $listaHC->tipoPadecimientoFk ?></td>
						<td><?php echo $listaHC->detallePadecimiento ?></td>
						<td><?php echo $listaHC->clienteFk ?></td>
						
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