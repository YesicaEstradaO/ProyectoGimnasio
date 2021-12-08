<?php

$paracorreo     = "yesipa534111@gmail.com";
$titulo         = "Test correo";
$mensaje        = "Hola mundo";
$tucorreo       = "From: yesipa534111@gmail.com";

if(mail($paracorreo, $titulo, $mensaje, $tucorreo))
{
    echo "correo enviado";
}else
{
    echo "error";
}