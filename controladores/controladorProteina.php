<?php
    require_once '../modelos/modeloConexion.php';
    require_once '../modelos/modeloProteina.php';
    
    switch ($_GET['op']) {
        case 'consultar':

            $objProteina = new modeloProteina(NULL,null,null,null,null,null);
            $datos = $objProteina->consultarProteina();
            $data = array();
            foreach ($datos as $row) {
                $idProteina = $row['idProteina'];
                $sub_array = array();
                $sub_array[] = $idProteina;
                $sub_array[]= $row['nombreProteina'];
                $sub_array[]= $row['marcaProteina'];
                $sub_array[]= $row['usoProteina'];
                $sub_array[]= $row['nombreCliente'];
                $sub_array[]= $row['nombreEntrenador'];
                $sub_array[] = "<button onclick='actualizarProteina($idProteina)' class='btn btn-outline-info bi bi-pencil' style='margin: 2px;'>Actualiza</button>
                <button onclick='eliminarProteina($idProteina)' class='btn btn-outline-danger bi bi-trash' style='margin: 2px;'>Eliminar</button>";
                $data[] = $sub_array;
            };
            $results = array('sEcho'=>1, 'iTotalRecords'=>count($data), 'iTotalDisplayRecords'=>count($data), 'aaData'=>$data);
            echo json_encode($results);
            break;
    }
    

    if(isset($_POST['nombreProteina']))
    {
        $nombrePIn = $_POST['nombreProteina'];
        $marcaPIn =  $_POST['marcaP'];
        $usoPIn = $_POST['usoP'];
        $clieFkIn = $_POST['cliFk'];
        $entreFkIn = $_POST['entreFk'];

        $objProteina = new modeloProteina(NULL, $nombrePIn,$marcaPIn,$usoPIn,$clieFkIn,$entreFkIn);
        $objProteina->insertarProteina();

        header('location: ../vistas/proteinas/consultarProteina.php');

    }
    if(isset($_POST['idProteinaUpdate']))
    {
        $idProteinaUpdate = $_POST['idProteinaUpdate'];
        $nombrePUpdate = $_POST['nombreProteinaUpdate'];
        $marcaPUpdate =  $_POST['marcaPUpdate'];
        $usoPUpdate = $_POST['usoPUpdate'];
        $clieFkUpdate = $_POST['cliFkUpdate'];
        $entreFkUpdate = $_POST['entreFkUpdate'];

        $objProteina = new modeloProteina($idProteinaUpdate,$nombrePUpdate,$marcaPUpdate,$usoPUpdate,$clieFkUpdate,$entreFkUpdate);
        $objProteina->actualizarProteina();

        header('location: ../vistas/proteinas/consultarProteina.php');

    }
    
    if(isset($_GET['docPDelete']))
    {
        $idProteinaIn = $_GET['docPDelete'];

        $objProteina = new modeloProteina($idProteinaIn,NULL,NULL,NULL,NULL,NULL);
        $objProteina->eliminarProteina();

        header('location: ../vistas/proteinas/consultarProteina.php');

    }
    