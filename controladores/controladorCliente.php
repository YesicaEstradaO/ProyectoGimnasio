<?php

    require_once '../modelos/modeloCliente.php';

    if(isset($_POST['documentoCliente']))
    {
        $docCIn = $_POST['documentoCliente'];
        $altCIn = $_POST['alturaCli'];
        $apeCIn = $_POST['apellidoCliente'];
        $celCIn = $_POST['celCliente'];
        $estadoIn = $_POST['estadoCliente'];
        $nomCIn = $_POST['nombreCliente'];       
        $pesoCIn = $_POST['pesoCli'];
        $docEnIn = $_POST['entrenadorFk'];
        $docUsIn = $_POST['usuarioFk'];
        

        $objCliente = new modeloCliente($docCIn,$altCIn,$apeCIn, $celCIn,$estadoIn,$nomCIn,$pesoCIn, $docEnIn, $docUsIn);

        $objCliente->insertarCliente();

        header('location: ../vistas/cliente/consultarCliente.php');
        
    }
    if(isset($_POST['docUpdate']))
    {
        $docClienteIn = $_POST['docUpdate'];
        $nomClienteIn = $_POST['nombreUpdate'];
        $apeClienteIn = $_POST['apellidoUpdate'];
        $estadoCIn = $_POST['estadoUpdate'];
        $altClienteIn = $_POST['alturaUpdate'];
        $pesoClienteIn = $_POST['pesoUpdate'];
        $docUsuaIn= $_POST['usuaUpdate'];
        $docEntIn = $_POST['entrenUpdate'];
        $celClienteIn = $_POST['celUpdate'];

        $objCliente = new modeloCliente($docClienteIn,$altClienteIn,$apeClienteIn, $celClienteIn,$estadoCIn,$nomClienteIn,$pesoClienteIn, $docEntIn, $docUsuaIn );
        $objCliente->actualizarCliente();

        header('location: ../vistas/cliente/consultarCliente.php');
    }

    if(isset($_GET['docClienteDelete'])){

        $docClienteIn = $_GET['docClienteDelete'];

        $objCliente = new modeloCliente($docClienteIn, NULL, NULL,NULL, NULL, NULL, NULL, NULL, NULL);
        $objCliente->eliminarCliente();

        header('location: ../vistas/cliente/consultarCliente.php');
    }