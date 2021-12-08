<html>
<head>
	<meta charset="utf-8">
	<title>Consulta cintraindicaciones</title>
	<link rel="stylesheet" type="text/css" href="../../css/tablas.css">
	<link rel="stylesheet" type="text/css" href="../../css/menu1.css">
	<meta name="viewport" content="width=device-width, initial-scalee=1.0">

</head>
<body>
	

	<section class="home">
		<div class="in-flex">
			


		</div>

<table border="1">
	<thead>
		<tr>
			<th>ID Contraindicaciones</th>
			<th>nombre Contraindicaciones </th> 

		</tr>
	</thead>
	<tbody>
		<?php 
		   require_once '../../modelos/modeloContraindicaciones.php';

		   $objContraindicaciones = new modeloContraindicaciones(NULL,NULL);
		   $consultaContraindicaciones=  $objContraindicaciones->consultarContraindicaciones();
		?>

		<tr>
			<?php foreach ($consultaContraindicaciones as $tablaContraindicaciones): ?>
		    <td><?php echo $tablaContraindicaciones->idContraindicaciones?></td>
			<td><?php echo $tablaContraindicaciones->descricionContraindicaiones ?></td>

			<td>
				<button onclick="location.href= 'actualizarContra.php?idContraindicacionesUpDate=<?php echo $tablaContraindicaciones-> idContraindicaciones?>'">ACTUALIZAR</button>
				<button onclick ="location.href= '../../controladores/controladorContraindicaciones.php?idContraindicacionesDelete=<?php echo $tablaContraindicaciones->idContraindicaciones?>'">ELIMINAR</button>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
</body>
</hr>
</body>
</html>