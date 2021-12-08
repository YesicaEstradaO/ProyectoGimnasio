<?php
    require_once '../modelos/modeloEntrenador.php';

    if(isset($_POST['docE']))
    {
        $docEIn = $_POST['docE'];
        $celEIn = $_POST['celE'];
        $dirEIn = $_POST['direcE'];
        $estadoIn = $_POST['estado'];
        $nomEIn = $_POST['nombreE'];     
        $usuaFkIn = $_POST['usuarioFEntren'];
        
        $objEntrenador = new modeloEntrenador($docEIn,$celEIn,$dirEIn,$estadoIn,$nomEIn,$usuaFkIn);
        $objEntrenador->insertarEntrenador();

        header('location: ../vistas/entrenador/consultarEntrenador.php');
    }
    if(isset($_POST['docEUpdate']))
    {
        $docEntreIn = $_POST['docEUpdate'];
        $celEntreIn = $_POST['celEUpdate'];
        $dirEntreIn = $_POST['direcEUpdate'];
        $estadoEnIn = $_POST['estadoUpdate'];
        $nomEntreIn = $_POST['nombreEUpdate'];
        $usuaEnFkIn = $_POST['usuarioUpdate'];

        $objEntrenador = new modeloEntrenador($docEntreIn,$celEntreIn,$dirEntreIn,$estadoEnIn,$nomEntreIn,$usuaEnFkIn);
        $objEntrenador->actualizarEntrenador();

       // header('location: ../vistas/entrenador/consultarEntrenador.php');


    }

    if(isset($_GET['docEDelete']))
    {
        $docEntrenadorIn = $_GET['docEDelete'];

        $objEntrenador = new modeloEntrenador($docEntrenadorIn,NULL,NULL,NULL,NULL,NULL);
        $objEntrenador->eliminarEntrenador();

        header('location: ../vistas/entrenador/consultarEntrenador.php');

    }