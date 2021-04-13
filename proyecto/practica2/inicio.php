<?php
//modificado
require_once __DIR__.'/includes/config.php';

require __DIR__.'/Clases/OfertaObjeto.php';


$mysqli = getConexionBD();
$query = sprintf("SELECT * FROM oferta");
$result = $mysqli->query($query);

$ofertasArray;
/*
$consulta=sprintf("SELECT * FROM oferta O WHERE O.Nombre='Oferta2'");
$rs = $mysqli->query($consulta);
$fila1 = $rs->fetch_assoc();

echo "CONSULTA :".$fila1['Numero'].$fila1['Nombre'].$fila1['Descripcion'].$fila1['URL_Oferta'].
									$fila1['URL_Imagen'].$fila1['Valoracion'].
									$fila1['Precio'].$fila1['Creador'];*/
if($result) {
	for ($i = 0; $i < $result->num_rows; $i++) {
		$fila = $result->fetch_assoc();
		$ofertasArray[] = new OfertaObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],$fila['URL_Oferta'],
									$fila['URL_Imagen'],$fila['Valoracion'],$fila['Precio'],$fila['Creador']);
		
}
}
else{
	echo "Error in ".$query."<br>".$mysqli->error;
  }

  //echo "nombre:".$ofertasArray[2]->muestraURLOferta();


$tituloPagina = 'Inicio';
/*
//habria que automatizar este proceso
$url=strval($ofertasArray[2]->muestraURLOferta());
$url1=strval($ofertasArray[2]->muestraURLImagen());
*/

$productos;
for ($i = 0; $i < $result->num_rows; $i++) {
	$url=strval($ofertasArray[$i]->muestraURLOferta());
	$url1=strval($ofertasArray[$i]->muestraURLImagen());
	//echo $url."<br />";
	//echo $url1;
	$productos.=<<<EOS
	<li>
		<a href=$url rel="nofollow" target="_blank">
		<img src=$url1 width="200" height="200" alt="movil" />
		<h3>Movil Barato</h3>
		<p>14.39 €</p>
		</a>
	</li>	
EOS;
}
$contenidoPrincipal=<<<EOS
	$productos;
EOS;

/*$contenidoPrincipal=<<<EOS
	<div="contenedor">
				
			<ul class="rejilla">
			<!--buscar la manera de automatizar este proceso -->
			<!-- otra manera es ir creando con clases dentro de otras, la gestion se haría con clases anidadas -->
  			
			
					
				<li>
					<a href=$url rel="nofollow" target="_blank">
					<img src=$url1 width="200" height="200" alt="movil" />
					<h3>Movil Barato</h3>
					<p>14.39 €</p>
					</a>
				</li>
			
		

			</ul>
		</div>
EOS;*/

require __DIR__.'/includes/comun/layout.php';
