<?php
	error_reporting(E_ERROR | E_PARSE);
    require_once '../../modelos/modeloProteina.php';
    if(empty($_GET['idProteina']))
    {
        header('location: consultarProteina.php');
    }
    else
    {
        $idProteina = $_GET['idProteina'];
        $objProteina = new modeloProteina($idProteina, NULL, NULL, NULL, NULL, NULL);
        $consultaProteina = $objProteina->consultarXIdP();
        $countProteina = count($consultaProteina);
        if($countProteina == 0)
        {
            header('location: consultarProteina.php');
        }
    }
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
	<title>Actualizar</title>
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
<h2>Actualiza Proteina</h2>
    <form action="../../controladores/controladorProteina.php" method="POST">
    
        <div class="inputBx"> 
            <input type="hidden" name="idProteinaUpdate" value="<?php echo $consultaProteina->idProteina; ?>"></br>
                <span>Ingrese el nombre de la proteina</span>
                <input type="text" name="nombreProteinaUpdate"  value="<?php echo $consultaProteina->nombreProteina;?>">                        <br>
        </div>
        <div class="inputBx">
            <span>Ingrese la marca del producto</span>
            <input type="text" name="marcaPUpdate" value="<?php echo $consultaProteina->marcaProteina;?>">                    <br>  
        </div>
        <div class="inputBx">
            <span>Uso de la proteina</span>
            <input type="text" name="usoPUpdate" value="<?php echo $consultaProteina->usoProteina;?>">                <br>
        </div>
        
        <?php
         $usuario = 'root';
         $password = '';
         $db = new PDO('mysql:host=localhost;dbname=proyectogimnasio', $usuario, $password); 
        ?>
        <div class="inputBx">
            <span>Seleccione su el cliente</span>
                    <select name="cliFkUpdate" value="<?php echo $consultaProteina->clienteFk;?>">
                    <?php
                        
                        $query = $db->prepare("select docCliente, nombreCliente from cliente;
                        ");
                        $query->execute();
                        $data = $query->fetchAll();

                        foreach ($data as $valores):
                        echo '<option value="'.$valores["docCliente"].'">'.$valores["nombreCliente"].'</option>';
                        endforeach;
                        ?>
                    </select>
        </div>
        <div class="inputBx">
            <span>Ingrese el entrenador</span>
                    <select name="entreFkUpdate" value="<?php echo $consultaProteina->entrenadorFk;?>">
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
