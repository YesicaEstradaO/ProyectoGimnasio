<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/registrar.css">
    <link rel="stylesheet" type="text/css" href="../../css/Estilovalidar.css">
	<link rel="stylesheet" type="text/css" href="../../css/Backbtn.css">
    
	<link rel="stylesheet" type="text/css" href="../../css/tconsulta.css">
	<link rel="stylesheet" type="text/css" href="../../css/adminis.css">
	<title>Dieta</title>
</head>
<body>

<nav>
	<input type="checkbox" id="checkN">
	<label for="checkN" class="checkbtn">
	<i class="fas fa-bars"></i>
	</label>
	<a href="../Menus/Entrenador/menu.php"><label class="logo">Entrenador</label></a>
	<ul>

        <li><a href="../dieta/listaDieta.php">Gest. Dieta</a></li>
        <li><a href="../rutina/listaRutina.php">gest. ruina</a></li>
        <li><a href="../Menus/Entrenador/C_HistorialClinicoE.php">Historial Clinico</a></li>
        <li><a href="../Menus/Entrenador/consultarClienteE.php">clientes</a></li>
        <li><a href="../proteinas/consultarProteina.php">Proteinas</a></li>
		<li><a href="../seguimientoM/ListaSeguimientosM.php">Seguimiento Medidas</a></li>
        <li><a href="../../controladores/controladorCerrarSesion.php">Salir</a></li>


	</ul>
</nav>
		<section>
			


			<div class="contentBx">
				<div class="formBx">
				    <a class="backBtn fa fa-chevron-left" href="./tconsulta.html"></a>
				    <h2>Insertar Dieta</h2>
				    <form method="POST" action="../../controladores/controladorDieta.php" class="formu" id="formularioDieta">
                    
                        <div class="inputBx">
                            <div class="form-Box form-error">
                            <span>doc id) Cliente</span> 
                            <input type="number" name="idCliente">
                            <small class="error-text">Introduzca un id valido</small>
                            </div>                  
                        </div>
                        <div class="inputBx">
                            <div class="form-Box form-error">
                            <span>doc(id) entrenador</span>
                            <input type="number" name="idEntrenador">
                            <small class="error-text">Introduzca un id valido</small>
                            </div>                  
                        </div>
                        <div class="inputBx">
                            <span>Fecha Inicio Dieta</span>
                            <input type="date" name="fechaIniD">
                        </div>
                        <div class="inputBx">
                            <span>Fecha Fin Dieta</span>
                            <input type="date" name="FechaFinD">
                            
                        </div>
                        <div class="inputBx">
                            <div class="form-Box form-error">
                            <span>dia Dieta</span>
                            <input type="text" name="DiaD">
                            <small class="error-text">Introduzca solo caracteres alfabeticos</small>
                            </div>
                        </div>
                        <div class="inputBx">
                            <div class="form-Box form-error">
                            <span>Plan Dieta</span>
                            <input type="text" name="planD">
                            <small class="error-text">Introduzca solo caracteres alfabeticos</small>
                            </div>                  
                        </div>
                        
                        <div class="inputBx">
                            <div class="form-Box ">
                            <input type="submit" value="Insertar" name="" onclick="ConfirmDemo();">
                        </div>
                        <a href="ListaDieta.php"> Ver lista</a>
					
                    </div>
				    </form>
				
			    </div>
			</div>
			
		</section>

        <script>

        function ConfirmDemo() {
            //Ingresamos un mensaje
            var mensaje = confirm("¿Te gusta Desarrollar con JavaScript?");
            //Verificamos si el usuario acepto el mensaje
            if (mensaje) {
            alert("¡Gracias por confirmar!");
            }
            //Verificamos si el usuario denegó el mensaje
            else {
            alert("¡Haz denegado el mensaje!");
            }
        }

    </script>

        <script src="../../js/validarForm.js"></script>
</body>