<?php
    require_once '../modelos/modeloSeguimientoM.php';

    if(isset($_POST['medidasCliente']))
    {
        $fechaSIn = $_POST['fechaMedida'];
        $medidasSIn = $_POST['medidasCliente'];
        $idCIn = $_POST['idCliente'];
        $idEIn = $_POST['idEntrenador'];
        $idParteCuerpoIn = $_POST['parteCuerpo'];

        $objSeguimiento = new modeloSeguimientoM(NULL, $fechaSIn, $medidasSIn, $idCIn, $idEIn, $idParteCuerpoIn);

        $objSeguimiento->insertarSeguimientoM();

        header('location: ../vistas/seguimientoM/ListaSeguimientosM.php');
    }
    if(isset($_POST['idSeguimientoUpDate']))
    {
       
        $idSeguimientoM = $_POST['idSeguimientoUpDate'];
        $fechaIn = $_POST['fechaSeguimientoUpDate'];
        $medidasIn = $_POST['medidaSeguimientoUpDate'];
        $idCIn = $_POST['idClienteUpDate'];
        $idEIn = $_POST['idEntrenaUpDate'];
        $idparteCuerpoIn = $_POST['idParteCuerpoUpDate'];

        $objSeguimiento = new modeloSeguimientoM($idSeguimientoM, $fechaIn, $medidasIn, $idCIn, $idEIn, $idparteCuerpoIn);

		$objSeguimiento->actualizarSeguimientoM();

        header('location: ../vistas/SeguimientoM/ListaSeguimientosM.php');

    }
    if (isset($_GET['idSeguimientoDelete'])){
        $idSeguimientoIn = $_GET['idSeguimientoDelete'];

        $objSeguimiento = new modeloSeguimientoM ($idSeguimientoIn, NULL, NULL, NULL, NULL, NULL);
        $objSeguimiento->eliminarSeguimiento();

        header('location: ../vistas/seguimientoM/ListaSeguimientosM.php');
    }   


?>