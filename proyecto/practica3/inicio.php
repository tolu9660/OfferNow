<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/Clases/OfertaObjeto.php';
	
	
	//Carga las ofertas en un array
	$ofertasArray = OfertaObjeto::cargarOfertas("Valoracion");

	
	//Mostrar las ofertas recorriendo el array
	$tituloPagina = 'Inicio';
	$productos = '';
	$productos.=<<<EOS
			<ul class="rejilla">
	EOS;


	for ($i = 0; $i < sizeof($ofertasArray); $i++) {
		$nombreOferta=strval($ofertasArray[$i]->muestraNombre());
		$precioOferta=strval($ofertasArray[$i]->muestraPrecio());
		$urlImagen=strval($ofertasArray[$i]->muestraURLImagen());
		//URL del producto junto con el id
		$id = PRODUCTOS.'/producto.php?id='.$ofertasArray[$i]->muestraID();
		$productos.=<<<EOS
		<li>
			<a href=$id rel="nofollow" target="_blank">
				<img src=$urlImagen width="200" height="200" alt="movil" />
				<h3>$nombreOferta</h3>
				<p>$precioOferta €</p>
			</a>
		</li>	
		EOS;
	}

	$contenidoPrincipal=<<<EOS
		$productos
		</ul>
		
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
