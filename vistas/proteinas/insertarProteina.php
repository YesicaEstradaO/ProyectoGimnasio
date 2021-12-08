<?php
$usuario = 'root';
$password = '';
$db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 

?>

<!DOCTYPE html>
<html lang="en">
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
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="../../css/fontello.css">
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
<h2>Registrar Proteina</h2>

    <form action="../../controladores/controladorProteina.php" method="POST">
    
        <div class="inputBx">
                <span>Ingrese el nombre de la proteina</span>
                <input type="text" name="nombreProteina">                        <br>
        </div>
        <div class="inputBx">
            <span>Ingrese la marca del producto</span>
            <input type="text" name="marcaP">                    <br>  
        </div>
        <div class="inputBx">
            <span>Uso de la proteina</span>
            <input type="text" name="usoP">                <br>
        </div>

        <div class="inputBx">
            <span>Ingrese el cliente</span>
                    <select name="cliFk">
                        <?php
                        $query = $db->prepare("select docCliente, nombreCliente, apellidoCliente from cliente;");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["docCliente"].'">'.$valores["nombreCliente"].' '.$valores["apellidoCliente"].'</option>';
                        endforeach;
                        ?>
                    </select>
        </div>
        <div class="inputBx">
            <span>Ingrese el entrenador</span>
                    <select name="entreFk">
                    <?php
                        $query = $db->prepare("select docEntrenador, nombreEntrenador from entrenador;");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["docEntrenador"].'">'.$valores["nombreEntrenador"].'</option>';
                        endforeach;
                        ?>
                    </select>
        </div>

        
        <br>
        
        <div class="inputBx">
            <input type="submit" value="Guardar" >
</div>
				
</div>
</div>
</section>
</form>
</body>
</html>