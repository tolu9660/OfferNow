<?php
	require_once __DIR__.'/includes/config.php';
	require __DIR__.'/clases/art2ManoObjeto.php';
    require __DIR__.'/clases/ofertaObjeto.php';

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
require __DIR__.'/includes/comun/layout.php';