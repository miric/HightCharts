<?php
include_once ('../CapaLogica/ControladoraPreguntas.php');	
include_once ('../CapaLogica/ControladoraDatos.php');
$tienda = $_POST['id_tienda'];
$controller = new ControladoraPregunta ();
if($tienda!="Todas"){
$NombreTienda = $controller->GetTienda($tienda);
}
$controllerDatos = new ControladoraDatos ();
$TotalDatos = $controllerDatos->GetCantidadDatos();
$arregloPreguntas = array();
$table = $controller->GetListaPreguntas ();
$posicion =0;
foreach ( $table as $row ) {
array_push($arregloPreguntas,$row->nom_pregunta);
$posicion++;
}
$arreglo = array();
$arregloInsatisfaccion = array();
$arregloNeto = array();
$arregloBase = array();
if($tienda!="Todas"){
	echo $NombreTienda[0][0];
	foreach ( $table as $row ) {
	array_push($arreglo, $controller->GetSatisfaccionTienda ($row->id_pregunta,$tienda)[0][0]);
	}
	foreach ( $table as $row ) {
	array_push($arregloInsatisfaccion, $controller->GetInsatisfaccionTienda ($row->id_pregunta,$tienda)[0][0]);
	}
	foreach ( $table as $row ) {
	array_push($arregloBase, $controller->GetBaseTienda ($row->id_pregunta,$tienda)[0][0]);
	}	
}else{
	echo "Sin Filtro";
	foreach ( $table as $row ) {
	array_push($arreglo, $controller->GetSatisfaccion ($row->id_pregunta)[0][0]);
	}

	foreach ( $table as $row ) {
	array_push($arregloInsatisfaccion, $controller->GetInsatisfaccion ($row->id_pregunta)[0][0]);
	}

	foreach ( $table as $row ) {
	array_push($arregloBase, $controller->GetBase ($row->id_pregunta)[0][0]);
	}	
}
$contador=0;
foreach ( $table as $row ) {
array_push($arregloNeto,$arreglo[$contador]-$arregloInsatisfaccion[$contador]);
$contador ++;
}
$min=$arregloNeto[0];
foreach ( $arregloNeto as $row ) {
	if($row<$min)
	{
		$min = $row;
	}
}
?>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<script type="text/javascript">

Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafico Preguntas'
    },
    xAxis: {
		  categories:[  <?php
						foreach ( $table as $row ) {
						?>
						'<?php echo $row->nom_pregunta ?>',
						
						<?php 
						} 
						?>
					  ]
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Satisfacción',
        data:[  <?php
				foreach ( $arreglo as $row ) {
				?>
				<?php echo $row ?>,
				<?php 
				} 
				?>
			]
    }, {
        name: 'Insatisfacción',    
        data:[  <?php
				foreach ( $arregloInsatisfaccion as $row ) {
				?>
				<?php echo $row ?>,
				<?php 
				} 
				?>
			]
    }, {
        name: 'Neta',
        data:[  <?php
				foreach ( $arregloNeto as $row ) {
				?>
				<?php echo $row ?>,
				<?php 
				} 
				?>
			]
    }]
});
		</script>
	
	<table class="table table-bordered" id="mytab1">
	<tr class="active">
		<th>Atributo</th>
		<th>Base</th>
		<th>Notas 6+7 (Satisfacción)</th>
		<th>Notas 1 a 4 (Insatisfacción)</th>
		<th>Neta</th>	
	</tr>	
	<?php
					
	$contador=0;
	$porcentaje = 100;

	foreach ( $arregloBase as $row ) 
	{		
		echo "<tr>";		
		echo '<td>'.$arregloPreguntas[$contador].'</td>';
		echo '<td>' . $row . '</td>';
		echo '<td>'.$arreglo[$contador]."=>".round(($arreglo[$contador]*$porcentaje)/$row, 2).'%</td>';
		echo '<td>'.$arregloInsatisfaccion[$contador]."=>".round(($arregloInsatisfaccion[$contador]*$porcentaje)/$row, 2).'%</td>';		
		echo '<td>'.$arregloNeto[$contador]."=>".round(($arregloNeto[$contador]*$porcentaje)/$row, 2).'%</td>';					
		echo "</tr>";			
			$contador= $contador+1;		
		}
		?>
	
		</table>	