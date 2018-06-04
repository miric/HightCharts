<?php
require 'session.php';
include_once ('../CapaLogica/ControladoraPreguntas.php');
include_once ('../CapaLogica/ControladoraTienda.php');
include_once ('../CapaLogica/ControladoraDatos.php');	

$controller = new ControladoraPregunta ();
$table = $controller->GetListaPreguntas ();

	
$controllerTienda = new ControladoraTienda ();
$tableTienda = $controllerTienda->GetListaTiendas ();


$controller = new ControladoraDatos ();
$CantDatos = $controller->GetCantidadDatos ();

?>

<!doctype html>
<html lang="en">
  <head>
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <!-- Required meta tags -->
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">	
    <title>Activa</title>
	
	
	
  </head>
  <body>
 <script src="code/highcharts.js"></script>
<script src="code/modules/exporting.js"></script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      	<a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0"> Cerrar
						Sesion</a>
    </form>
  </div>
</nav>
<hr>
	<div class="container">
		<div class="row justify-content-md-center">
			<div class="col-md-6 col-md-auto login-box">
				<h1 class="text-center wdi-blue">Calcular por tienda</h1>
				<hr>
				<!--<form>-->
				 <form method="post">
					<div class="form-row text-center">
						<div id="Preguntas" class="col-md-12 ">
								 <!-- <a type="button" onclick="GetInfo()" class="btn btn-info">Calcular</a>-->
							<div class="btn-group">
								  <button type="button" class="btn btn-info">Seleccione Tienda</button>
								  <button type="button" class="btn btn-info dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								  <span class="sr-only">Toggle Dropdown</span>
								  </button>
								  <div class="dropdown-menu">
								  
								  <?php
									foreach ( $tableTienda as $row ) {
								  ?>
								  <a class="dropdown-item" onclick="GetInfo('<?php echo $row->id_tienda ?>')" id=<?php echo $row->id_tienda ?> href="#"><?php echo $row->nom_tienda ?></a>
								  <?php } ?>
								  <a class="dropdown-item" onclick="GetInfo('<?php echo "Todas" ?>')" id=<?php echo "Todas" ?> href="#"><?php echo "Todas" ?></a>
								  </div>
								</div>
						</div>
						<div class="col-md-12">
			
	
			
						</div>	
						<!--<button type="submit" class="btn btn-lg btn-block btn-login">Login</button>-->
						<!--<button name="ingresar"  class="btn btn-lg btn-block btn-login" type="submit">Buscar</button>-->
					
					</div>
				</form>
			</div>
	
		</div>
	</div>
	<div class="container" id="contenedor">
	
	
	<?php //echo $CantDatos[0][0] ?>
	</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.min.js"></script>
	<script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jqueryIndex.js"></script>

  </body>
</html>