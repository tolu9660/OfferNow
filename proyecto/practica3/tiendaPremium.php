<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/clases/Art2ManoObjeto.php';
    require __DIR__.'/clases/OfertaObjeto.php';

	//Carga los productos en un array
	$articulos2ManoArray = Art2ManoObjeto::cargarArticulos2ManoPremium("Nombre");
    $ofertasArray = OfertaObjeto::cargarOfertasPremium("Nombre");
    $articulosPremium = array_merge($articulos2ManoArray, $ofertasArray);
	//Mostrar los productos
	$tituloPagina = 'Zona Premium';
	$productos = '';
	$productos.=<<<EOS
		<div="contenedor">
		<ul class="rejilla">
	EOS;
	
	for ($i = 0; $i < sizeof($articulosPremium); $i++) {
		$nombreArticulo=strval($articulosPremium[$i]->muestraNombre());
		$precioArticulo=strval($articulosPremium[$i]->muestraPrecio());
		$urlImagen=strval($articulosPremium[$i]->muestraURLImagen());
		//URL del producto junto con el id
		$id = PRODUCTOS.'/productoSegundaMano.php?id='.$articulosPremium[$i]->muestraID();
		$productos.=<<<EOS
		<li>
			<a href=$id rel="nofollow" target="_blank">
				<img src=$urlImagen width="200" height="200" alt=$nombreArticulo />
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