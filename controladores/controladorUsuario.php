<?php
    require_once '../modelos/modeloUsuario.php';

    //insertar
    if(isset($_POST['documentoUsuario']))
    {
        $docUIn = $_POST['documentoUsuario'];
        $celUIn = $_POST['celularUsuario'];
        $contraUIn = $_POST['contraseñaU'];
        $correoUIn = $_POST['correoU'];
        $nombreUIn = $_POST['nombreUsuario'];
        $tipoUIn = $_POST['tipoUsuario'];
        
        $objUsuario = new modeloUsuario($docUIn, $celUIn, $contraUIn,$correoUIn,$nombreUIn,$tipoUIn);

        $objUsuario->insertarUsuario();

        header('location: ../vistas/usuario/consultarUsuario.php');
    }

    //actualizar
    if(isset($_POST['docUpdate']))
    {
        echo $_POST['contraUpdate'];
        $docUsuarioIn = $_POST['docUpdate'];
        $celUsuarioIn = $_POST['celUpdate'];
        $contraUsuarioIn = $_POST['contraUpdate'];
        $correoUsuarioIn = $_POST['correoUpdate'];
        $nombreUsuarioIn = $_POST['nombreUpdate'];
        $tipoUsuarioIn = $_POST['tipoUpdate'];

        $objUsuario = new modeloUsuario($docUsuarioIn, $celUsuarioIn, $contraUsuarioIn, $correoUsuarioIn, $nombreUsuarioIn, $tipoUsuarioIn);
        $objUsuario->actualizarUsuario();

        header('location: ../vistas/usuario/consultarUsuario.php');
        
    }
    if(isset($_GET['docDelete']))
    {
        $docUsuarioIn = $_GET['docDelete'];

        $objUsuario = new modeloUsuario($docUsuarioIn, NULL, NULL, NULL, NULL, NULL);
        $objUsuario->eliminarUsuario();

        header('location: ../vistas/usuario/consultarUsuario.php');

    }


