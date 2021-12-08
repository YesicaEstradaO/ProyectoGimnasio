<?php

    require_once '../modelos/modeloParteCuerpo.php';
    if(isset($_POST['nombreParte'])){
        $nombrePIn = $_POST['nombreParte'];

        $objParteCuerpo = new modeloParteCuerpo (NULL, $nombrePIn);
        $objParteCuerpo-> insertarParteCuerpo();
        header('location: ../vistas/PartesC/ListaParteCuerpo.php');
    }
    if (isset($_POST['idParteCuerpoUpDate'])){
    $idParteCuerpoIn = $_POST['idParteCuerpoUpDate'];
    $nombrePIn = $_POST['nombreParteCuerpoUpDate'];
    $objParteCuerpo = new modeloParteCuerpo($idParteCuerpoIn, $nombrePIn);

    $objParteCuerpo->actualizarParteCuerpo();
    header('location: ../vistas/partesC/ListaParteCuerpo.php');   
    }  
    if (isset($_GET['idParteCuerpoDelete'])){
        $idParteCuerpoIn = $_GET['idParteCuerpoDelete'];

        $objParteCuerpo = new modeloParteCuerpo($idParteCuerpoIn, null);
        $objParteCuerpo->eliminarParteCuerpo();
        header('location: ../vistas/partesC/ListaParteCuerpo.php');
    }

?>