<!DOCTYPE html>
<html>
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
	<title>Registrar</title>
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
        <li><a href="../rutina/listaRutina.php">gest. rutina</a></li>
        <li><a href="../Menus/Entrenador/C_HistorialClinicoE.php">Historial Clinico</a></li>
        <li><a href="../Menus/Entrenador/consultarClienteE.php">clientes</a></li>
        <li><a href="../proteinas/consultarProteina.php">Proteinas</a></li>
		<li><a href="../seguimientoM/ListaSeguimientosM.php">Seguimiento Medidas</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>
<section>
    
<div class="contentBx">
<div class="formBx">
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
<h2>Registrar Rutina</h2>				<form class="formi" method="POST" action="../../controladores/ControladorRutina.php">
					<div class="inputBx">
						<span>Plan Rutina</span>
						<input type="text" name="planRutina">
                        <span>Intensidad Rutina</span>
						<input type="text" name="intensidadRutina">
                        <span>Dia Rutina</span>
						<input type="text" name="diaRutina">
					</div>
					<div class="inputBx">
						<span>Cliente</span>
					<select name="clienteFk" id="clienteFk">
                        <?php
                            $usuario = 'root';
                            $password = '';
                            $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
                        

                            $query = $db->prepare("SELECT docCliente, nombreCliente FROM cliente;");
                            $query->execute();
                            $data = $query->fetchAll();

                            foreach ($data as $valores):
                            echo '<option value="'.$valores["docCliente"].'">'.$valores["nombreCliente"].'</option>';
                            endforeach;
                        ?>
                        </select>
					</div>
					<span>Entrenador</span>
					<div class="inputBx">
					<select name="entrenadorFk" id="entrenadorFk">
                        <option value="1001001001">Diana Perez</option>
					</select>
					</div>
				
    
					<div class="inputBx">
						<input type="submit" value="Insertar" >
					</div>

					

				</form>
				
			</div>
			</div>
			
		</section>
</body>
</html>