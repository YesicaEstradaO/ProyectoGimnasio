<?php

require_once '../modelos/modeloUsuario.php';
echo "<script src='//cdn.jsdelivr.net/npm/sweetalert2@11'></script>";

if(! $_POST['username']){
    echo "
        <body>
        <script>
            Swal.fire({
                icon:'warning',
                title: 'Debe ingresar un usuario o correo'
            }).then((result)=>{
                window.location.href = '../vistas/login.php';
            }); 
        </script>";
}else if(! $_POST['pass']){
    echo "
        <body>
        <script>
            Swal.fire({
                icon:'warning',
                title: 'Debe ingresar la contraseña'
            }).then((result)=>{
                window.location.href = '../vistas/login.php';
            }); 
        </script>";
}

else if(isset($_POST['username']))
{
    $usuarioUIn = $_POST['username'];
    $contraUIn = $_POST['pass'];


    $objUsuario = new modeloUsuario(NULL, null, $contraUIn,$usuarioUIn, NULL,  NULL);

    $consulta = $objUsuario->consultaLogin();

    $usuarioDB = $consulta->correoUsuario;
    $contraDB = $consulta->contrasenaUsuario;
    $tipouDB = $consulta->nombreTipoUsuario;
    
        if($usuarioDB == $usuarioUIn && $contraDB == $contraUIn)
        {
            if($tipouDB == 'Administrador'){

                session_start();
                $_SESSION['user'] = $usuarioDB;
                echo "
                <body>
                <script>
                        Swal.fire({
                            icon:'success',
                            title:'Bienvenido Administrador',
                            confirmButtonColor:'#149c3f',
                            confirmButtonText:'Ingresar'
                        }).then((result)=>{
                            window.location.href = '../vistas/admin/menu.php';
                        }); 
                    </script>";
               // header('location: ../vistas/admin/menu.php');
            }
            elseif($tipouDB == 'Entrenador')
            {
                session_start();
                $_SESSION['user'] = $usuarioDB;
                echo "
                <body>
                <script>
                        Swal.fire({
                            icon:'success',
                            title:'Bienvenido Entrenador',
                            confirmButtonColor:'#149c3f',
                            confirmButtonText:'Ingresar'
                        }).then((result)=>{
                            window.location.href = '../vistas/entrenador/menu.php';
                        }); 
                    </script>";
                // header('location: ../vistas/entrenador/menu.php');
            }
            elseif($tipouDB == 'Cliente')
            {
                session_start();
                $_SESSION['user'] = $usuarioDB;
                echo "
                <body>
                <script>
                        Swal.fire({
                            icon:'success',
                            title:'Bienvenido Querido Cliente',
                            confirmButtonColor:'#149c3f',
                            confirmButtonText:'Ingresar'
                        }).then((result)=>{
                            window.location.href = '../vistas/Menus/Cliente/menu.php';
                        }); 
                    </script>";
                // header('location: ../vistas/cliente/menu.php');
            }
        }
        else
        {

            session_destroy();
            echo "
                <body>
                <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Usuario y/o contraseña incorrecta!',
                        }).then((result)=>{
                            window.location.href = '../vistas/login.php';
                        }); 
                    </script>";
        }
    }


