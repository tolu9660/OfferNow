<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/Clases/Art2ManoObjeto.php';


	$mysqli = getConexionBD();
	$query = sprintf("SELECT * FROM articulos_segunda_mano");
	$result = $mysqli->query($query);

	$ofertasArray;
	
	if($result) {
		for ($i = 0; $i < $result->num_rows; $i++) {
			$fila = $result->fetch_assoc();
			$ofertasArray[] = new Art2ManoObjeto($fila['Numero'],$fila['Nombre'],$fila['Descripcion'],
								$fila['Unidades'],$fila['Precio'],$fila['Imagen']);		
		}
	}
	else{
		echo "Error in ".$query."<br>".$mysqli->error;
	}
	
	//Mostrar los productos
	$tituloPagina = 'Inicio';
	$productos = '';
	$productos.=<<<EOS
		<div="contenedor">
		<ul class="rejilla">
	EOS;
	
	for ($i = 0; $i < $result->num_rows; $i++) {
		$nombreArticulo=strval($ofertasArray[$i]->muestraNombre());
		$precioArticulo=strval($ofertasArray[$i]->muestraPrecio());
		$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
		//URL del producto junto con el id
		$id = 'productoSegundaMano.php?id='.$ofertasArray[$i]->muestraID();
		$productos.=<<<EOS
		<li>
			<a href=$id rel="nofollow" target="_blank">
				<img src=$urlImagen width="200" height="200" alt="movil" />
				<h3>$nombreArticulo</h3>
				<p>$precioArticulo €</p>
			</a>
		</li>	
		EOS;
	}

	$contenidoPrincipal=<<<EOS
		$productos
		</ul>
		</div>
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
