<html>
<head>
	<meta charset="utf-8">
	<title>Consulta Tipo de Ejercicios</title>
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
			<th>ID TipoEjercicio</th>
			<th>nombre Ejercicio </th> 

		</tr>
	</thead>
	<tbody>
		<?php 
		   require_once '../../modelos/modeloTipoEjercicio.php';

		   $objTipoEjercicio = new modeloTipoEjercicio(NULL,NULL);
		   $consultaTipoEjercicio =  $objTipoEjercicio->consultarTipoEjercicio();
		?>

		<tr>
			<?php foreach ($consultaTipoEjercicio as $tablaTipoEjercicio): ?>
		    <td><?php echo $tablaTipoEjercicio->idTipoEjercicios?></td>
			<td><?php echo $tablaTipoEjercicio->nombreEjercicios ?></td>

			<td>
				<button onclick="location.href= 'actualizarTipoEjercicio.php?idTipoEjercicioUpDate=<?php echo $tablaTipoEjercicio-> idTipoEjercicios?>'">ACTUALIZAR</button>
				<button onclick ="location.href= '../../controladores/ControladorTipoEjercicio.php?idTipoejercicioDelete=<?php echo $tablaTipoEjercicio->idTipoEjercicios?>'">ELIMINAR</button>
			</td>
		</tr>
	<?php endforeach ?>
	</tbody>
</table>
</body>
</hr>
</body>
</html>