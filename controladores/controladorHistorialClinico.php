<?php

    require_once '../modelos/mHistorialClinico.php';

    if(isset($_POST['docCliente']))
    {  

        $docCliente = $_POST['docCliente'];
        $eps = $_POST['eps'];
        $medicaciones = $_POST['tipoMedicaciones'];
        $detalleMedicacion = $_POST['detalleM'];
        $cirugias = $_POST['tipoCirugias'];
        $detalleCirugia = $_POST['detalleC'];
        $padecimiento = $_POST['tipoPadecimientos'];
        $detallePadecimiento = $_POST['detalleP'];

        $objHistorialClinico = new mHistorialClinico(NULL, $eps, $medicaciones, $detalleMedicacion, $cirugias,  $detalleCirugia, $padecimiento, $detallePadecimiento, $docCliente);

        $objHistorialClinico->insertarHistorialClinico();
        header('location: ../vistas/historialClinico/consultarXId.php');

    }

    if(isset($_POST['idHistorialClinicoUpdate']))
    {  

        $idHistorialClinico = $_POST['idHistorialClinicoUpdate'];
        $docCliente = $_POST['docClienteUpdate'];
        $eps = $_POST['epsUpdate']; 
        $medicaciones = $_POST['tipoMedicacionesUpdate'];
        $detalleMedicacion = $_POST['detalleMUpdate'];
        $cirugias = $_POST['tipoCirugiasUpdate'];
        $detalleCirugia = $_POST['detalleCUpdate'];
        $padecimiento = $_POST['tipoPadecimientosUpdate'];
        $detallePadecimiento = $_POST['detallePUpdate'];

        $objHistorialClinico = new mHistorialClinico($idHistorialClinico, $eps, $medicaciones, $detalleMedicacion, $cirugias,  $detalleCirugia, $padecimiento, $detallePadecimiento, $docCliente);

        $objHistorialClinico->actualizarHistorialClinico();
        header('location: ../vistas/HistorialClinico/C_HistorialClinico.php');

    }

    if(isset($_GET['idHistorialClinicoDelete']))
    {
        $idHistorialClinico = $_GET['idHistorialClinicoDelete'];

        $objHistorialClinico = new mHistorialClinico($idHistorialClinico, NULL, NULL , NULL, NULL, NULL, NULL , NULL, NULL);
        $objHistorialClinico->eliminarHistorialClinico();

        header('location: ../vistas/HistorialClinico/C_HistorialClinico.php');
    }


?>