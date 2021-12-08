<html>
    <head>
        <meta charset="utf-8">
        <title>Consulta Parte Cuerpo</title>
        <link rel="stylesheet" type="text/css" href="../../css/tablas.css">
        <meta name="viewport" content="width=device-width, initial-scalee=1.0">
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

    </head>
    <body>
	



            <table border="1" id="datat">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE </th>	
                        <th> -- </th> 

                    </tr>
                </thead>
                <tbody>
                     <?php
                            require_once '../../modelos/modeloParteCuerpo.php';

                            $objParteCuerpo = new modeloParteCuerpo(NULL,NULL);
                            $consultaParteCuerpo = $objParteCuerpo->consultarParteCuerpo();
                        ?>
                            <tr>
                                <?php foreach ($consultaParteCuerpo as $tablaParteCuerpo): ?>
                                <td><?php echo $tablaParteCuerpo->idParteCuerpo ?></td>
                                <td><?php echo $tablaParteCuerpo->nombreParteCuerpo ?></td>

                                
                                
                                <td> 
                                <button onclick="location.href = 'actualizarParteCuerpo.php?idParteCuerpoUpDate=<?php echo $tablaParteCuerpo-> idParteCuerpo ?>'">ACTUALIZAR</button>
                                <button onclick="location.href ='../../controladores/controladorParteCuerpo.php?idParteCuerpoDelete=<?php echo $tablaParteCuerpo->idParteCuerpo ?>'">ELIMINAR</button>
                                </td>
                            </tr>
                    <?php endforeach ?>
                    </tbody>
            </table>
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