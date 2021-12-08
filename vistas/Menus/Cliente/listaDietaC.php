<html>
    <head>
        <meta charset="utf-8">
        <title>Consulta Dieta</title>
        <!-- <link rel="stylesheet" type="text/css" href="../../css/tablas.css"> -->
        <meta name="viewport" content="width=device-width, initial-scalee=1.0">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
        <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

    </head>
    <body>
	
    <?php include('./menu.php') ?>
    <div id="main-container" class="table-responsive">

    <h1 align="center">Dietas del Cliente</h1>


            <table border="1" id="datat">
                <thead>
                    <tr>
                        <th>ID Dieta</th>
                        <th>Fecha Inicio </th>
                        <th>Fecha Final </th>
                        <th>Dia Semana</th>
                        <th>Plan Dieta</th>
                        <th>id Cliente</th>	
                        <th>id Entrenador</th>

                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
                
            </table>


            <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
            <script src="./listaDieta.js"></script>

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