<?php 
include_once('../CapaLogica/ControladoraLogin.php');

session_start();
try
{
	if (!empty($_POST))
	{
		$controller=new ControladoraLogin();
		if (isset($_POST["ingresar"] ) ){
			$respuesta = $controller->ValidarUsuario($_POST["usuario"],$_POST["password"] );
			if ($respuesta [0] [0] == 1) {
				$_SESSION['usuario'] = $_POST["usuario"];
				header ( "Location: index.php" );
			} else {
				echo "<script language='JavaScript'>alert ('El usuario o contraseña que ha ingresado es incorrecto. Vuelva a intentarlo.'); </script>";
			}
		}
	}
}
catch(PDOException $ex)
{
	echo '<div class="alert alert-danger">'.$ex->getMessage().'</div>';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Personal CSS -->
	<link rel="stylesheet" href="css/style.css">
	
    <title>Activa</title>
  </head>
  <body>
    <!-- Container -->
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 col-md-auto login-box">
				<h1 class="text-center wdi-blue">Login</h1>
				<hr>
				<!--<form>-->
				 <form method="post" >
					<div class="form-row">
						<div class="col-md-12">
						<input type="text" name="usuario" class="form-control form-control-lg flat-input" placeholder="username">
						</div>
						<div class="col-md-12">
						<input type="password" name="password" class="form-control form-control-lg flat-input" placeholder="password">
						</div>
						<!--<button type="submit" class="btn btn-lg btn-block btn-login">Login</button>-->
						<button name="ingresar"  class="btn btn-lg btn-block btn-login" type="submit">Login</button>
					
					</div>
				</form>
			</div>
	
		</div>
	</div>
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js">
  </body>
</html>