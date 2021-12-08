<?php
    require_once '../modelos/modeloConexion.php';
    require_once '../modelos/modeloDieta.php';

    switch ($_GET['op']) {
        case 'consultar':
            $objDieta = new modeloDieta(NULL, NULL, NULL, NULL, NULL, NULL, NULL);
            $datos = $objDieta->consultarListaD();
            $data = array();
            foreach($datos as $row){
                $idDieta = $row['idDieta'];
                $sub_array = array();
                $sub_array[] = $idDieta;
                $sub_array[] = $row['fechaInicio'];
                $sub_array[] = $row['fechaFin'];
                $sub_array[] = $row['diaDieta'];
                $sub_array[] = $row['planDieta'];
                $sub_array[] = $row['clienteFk'];
                $sub_array[] = $row['entrenadorFk'];
                $sub_array[] = "<button onclick='actualizarDieta($idDieta)' class='btn btn-outline-info bi bi-pencil' style='margin: 2px;'>Actualizar</button>
                <button onclick='eliminarDieta($idDieta)' class='btn btn-outline-danger bi bi-trash' style='margin: 2px;'>Eliminar</button>";
                $data[] = $sub_array;
            };
            $results = array('sEcho'=>1, 'iTotalRecords'=>count($data), 'iTotalDisplayRecords'=>count($data), 'aaData'=>$data);
            echo json_encode($results);
            break;
        
      
    }

    if(isset($_POST['DiaD'])){
        $fechaIniDIn = $_POST['fechaIniD'];
        $fechaFDIn = $_POST['FechaFinD'];
        $diaDIn = $_POST['DiaD'];
        $planDIn = $_POST['planD'];
        $idCIn = $_POST['idCliente'];
        $idEIn = $_POST['idEntrenador'];

        $objDieta = new modeloDieta(NULL, $fechaIniDIn, $fechaFDIn, $diaDIn, $planDIn, $idCIn,$idEIn);

        $objDieta->insertarDieta();

        header('location: ../vistas/dieta/ListaDieta.php');
    }
    if(isset($_POST['DiaDUpDate']))
    {
        
        $idDieta = $_POST['idDietaUpDate'];
        $fechaInIn = $_POST['fechaIniDUpDate']; 
        $fechaFinIn = $_POST['fechaFinDUpDate']; 
        $diaIn = $_POST['DiaDUpDate']; 
        $planIn = $_POST['planDUpDate']; 
        $idCIn = $_POST['idClienteUpDate'];
        $idEIn = $_POST['idEntrenadorUpDate'];

        $objDieta = new modeloDieta( $idDieta, $fechaInIn, $fechaFinIn, $diaIn, $planIn, $idCIn, $idEIn);

        $objDieta->actualizarDieta();
        
        header('location: ../vistas/Dieta/ListaDieta.php');
    }
    if (isset($_GET['idDietaDelete'])){
        $idDietaIn = $_GET['idDietaDelete'];

        $objDieta = new modeloDieta ($idDietaIn, NULL, NULL, NULL, NULL, NULL, NULL);
        $objDieta->eliminarDieta();

        header('location: ../vistas/Dieta/ListaDieta.php');
    }   

?>