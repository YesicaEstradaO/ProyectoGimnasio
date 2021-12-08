<?php

    require_once '../modelos/modeloAdmin.php';

    if(isset($_POST['docAdmin']))
    {
        $docAIn = $_POST['docAdmin'];
        $celAIn = $_POST['celAdmin'];
        $correoAIn = $_POST['correoAdmin'];
        $direcAIn = $_POST['direcAdmin'];
        $estadoIn = $_POST['estadoAdmin'];
        $nombreAIn = $_POST['nombreAdmin'];
        $usufkIn = $_POST['usuafk'];

        $objAdmin = new modeloAdmin($docAIn,$celAIn,$correoAIn,$direcAIn,$estadoIn,$nombreAIn,$usufkIn);

        $objAdmin->insertarAdministrador();

		header('location: ../vistas/admin/insertarAdmin.php');
    }
    if(isset($_POST['docUpdate']))
    {
        $docAdmIn = $_POST['docUpdate'];
        $celAdmIn = $_POST['celUpdate'];
        $correoAdmIn = $_POST['correoUpdate'];
        $direcAdmIn = $_POST['direcUpdate'];
        $estadoAdIn = $_POST['estadoUpdate'];
        $nombreAdmIn = $_POST['nombreUpdate'];
        $usufkAdIn = $_POST['usuafkUpdate'];

        $objAdmin = new modeloAdmin($docAdmIn,$celAdmIn,$correoAdmIn,$direcAdmIn,$estadoAdIn,$nombreAdmIn,$usufkAdIn);

        $objAdmin->actualizarAdmin(); 
        header('location: ../vistas/admin/consultarAdmin.php');
    }