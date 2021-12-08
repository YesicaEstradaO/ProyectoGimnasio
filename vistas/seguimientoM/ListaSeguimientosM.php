<html>
    <head>
        <meta charset="utf-8">
        <title>Consulta Seguimiento de medidas</title>
        <link rel="stylesheet" type="text/css" href="../../css/tablas.css">
        <meta name="viewport" content="width=device-width, initial-scalee=1.0">
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

	<link rel="stylesheet" type="text/css" href="../../css/registrar.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
    <link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
    </head>
    <body>

    <nav>
    <div class="contentBx">
<div class="formBx">
<a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
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
    
<div id="main-container" class="table-responsive">
<h1 align="center">Seguimiento Medidas</h1>
            <table border="1" id="datat">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>fechaMedida </th>
                        <th>Medida </th>
                        <th>id cliente</th>
                        <th>id Entrenador</th>
                        <th>parte cuerpo</th>		
                        <th> -- </th> 

                    </tr>
                </thead>
                <tbody>
                     <?php
                            require_once '../../modelos/modeloSeguimientoM.php';

                            $ObjSeguimiento = new modeloSeguimientoM(NULL,NULL,NULL,NULL,NULL,NULL);
                            $consultaSeguimiento = $ObjSeguimiento->consultarListaSeguimiento();
                        ?>
                            <tr>
                                <?php foreach ($consultaSeguimiento as $tablaSeguimiento): ?>
                                <td><?php echo $tablaSeguimiento->idSeguimiento ?></td>
                                <td><?php echo $tablaSeguimiento->fechaSeguimiento ?></td>
                                <td><?php echo $tablaSeguimiento->medidas ?></td>
                                <td><?php echo $tablaSeguimiento->clienteFk ?></td>
                                <td><?php echo $tablaSeguimiento->entrenadorFk ?></td>
                                <td><?php echo $tablaSeguimiento->parteCuerpoFk ?></td>

                                
                                
                                <td> 
                                <button onclick="location.href = 'actualizarSeguimientoM.php?idSeguimientoUpDate=<?php echo $tablaSeguimiento-> idSeguimiento ?>'">ACTUALIZAR</button>
                                <button onclick="location.href ='../../controladores/controladorSeguimientoMedidas.php?idSeguimientoDelete=<?php echo $tablaSeguimiento->idSeguimiento ?>'">ELIMINAR</button>
                                </td>
                            </tr>
                    <?php endforeach ?>
                    </tbody>
            </table>
            </section>

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