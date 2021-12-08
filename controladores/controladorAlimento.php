<?php

       require_once '../modelos/modeloConexion.php';
    require_once '../modelos/modeloAlimento.php';

    switch ($_GET["op"]) {
        case 'consultar':
            $objAlimento = new modeloAlimento(NULL, NULL, NULL, NULL, NULL);
            $datos = $objAlimento->consultarListaAlimento();
            $data = array();
            foreach($datos as $row){
                $idAlimento = $row["idAlimento"];
                $sub_array = array();
                $sub_array[] = $idAlimento;
                $sub_array[] = $row["nombreAlimento"];
                $sub_array[] = $row["valorNutricional"];
                $sub_array[] = $row["aminoacidosXporcion"];
                $sub_array[] = $row["caloriasXporcion"];
                $sub_array[] = "<button onclick='actualizarAlimento($idAlimento)' class='btn btn-outline-info bi bi-pencil' style='margin: 2px;'></button>
                                <button onclick='eliminarAlimento($idAlimento)' class='btn btn-outline-danger bi bi-trash' style='margin: 2px;'></button>";
                $data[] = $sub_array;
            };
            $results = array('sEcho'=>1, 'iTotalRecords'=>count($data), 'iTotalDisplayRecords'=>count($data), 'aaData'=>$data);
            echo json_encode($results);
        break;
    }

    if(isset($_POST['nombreAli'])){
        $nombreAIn = $_POST['nombreAli'];
		$valorAIn = $_POST['valorAli'];
		$aminoAIn = $_POST['aminoAli'];
		$caloriasAIn = $_POST['caloriasAli'];

        $objAlimento = new modeloAlimento (NULL, $nombreAIn,$valorAIn, $aminoAIn, $caloriasAIn);
        $objAlimento->insertarAlimento();
        header('location: ../vistas/alimento/ListaAlimentos.php');
	
    }
    if (isset($_POST['idAlimentoUpDate']))
    {
        $idAlimentoIn = $_POST['idAlimentoUpDate'];
        $nombreAlimentoIn = $_POST['nombreAlimentoUpDate'];
        $valorAlimentoIn = $_POST['valorAlimentoUpDate'];
        $aminoAlimentoIn = $_POST['aminoAlimentoUpDate'];
        $caloriasAlimentoIn = $_POST['caloriasAlimentoUpDate'];
        $objAlimento = new modeloAlimento($idAlimentoIn, $nombreAlimentoIn, $valorAlimentoIn,$aminoAlimentoIn, $caloriasAlimentoIn);
        
        $objAlimento->actualizarAlimento(); 
        header('location: ../vistas/alimento/ListaAlimentos.php');                                                                                              
    
    }
    if (isset($_GET['idAlimentoDelete'])){
        $idAlimentoIn = $_GET['idAlimentoDelete'];

        $objAlimento = new modeloAlimento ($idAlimentoIn, NULL, NULL, NULL, NULL);
        $objAlimento->eliminarAlimento();

        header('location: ../vistas/alimento/ListaAlimentos.php');
    }                                                                                                                                                      

?>