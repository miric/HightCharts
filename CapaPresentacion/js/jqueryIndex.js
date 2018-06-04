
function GetInfo(id_tienda) {  
var tienda = id_tienda;
    $.ajax({
  	  url: 'Calcular.php',
  	  type: 'POST',
  	  async: true,
  	  data: {"id_tienda":tienda}
  	}).done ( function( data ) {
  		$("#contenedor").load("Calcular.php",{"id_tienda":tienda}); 	
  		 });  

}





