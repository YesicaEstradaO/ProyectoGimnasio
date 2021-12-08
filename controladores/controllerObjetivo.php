<?php

    require_once '../modelos/mObjetivo.php';

    if(isset($_POST['docCliente']))
    {  

        $docCliente = $_POST['docCliente'];
        $descripcion = $_POST['descripcion'];
        $fechaCumplimiento = $_POST['fechaCumplimiento'];
        $fechaInicio = $_POST['fechaInicio']; 

        $objObjetivo = new mObjetivo(NULL, $descripcion, $fechaCumplimiento, $fechaInicio, $docCliente);

        $objObjetivo->insertarObjetivo();
        header('location: ../vistas/objetivo/C_Objetivo.php');

    }

    if(isset($_POST['idObjetivoUpdate']))
    {  

        $idObjetivo = $_POST['idObjetivoUpdate'];
        $docCliente = $_POST['docClienteUpdate'];
        $descripcion = $_POST['descripcionUpdate'];
        $fechaCumplimiento = $_POST['fechaCumplimientoUpdate'];
        $fechaInicio = $_POST['fechaInicioUpdate']; 

        $objObjetivo = new mObjetivo($idObjetivo, $descripcion, $fechaCumplimiento, $fechaInicio, $docCliente);

        $objObjetivo->actualizarObjetivo();
        header('location: ../vistas/objetivo/C_Objetivo.php');

    }

    if(isset($_GET['idObjetivoDelete']))
    {
        $idObjetivo = $_GET['idObjetivoDelete'];

        $objObjetivo = new mObjetivo($idObjetivo, NULL, NULL , NULL, NULL);
        $objObjetivo->eliminarObjetivo();

        header('location: ../vistas/objetivo/C_Objetivo.php');
    }

?>