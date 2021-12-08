<?php

    require_once '../modelos/modeloContraindicaciones.php';
    if(isset($_POST['nombreContraindicacion'])) {
        // echo $_POST['nombreContraindicacion'];
         $descripcionTIn = $_POST['nombreContraindicacion'];
         
        
         $objContraindicaciones = new modeloContraindicaciones(null, $descripcionTIn);
        $objContraindicaciones->InsertarContraindicaciones();
        header('location: ../vistas/Contraindicaciones/listaContraindicaciones.php');
    }

    if (isset($_POST['idUpDate']))
    {
        // echo $_POST['nombreUpdate'];
        $idTIn = $_POST['idUpDate'];
        $descripcionTIn = $_POST['nombreUpdate'];

        $objContraindicaciones = new modeloContraindicaciones($idTIn, $descripcionTIn);
        $objContraindicaciones->actualizarContraindicaciones();
        header('location: ../vistas/Contraindicaciones/listaContraindicaciones.php');

    }

    if (isset($_GET['idContraindicacionesDelete']))
	{
		$idTIn = $_GET['idContraindicacionesDelete'];

		$objContraindicaciones = new modeloContraindicaciones($idTIn, NULL);
		$objContraindicaciones->eliminarContraindicaciones();

		header('location: ../vistas/Contraindicaciones/ListaContraindicaciones.php');
	}

    ?>