<?php
        require_once '../modelos/modeloConexion.php';

        try{
            if(isset($_POST['email']) && !empty($_POST['email'])){

                $pass = substr( md5(microtime()), 1, 10);
                $mail = $_POST['email'];

                // Conexion a la bd
                
                $conn = new mysqli("127.0.0.1", "root", "", "proyectoGimnasio");

                if($conn->connect_error){
                    die("Conexion Fallida ".$conn->connect_error);
                }
                

                $sql = "UPDATE usuario SET contrasenaUsuario='$pass' where correoUsuario='$mail'";

                if($conn->query($sql) === TRUE){
                    echo "usuario modificado correctamente";

                    $to = $_POST['email']; //Destinario del email
                    $from = "From: yesipa534111@gmail.com";
                    $subject = "Recuperación Contraseña Fit Power";
                    $menssage = "El sistema le asigno la siguiente clave: ".$pass;
                    // ." Recuerde, su nombre de usuario es ".$mail

                    if(mail($to, $subject, $menssage, $from)){
                        echo 'Correo enviado exitosamente a ' . $_POST['email'];
                    }
                    else{
                        echo 'fallo en el envio';
                    }
                    


                }else{
                    echo "Error modificando ".$conn->error;
                }
            }
            else
                echo 'Información imcompleta';
        }catch(Exception $e){
            echo 'Excepcion capturada: '.$e->getMessage(), "\n";
        }