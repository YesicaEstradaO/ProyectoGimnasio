<?php

require('FPDF/fpdf.php');
require_once '../modelos/modeloUsuario.php';

if (isset($_POST['nombreUsuario']))
{
    $nombreUsuario = $_POST['nombreUsuario'];

    $objUsuario = new modeloUsuario(NULL, $nombreUsuario,NULL, NULL, NULL, NULL, NULL, NULL, NULL);
    
    $consulta = $objUsuario->consultaLogin();

    $usuarioDB = $consulta->nombre_Usuario;
    $contraDB = $consulta->password_Usuario;
    $rolDB = $consulta->rol_Usuario; 
}


    $pdf = new FPDF();

    $pdf->AddPage();
    $pdf->Image('../img/sonrisa.jpg',172,5,-700, 12);
    $pdf->setFont('Times','B', 16);
    $pdf->Cell(0, 10, 'Roal-Dent', 0, 1, 'C');
    $pdf->Cell(40,10, 'Nombre: '.$usuarioDB, 0, 1);
    $pdf->Cell(70,10,'Contrasena: '.$contraDB,0, 1);
    $pdf->Cell(70,10,'Rol: '.$rolDB,0, 0);


    $pdf->Output();

?>