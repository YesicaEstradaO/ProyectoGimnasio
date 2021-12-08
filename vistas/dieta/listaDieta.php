<html>
    <head>
        <meta charset="utf-8">
        <title>Consulta Dieta</title>
        <link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link hrefs="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
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
    <h1 align="center">Gestion de Dietas</h1>
        <button><a href="./insertarDieta.php">Nuevo</a></button>

            <table border="1" id="tablaDieta">
                <thead>
                    <tr>
                        <th>ID Dieta</th>
                        <th>Fecha Inicio </th>
                        <th>Fecha Final </th>
                        <th>Dia Semana</th>
                        <th>Plan Dieta</th>
                        <th>id Cliente</th>	
                        <th>id Entrenador</th>	
                        <th> -- </th> 

                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
            <script src="./listaDieta.js"></script>

    </body>
</html>