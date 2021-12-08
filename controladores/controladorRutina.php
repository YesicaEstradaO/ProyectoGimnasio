<?php

     require_once '../modelos/modeloRutina.php';
     if(isset($_POST['diaRutina'])){
        //  echo $_POST['planRutina'];
        //  echo $_POST['intensidadRutina'];
        //  echo $_POST['diaRutina'];
        //  echo $_POST['clienteFk'];
        //  echo $_POST['entrenadorFk'];
        $planRIn = $_POST['planRutina'];
        $intensidadRIn = $_POST['intensidadRutina'];
        $diaRIn = $_POST['diaRutina'];
        $idCRIN = $_POST['clienteFk'];
        $idEIN = $_POST['entrenadorFk'];

        $objRutina = new modeloRutina(NULL, $planRIn, $intensidadRIn, $diaRIn, $idCRIN, $idEIN);

        $objRutina->insertarRutina();


       header('location: ../vistas/Rutina/insertarRutina.php');
    }
    
    if(isset($_POST['idUpDate']))
    {   echo $_POST['PlanUpdate'];
        $idRutina = $_POST['idUpDate'];
        $planRutina = $_POST['PlanUpdate']; 
        $intensidadRutina = $_POST['intensidadUpdate']; 
        $diaRutina = $_POST['diaUpdate']; 
        $clienteFK = $_POST['clienteFKUpDate']; 
        $entrenadorFK = $_POST['entrenadorFKUpDate'];

        $objRutina = new modeloRutina( $idRutina , $planRutina, $intensidadRutina, $diaRutina, $clienteFK, $entrenadorFK);

        $objRutina->actualizarRutina();
        
        header('location: ../vistas/Rutina/ListaRutina.php');
    }
    if (isset($_GET['idRutinaDelete'])){
        $idRIn = $_GET['idRutinaDelete'];

        $objRutina = new modeloRutina ($idRIn, NULL, NULL, NULL, NULL, NULL);
        $objRutina->eliminarRutina();

        header('location: ../vistas/Rutina/ListaRutina.php');
    }   

?>