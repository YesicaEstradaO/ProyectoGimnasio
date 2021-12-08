<?php

    require_once '../modelos/modeloTipoEjercicio.php';
    if(isset($_POST['nombreTipoEjercicio'])) {
        echo $_POST['nombreTipoEjercicio'];
         $nombreTIn = $_POST['nombreTipoEjercicio'];
         
        
        $objTipoEjercicio = new modeloTipoEjercicio(null, $nombreTIn);
        $objTipoEjercicio->InsertarTipoEjercicio();
         header('location: ../vistas/TipoEjercicio/listaTipoEjercicio.php');

        
    } 
 
    if (isset($_POST['idUpDate']))
    {
        $idTIn = $_POST['idUpDate'];
        $nombreEjerciciosIn = $_POST['nombreUpdate'];
 
        $objTipoEjercicio = new modeloTipoEjercicio($idTIn, $nombreEjerciciosIn);
        $objTipoEjercicio->actualizarTipoEjercicio();
        header('location: ../vistas/TipoEjercicio/listaTipoEjercicio.php');

    }

    if (isset($_GET['idTipoejercicioDelete'])){
        $idIn = $_GET['idTipoejercicioDelete'];

        $objTipoejercicio = new modeloTipoejercicio ( $idIn, NULL);
        $objTipoejercicio->eliminarTipoejercicio();

        header('location: ../vistas/Tipoejercicio/ListaTipoejercicio.php');
    }   

?>