<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="../../img/favicon.png">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fa76aab2e2.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="../../css/login.css">
	<title>Login</title>
</head>
<body>
		<section>
			<div class="imgBx">
				<img src="../../img/loginimg1.jpg">

			</div>


			<div class="contentBx">
				<div class="formBx">
				<a class="backBtn fa fa-chevron-left" href="../../index.html"></a>
				<h2>Recuperar Contraseña</h2>
				<form id="formLogin" method="post" action="../../controladores/controladorRecuerarContra.php"> 
					<div class="inputBx">
						<span>Correo</span>
						<input type="email" name="email" id="username" placeholder="Digite su correo">
					</div>
					<div class="inputBx">
						<input id="login" type="submit" value="Enviar" name="submit">
					</div>
					<div class="row" id="load" hidden="hidden">
						<div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
							<div class="col-xs-12 center text-accent">
								<span>validando información...</span>
							</div>
						</div>
					</div>

					<div class="inputBx">
						<p>Desea Iniciar Sesión?<a href="../login.php"> Ingresar</a></p>
					</div>

</form>
			</div>
			</div>
			
		</section>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>        
		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<!-- <script src="../../js/sweetAlert.js"></script> -->

		
	</body>
</html>